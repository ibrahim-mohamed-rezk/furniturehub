<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SliderRequest;
use App\Models\Slider;
use App\Models\SliderDescription;
use App\Services\Upload\ImageService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\View\View;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     * @param Request $request
     * @return view
     */
    private $view = 'admin.sliders.';
    private $redirect = '/admin/sliders/';
    private $routes = 'sliders';
    public function index(Request $request): View
    {
        $title = __('sliders.index');
        $query = Slider::latest()
            ->join('slider_descriptions AS sd', 'sliders.id', 'sd.slider_id')
            ->join('languages', 'languages.id', 'sd.language_id')
            ->where('local', LaravelLocalization::getCurrentLocale())
            ->where('sliders.status', 'slider')
            ->select(['sd.*', 'sliders.*']);

        $routes = $this->routes;

        $filter = $this->filter($request, $query);

        $action = $filter['action'];
        $sliders = $filter['sliders'];
        $count = $filter['count'];
        $trashed_title = $filter['trashed_title'];
        $delete_button = $filter['delete_button'];

        return view($this->view . 'index', get_defined_vars());
    }

    /**
     * Filter data
     *
     * @param array $request
     * @param Collection $slider_id
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
            $sliders = $query->onlyTrashed()->paginate($paginate);
            $count = $query->onlyTrashed()->count();
            $trashed_title = __('dashboard.displayActive');
            $delete_button = 'restore';
        } else {
            $action .= '?trashed=true';
            $sliders = $query->paginate($paginate);
            $count = $query->count();
            $trashed_title = __('dashboard.displayTrash');
        }

        return [
            'action' => $action,
            'sliders' => $sliders,
            'count'=>$count,
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
        $title = __('sliders.create');
        $action = route('sliders.store');

        return view($this->view . 'form', get_defined_vars());

    }

    /**
     * Store a newly created resource in storage.
     * @param SliderRequest $request
     * @return RedirectResponse
     */
    public function store(SliderRequest $request): RedirectResponse
    {
        $content = $request->all();
        // $content['image'] = ImageService::uploadImage($request->image);

        $data = Slider::create($content);
        $this->saveData($request, $data->id);
        return redirect(getCurrentLocale().$this->redirect);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Slider $slider
     * @return View
     */
    public function edit(Slider $slider): View
    {
        $title = __('sliders.edit');
        $action = route('sliders.update', $slider->id);

        $query = SliderDescription::where('slider_id', $slider->id)
            ->join('languages', 'languages.id', 'slider_descriptions.language_id')
            ->select(['slider_descriptions.*', 'languages.local']);
        $sliderDescription = $query->get();

        foreach ($sliderDescription as $row) {
            $slider[$row->local] = $row;
        }

        return view($this->view . 'form', get_defined_vars());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param SliderRequest $request
     * @param Slider $slider
     * @return RedirectResponse
     */
    public function update(SliderRequest $request, Slider $slider): RedirectResponse
    {
        $content = $request->all();

        $slider->update($content);
        $this->saveData($request, $slider->id);
        return redirect(getCurrentLocale().$this->redirect);
    }
    /**
     * Handle Save form data
     *
     * @param SliderRequest $request
     * @param int $slider_id
     * @return void
     */
    private function saveData(SliderRequest $request, int $slider_id): void
    {
        $requestData = $request->all();
        foreach (languages() as $lang) {
            $data = [
                'name' => $requestData['name_' . $lang->local],
            ];
            if ($request->file('image_' . $lang->local))
            {
                $data['image'] = ImageService::uploadImage($requestData['image_' . $lang->local]);
            }
            
            SliderDescription::where('slider_id',$slider_id)->where('language_id',$lang->id)->update($data);
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
        $slider = Slider::where('id', $id)->withTrashed()->first();

        if (is_null($slider->deleted_at)) {
            $slider->delete();
        } else {
            $slider->restore();
        }
        return redirect(getCurrentLocale().$this->redirect);
    }
}
