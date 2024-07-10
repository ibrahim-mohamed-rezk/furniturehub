<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PageRequest;
use App\Models\Page;
use App\Models\PageDescription;
use App\Models\Type;
use App\Services\Upload\ImageService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\View\View;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     * @param Request $request
     * @return view
     */
    private $view = 'admin.pages.';
    private $redirect = '/admin/pages/';
    private $routes = 'pages';
    public function index(Request $request): View
    {
        $title = __('pages.index');
        $query = Page::latest()
            ->join('page_descriptions AS ad', 'pages.id', 'ad.page_id')
            ->join('languages', 'languages.id', 'ad.language_id')
            ->where('local', LaravelLocalization::getCurrentLocale())
            ->select(['ad.*', 'pages.*']);

        $routes = $this->routes;

        $filter = $this->filter($request, $query);

        $action = $filter['action'];
        $pages = $filter['pages'];
        $count = $filter['count'];
        $trashed_title = $filter['trashed_title'];
        $delete_button = $filter['delete_button'];

        return view($this->view . 'index', get_defined_vars());
    }

    /**
     * Filter data
     *
     * @param array $request
     * @param Collection $page_id
     * @return array
     */
    private function filter($request, $query): array
    {
        $paginate = settings('paginate_dashboard');
        $delete_button = 'delete';

        if ($request->name) {
            $query->where('ad.name', 'LIKE', '%' . $request->name . '%');
        }
        if ($request->start_date) {
            $query->whereDate('pages.created_at', '>=', $request->start_date);
        }
        if ($request->end_date) {
            $query->whereDate('pages.created_at', '<=', $request->end_date);
        }

        $action = route($this->routes . '.index');

        if (!is_null($request->trashed)) {
            $pages = $query->onlyTrashed()->paginate($paginate);
            $count = $query->onlyTrashed()->count();
            $trashed_title = __('dashboard.displayActive');
            $delete_button = 'restore';
        } else {
            $action .= '?trashed=true';
            $pages = $query->paginate($paginate);
            $count = $query->count();
            $trashed_title = __('dashboard.displayTrash');
        }

        return [
            'action' => $action,
            'pages' => $pages,
            'count' => $count,
            'trashed_title' => $trashed_title,
            'delete_button' => $delete_button,
        ];
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param Page $page
     * @return View
     */
    public function edit(Page $page): View
    {
        $title = __('pages.edit');
        $action = route('pages.update', $page->id);

        $query = PageDescription::where('page_id', $page->id)
            ->join('languages', 'languages.id', 'page_descriptions.language_id')
            ->select(['page_descriptions.*', 'languages.local']);

        $pageDescription = $query->get();

        foreach ($pageDescription as $row) {
            $page[$row->local] = $row;
        }

        return view($this->view . 'form', get_defined_vars());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param PageRequest $request
     * @param Page $page
     * @return RedirectResponse
     */
    public function update(PageRequest $request, Page $page): RedirectResponse
    {
        if ($request->file('image')) {
            $image = ImageService::uploadImage($request->image);
            $page->update(['image' => $image]);
        }
        PageDescription::where('page_id', $page->id)->delete();

        $this->saveData($request, $page->id);
        return redirect(getCurrentLocale() . $this->redirect);
    }
    /**
     * Handle Save form data
     *
     * @param PageRequest $request
     * @param int $page_id
     * @return void
     */
    private function saveData(PageRequest $request, int $page_id): void
    {
        $requestData = $request->all();
        foreach (languages() as $lang) {
            $data = [
                'page_id' => $page_id,
                'language_id' => $lang->id,
                'title' => $requestData['title_' . $lang->local],
                'slug' => $requestData['slug_' . $lang->local],
                'meta_description' => $requestData['meta_description_' . $lang->local],
                'keywords' => $requestData['keywords_' . $lang->local],
                'description' => $requestData['description_' . $lang->local],
            ];
            PageDescription::create($data);
        }
    }
}
