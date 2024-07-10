<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CountryRequest;
use App\Models\Country;
use App\Models\CountryDescription;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\View\View;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return View
     */
    private $view = 'admin.countries.';
    private $redirect = '/admin/countries/';
    private $routes = 'countries';

    public function index(Request $request): View
    {
        $title = __('countries.index');
        $query = Country::latest()
            ->join('country_descriptions AS td', 'countries.id', 'td.country_id')
            ->join('languages', 'languages.id', 'td.language_id')
            ->where('local', LaravelLocalization::getCurrentLocale())
            ->select(['td.name', 'countries.*']);

        $routes = $this->routes;

        $filter = $this->filter($request, $query);

        $action = $filter['action'];
        $countries = $filter['countries'];
        $count = $filter['count'];
        $trashed_title = $filter['trashed_title'];
        $delete_button = $filter['delete_button'];

        return view($this->view . 'index', get_defined_vars());
    }

    /**
     * Filter data
     *
     * @param array $request
     * @param Collection $country_id
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
            $query->whereDate('countries.created_at', '>=', $request->start_date);
        }
        if ($request->end_date) {
            $query->whereDate('countries.created_at', '<=', $request->end_date);
        }

        $action = route($this->routes . '.index');

        if (!is_null($request->trashed)) {
            $countries = $query->onlyTrashed()->paginate($paginate);
            $count = $query->onlyTrashed()->count();
            $trashed_title = __('dashboard.displayActive');
            $delete_button = 'restore';
        } else {
            $action .= '?trashed=true';
            $countries = $query->paginate($paginate);
            $count = $query->count();
            $trashed_title = __('dashboard.displayTrash');
        }

        return [
            'action' => $action,
            'countries' => $countries,
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
        $title = __('countries.create');
        $action = route('countries.store');

        return view($this->view . 'form', get_defined_vars());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CountryRequest $request
     * @return RedirectResponse
     */
    public function store(CountryRequest $request): RedirectResponse
    {
        $data = Country::create($request->all());
        $this->saveData($request, $data->id);

        return redirect(getCurrentLocale().$this->redirect);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Country $country
     * @return View
     */
    public function edit(Country $country): View
    {
        $title = __('countries.edit');
        $action = route('countries.update', $country->id);

        $query = CountryDescription::where('country_id', $country->id)
            ->join('languages', 'languages.id', 'country_descriptions.language_id')
            ->select(['country_descriptions.*', 'languages.local']);

        $countryDescription = $query->get();

        foreach ($countryDescription as $row) {
            $country[$row->local] = $row;
        }

        return view($this->view . 'form', get_defined_vars());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param CountryRequest $request
     * @param Country $country
     * @return RedirectResponse
     */
    public function update(CountryRequest $request, Country $country): RedirectResponse
    {
        $country->update($request->all());

        CountryDescription::where('country_id', $country->id)->delete();

        $this->saveData($request, $country->id);

        return redirect(getCurrentLocale().$this->redirect);
    }

    /**
     * Handle Save form data
     *
     * @param CountryRequest $request
     * @param int $country_id
     * @return void
     */
    private function saveData(CountryRequest $request, int $country_id): void
    {
        $requestData = $request->all();
        foreach (languages() as $lang) {
            $data = [
                'country_id' => $country_id,
                'language_id' => $lang->id,
                'name' => $requestData['name_' . $lang->local],
            ];
            CountryDescription::create($data);
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
        $country = Country::where('id', $id)->withTrashed()->first();

        if (is_null($country->deleted_at)) {
            $country->delete();
        } else {
            $country->restore();
        }

        return redirect(getCurrentLocale().$this->redirect);
    }
}
