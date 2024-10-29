<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\CategoryDescription;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use App\Services\Upload\ImageService;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Admin\CategoryRequest;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return View
     */
    private $view = 'admin.subcategories.';
    private $redirect = '/admin/subcategories/';
    private $routes = 'subcategories';

    public function index(Request $request): View
    {
        $title = __('subcategories.index');
        $query = Category::latest()
            ->join('category_descriptions AS td', 'categories.id', 'td.category_id')
            ->join('languages', 'languages.id', 'td.language_id')
            ->where('local', LaravelLocalization::getCurrentLocale())
            ->whereNotNull('categories.category_id')
            ->select(['td.title', 'categories.*']);

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

    public function edit(Category $subcategory): View
    {
        $title = __('subcategories.edit');
        $action = route('subcategories.update', $subcategory->id);
        $categories = Category::withDescription()->where('categories.category_id',null)->cursor();

        $query = CategoryDescription::where('category_id', $subcategory->id)
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
    public function update(CategoryRequest $request, Category $subcategory): RedirectResponse
    {
        $content = $request->all();
        if($request->hasFile('image'))
        {
            $image = ImageService::uploadImage($request->image);
            $content['image'] = $image;
        }
        if($request->hasFile('banner'))
        {
            $banner = ImageService::uploadImage($request->banner);
            $content['banner'] = $banner;
        }
        $subcategory->update($content);

        CategoryDescription::where('category_id', $subcategory->id)->delete();

        $this->saveData($request, $subcategory->id);

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
}
