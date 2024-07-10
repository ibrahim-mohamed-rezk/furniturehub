<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\BannerRequest;
use App\Models\Slider;
use App\Models\SliderDescription;
use App\Services\Upload\ImageService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\View\View;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     * @param Request $request
     * @return view
     */
    private $view = 'admin.banners.';
    private $redirect = '/admin/banners/';
    private $routes = 'banners';
    public function index(Request $request): View
    {
        $title = __('banners.index');
        $query = Slider::latest()
            ->join('slider_descriptions AS sd', 'sliders.id', 'sd.slider_id')
            ->join('languages', 'languages.id', 'sd.language_id')
            ->where('local', LaravelLocalization::getCurrentLocale())
            ->where('sliders.status', 'banner')
            ->select(['sd.*', 'sliders.*']);

        $routes = $this->routes;
        $filter = $this->filter($request, $query);

        $action = $filter['action'];
        $banners = $filter['banners'];
        $count = $filter['count'];
        $trashed_title = $filter['trashed_title'];
        $delete_button = $filter['delete_button'];

        return view($this->view . 'index', get_defined_vars());
    }

    /**
     * Filter data
     *
     * @param array $request
     * @param Collection $banner_id
     * @return array
     */
    private function filter($request, $query): array
    {
        $paginate = settings('paginate_dashboard');
        $delete_button = 'delete';

        if ($request->name) {
            $query->where('sd.name', 'LIKE', '%' . $request->name . '%');
        }
        if ($request->start_date) {
            $query->whereDate('sliders.created_at', '>=', $request->start_date);
        }
        if ($request->end_date) {
            $query->whereDate('sliders.created_at', '<=', $request->end_date);
        }

        $action = route($this->routes . '.index');

        if (!is_null($request->trashed)) {
            $banners = $query->onlyTrashed()->paginate($paginate);
            $count = $query->onlyTrashed()->count();
            $trashed_title = __('dashboard.displayActive');
            $delete_button = 'restore';
        } else {
            $action .= '?trashed=true';
            $banners = $query->paginate($paginate);
            $count = $query->count();
            $trashed_title = __('dashboard.displayTrash');
        }

        return [
            'action' => $action,
            'banners' => $banners,
            'count' => $count,
            'trashed_title' => $trashed_title,
            'delete_button' => $delete_button,
        ];
    }

    /**
     * Show the form for creating a new resource.
     * @return view
     */
    public function create(): View
    {
        $title = __('banners.create');
        $action = route('banners.store');

        return view($this->view . 'form', get_defined_vars());
    }

    /**
     * Store a newly created resource in storage.
     * @param BannerRequest $request
     * @return RedirectResponse
     */
    public function store(BannerRequest $request): RedirectResponse
    {
        $content = $request->all();
        $data = Slider::create($content);
        $this->saveData($request, $data->id);

        return redirect(getCurrentLocale() . $this->redirect);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Slider $banner
     * @return View
     */
    public function edit(Slider $banner): View
    {
        $title = __('banners.edit');
        $action = route('banners.update', $banner->id);

        $query = SliderDescription::where('slider_id', $banner->id)
            ->join('languages', 'languages.id', 'slider_descriptions.language_id')
            ->select(['slider_descriptions.*', 'languages.local']);

        $bannerDescription = $query->get();

        foreach ($bannerDescription as $row) {
            $banner[$row->local] = $row;
        }

        return view($this->view . 'form', get_defined_vars());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param BannerRequest $request
     * @param Slider $banner
     * @return RedirectResponse
     */
    public function update(BannerRequest $request, Slider $banner): RedirectResponse
    {
        $content = $request->all();

        $banner->update($content);
        $this->saveData($request, $banner->id);

        return redirect(getCurrentLocale() . $this->redirect);
    }
    /**
     * Handle Save form data
     *
     * @param BannerRequest $request
     * @param int $banner_id
     * @return void
     */
    private function saveData(BannerRequest $request, int $banner_id): void
    {
        $requestData = $request->all();
        foreach (languages() as $lang) {
            if ($request->file('image_' . $lang->local)) {
                $image = ImageService::uploadImageBlog($requestData['image_' . $lang->local]);
                $data = [
                    'name' => $requestData['name_' . $lang->local],
                    'description' => $requestData['description_' . $lang->local],
                    'image' => $image
                ];
            } else {
                $data = [
                    'name' => $requestData['name_' . $lang->local],
                    'description' => $requestData['description_' . $lang->local],
                ];
            }

            SliderDescription::where('slider_id', $banner_id)->where('language_id', $lang->id)->update($data);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    /**
     * Remove Or Return the specified resource from storage.
     *
     * @param  int  $id
     * @return RedirectResponse
     */
    public function destroy($id): RedirectResponse
    {
        $banner = Slider::where('id', $id)->withTrashed()->first();

        if (is_null($banner->deleted_at)) {
            $banner->delete();
        } else {
            $banner->restore();
        }

        return redirect(getCurrentLocale() . $this->redirect);
    }
}
