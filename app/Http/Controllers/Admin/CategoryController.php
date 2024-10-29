<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CategoryRequest;
use App\Models\Category;
use App\Models\CategoryDescription;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\View\View;
use App\Models\Product;
use App\Services\Upload\ImageService;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return View
     */
    private $view = 'admin.categories.';
    private $redirect = '/admin/categories/';
    private $routes = 'categories';

    public function index(Request $request): View
    {
        $title = __('categories.index');
        $query = Category::withDescription()->whereNull('categories.category_id');

        $routes = $this->routes;

        $filter = $this->filter($request, $query);

        $action = $filter['action'];
        $categories = $filter['categories'];
        $count = $filter['count'];
        $trashed_title = $filter['trashed_title'];
        $delete_button = $filter['delete_button'];

        return view($this->view . 'index', get_defined_vars());
    }


    /**
     * Filter data
     *
     * @param array $request
     * @param Collection $category_id
     * @return array
     */
    private function filter($request, $query): array
    {
        $paginate = settings('paginate_dashboard');
        $delete_button = 'delete';

        if ($request->name) {
            $query->where('td.title', 'LIKE', '%' . $request->name . '%');
        }
        if ($request->start_date) {
            $query->whereDate('categories.created_at', '>=', $request->start_date);
        }
        if ($request->end_date) {
            $query->whereDate('categories.created_at', '<=', $request->end_date);
        }

        $action = route($this->routes . '.index');

        if (!is_null($request->trashed)) {
            $categories = $query->onlyTrashed()->paginate($paginate);
            $count = $query->onlyTrashed()->count();
            $trashed_title = __('dashboard.displayActive');
            $delete_button = 'restore';
        } else {
            $action .= '?trashed=true';
            $categories = $query->paginate($paginate);
            $count = $query->count();

            $trashed_title = __('dashboard.displayTrash');
        }

        return [
            'action' => $action,
            'categories' => $categories,
            'count'=>$count,
            'trashed_title' => $trashed_title,
            'delete_button' => $delete_button,
        ];
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View
    {
        
        $title = __('categories.create');
        $action = route('categories.store');
        $categories = Category::withDescription()->cursor();
        return view($this->view . 'form', get_defined_vars());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CategoryRequest $request
     * @return RedirectResponse
     */
    public function store(CategoryRequest $request): RedirectResponse
    {
        $image = ImageService::uploadImage($request->image);
        $icon = ImageService::uploadImage($request->icon);
        $icon_search = ImageService::uploadImage($request->icon_search);
        $content = $request->except('image','banner');
        $content['image'] = $image;
        $content['icon'] = $icon;
        $content['icon_search'] = $icon_search;
        $data = Category::create($content);
        $this->saveData($request, $data->id);

        return redirect(getCurrentLocale().$this->redirect);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Category $category
     * @return View
     */
    public function edit(Category $category): View
    {
        $title = __('categories.edit');
        $action = route('categories.update', $category->id);
        $categories = Category::withDescription()->cursor();

        $query = CategoryDescription::where('category_id', $category->id)
            ->join('languages', 'languages.id', 'category_descriptions.language_id')
            ->select(['category_descriptions.*', 'languages.local']);

        $categoryDescription = $query->get();

        foreach ($categoryDescription as $row) {
            $category[$row->local] = $row;
        }

        return view($this->view . 'form', get_defined_vars());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param CategoryRequest $request
     * @param Category $category
     * @return RedirectResponse
     */
    public function update(CategoryRequest $request, Category $category): RedirectResponse
    {
        $content = $request->all();
        if($request->hasFile('image'))
        {
            $image = ImageService::uploadImage($request->image);
            $content['image'] = $image;
        }
        if($request->hasFile('icon'))
        {
            $icon = ImageService::uploadImage($request->icon);
            $content['icon'] = $icon;
        }
        if($request->hasFile('icon_search'))
        {
            $icon_search = ImageService::uploadImage($request->icon_search);
            $content['icon_search'] = $icon_search;
        }
        $category->update($content);

        CategoryDescription::where('category_id', $category->id)->delete();

        $this->saveData($request, $category->id);

        return redirect(getCurrentLocale().$this->redirect);
    }

    /**
     * Handle Save form data
     *
     * @param CategoryRequest $request
     * @param int $category_id
     * @return void
     */
    private function saveData(CategoryRequest $request, int $category_id): void
    {
        $requestData = $request->all();
        foreach (languages() as $lang) {
            $data = [
                'category_id' => $category_id,
                'language_id' => $lang->id,
                'title' => $requestData['title_' . $lang->local],
            ];
            if ($request->file('image_products_' . $lang->local))
            {
                $data['image_products'] = ImageService::uploadImage($requestData['image_products_' . $lang->local]);
            }
            CategoryDescription::create($data);
        }
    }

    /**
     * Remove Or Return the specified resource from storage.
     *
     * @param  int  $id
     * @return RedirectResponse
     */
    public function destroy($id): RedirectResponse
    {
        $category = Category::where('id', $id)->withTrashed()->first();

        if (is_null($category->deleted_at)) {
            $category->delete();
        } else {
            $category->restore();
        }

        return redirect(getCurrentLocale().$this->redirect);
    }
    public function see_more_category(): View
    {
        $categories = Category::withDescription()->whereNull('categories.category_id')->with([
            'models' => function ($query) {
                $query->with('details');
            },
        ])->get();

        $all_count = [];
        $all_count_deleted = [];
        $all_names = [];
        foreach ($categories as $category) 
        {
            $count_models = [];
            $count_models_deleted = [];
            $count = 0;
            $count_deleted = 0;
            $models_name = [];
            
            foreach ($category->models as $model) {
                $count += Product::where('category_id', $model->details->category_id)->whereNull('deleted_at')->count();
                $count_deleted += Product::where('category_id', $model->details->category_id)->whereNotNull('deleted_at')->count();
                $models_name[] = $model->details->title; 
                $count_models[] = $count;
                $count_models_deleted[] = $count_deleted;
            }
            $all_count[] = $count_models;
            $all_count_deleted[] = $count_models_deleted;
            $all_names[] = $models_name;

        }

        return view('admin.categories.more_categories', get_defined_vars());
    }
}
