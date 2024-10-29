<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\GovernorateRequest;
use App\Models\Governorate;
use App\Models\GovernorateDescription;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\View\View;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class GovernorateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return View
     */
    private $view = 'admin.governorates.';
    private $redirect = '/admin/governorates/';
    private $routes = 'governorates';

    public function index(Request $request): View
    {
        $title = __('governorates.index');
        $query = Governorate::latest()
            ->join('governorate_descriptions AS td', 'governorates.id', 'td.governorate_id')
            ->join('languages', 'languages.id', 'td.language_id')
            ->where('local', LaravelLocalization::getCurrentLocale())
            ->select(['td.name', 'governorates.*']);

        $routes = $this->routes;

        $filter = $this->filter($request, $query);

        $action = $filter['action'];
        $governorates = $filter['governorates'];
        $count = $filter['count'];
        $trashed_title = $filter['trashed_title'];
        $delete_button = $filter['delete_button'];

        return view($this->view . 'index', get_defined_vars());
    }

    /**
     * Filter data
     *
     * @param array $request
     * @param Collection $governorate_id
     * @return array
     */
    private function filter($request, $query): array
    {
        $paginate = settings('paginate_dashboard');
        $delete_button = 'delete';

        if ($request->name) {
            $query->where('td.name', 'LIKE', '%' . $request->name . '%');
        }
        if ($request->start_date) {
            $query->whereDate('governorates.created_at', '>=', $request->start_date);
        }
        if ($request->end_date) {
            $query->whereDate('governorates.created_at', '<=', $request->end_date);
        }

        $action = route($this->routes . '.index');

        if (!is_null($request->trashed)) {
            $governorates = $query->onlyTrashed()->paginate($paginate);
            $count = $query->onlyTrashed()->count();
            $trashed_title = __('dashboard.displayActive');
            $delete_button = 'restore';
        } else {
            $action .= '?trashed=true';
            $governorates = $query->paginate($paginate);
            $count = $query->count();
            $trashed_title = __('dashboard.displayTrash');
        }

        return [
            'action' => $action,
            'governorates' => $governorates,
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
        $title = __('governorates.create');
        $action = route('governorates.store');

        return view($this->view . 'form', get_defined_vars());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param GovernorateRequest $request
     * @return RedirectResponse
     */
    public function store(GovernorateRequest $request): RedirectResponse
    {
        $data = Governorate::create($request->all());
        $this->saveData($request, $data->id);

        return redirect(getCurrentLocale().$this->redirect);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Governorate $governorate
     * @return View
     */
    public function edit(Governorate $governorate): View
    {
        $title = __('governorates.edit');
        $action = route('governorates.update', $governorate->id);

        $query = GovernorateDescription::where('governorate_id', $governorate->id)
            ->join('languages', 'languages.id', 'governorate_descriptions.language_id')
            ->select(['governorate_descriptions.*', 'languages.local']);

        $governorateDescription = $query->get();

        foreach ($governorateDescription as $row) {
            $governorate[$row->local] = $row;
        }

        return view($this->view . 'form', get_defined_vars());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param GovernorateRequest $request
     * @param Governorate $governorate
     * @return RedirectResponse
     */
    public function update(GovernorateRequest $request, Governorate $governorate): RedirectResponse
    {
        $governorate->update($request->all());

        GovernorateDescription::where('governorate_id', $governorate->id)->delete();

        $this->saveData($request, $governorate->id);

        return redirect(getCurrentLocale().$this->redirect);
    }

    /**
     * Handle Save form data
     *
     * @param GovernorateRequest $request
     * @param int $governorate_id
     * @return void
     */
    private function saveData(GovernorateRequest $request, int $governorate_id): void
    {
        $requestData = $request->all();
        foreach (languages() as $lang) {
            $data = [
                'governorate_id' => $governorate_id,
                'language_id' => $lang->id,
                'name' => $requestData['name_' . $lang->local],
                'label' => $requestData['label_' . $lang->local],

            ];
            GovernorateDescription::create($data);
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
        $governorate = Governorate::where('id', $id)->withTrashed()->first();

        if (is_null($governorate->deleted_at)) {
            $governorate->delete();
        } else {
            $governorate->restore();
        }

        return redirect(getCurrentLocale().$this->redirect);
    }
}
