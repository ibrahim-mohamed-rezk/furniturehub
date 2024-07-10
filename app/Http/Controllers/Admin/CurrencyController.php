<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CurrencyRequest;
use App\Models\Currency;
use App\Models\CurrencyDescription;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\View\View;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class CurrencyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return View
     */
    private $view = 'admin.currencies.';
    private $redirect = '/admin/currencies/';
    private $routes = 'currencies';

    public function index(Request $request): View
    {
        $title = __('currencies.index');
        $query = Currency::latest()
            ->join('currency_descriptions AS td', 'currencies.id', 'td.currency_id')
            ->join('languages', 'languages.id', 'td.language_id')
            ->where('local', LaravelLocalization::getCurrentLocale())
            ->select(['td.name', 'currencies.*']);

        $routes = $this->routes;

        $filter = $this->filter($request, $query);

        $action = $filter['action'];
        $currencies = $filter['currencies'];
        $count = $filter['count'];
        $trashed_title = $filter['trashed_title'];
        $delete_button = $filter['delete_button'];

        return view($this->view . 'index', get_defined_vars());
    }

    /**
     * Filter data
     *
     * @param array $request
     * @param Collection $currency_id
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
            $query->whereDate('currencies.created_at', '>=', $request->start_date);
        }
        if ($request->end_date) {
            $query->whereDate('currencies.created_at', '<=', $request->end_date);
        }

        $action = route($this->routes . '.index');

        if (!is_null($request->trashed)) {
            $currencies = $query->onlyTrashed()->paginate($paginate);
            $count = $query->onlyTrashed()->count();
            $trashed_title = __('dashboard.displayActive');
            $delete_button = 'restore';
        } else {
            $action .= '?trashed=true';
            $currencies = $query->paginate($paginate);
            $count = $query->count();
            $trashed_title = __('dashboard.displayTrash');
        }

        return [
            'action' => $action,
            'currencies' => $currencies,
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
        $title = __('currencies.create');
        $action = route('currencies.store');

        return view($this->view . 'form', get_defined_vars());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CurrencyRequest $request
     * @return RedirectResponse
     */
    public function store(CurrencyRequest $request): RedirectResponse
    {
        $data = Currency::create($request->all());
        $this->saveData($request, $data->id);

        return redirect(getCurrentLocale().$this->redirect);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Currency $currency
     * @return View
     */
    public function edit(Currency $currency): View
    {
        $title = __('currencies.edit');
        $action = route('currencies.update', $currency->id);

        $query = CurrencyDescription::where('currency_id', $currency->id)
            ->join('languages', 'languages.id', 'currency_descriptions.language_id')
            ->select(['currency_descriptions.*', 'languages.local']);

        $currencyDescription = $query->get();

        foreach ($currencyDescription as $row) {
            $currency[$row->local] = $row;
        }

        return view($this->view . 'form', get_defined_vars());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param CurrencyRequest $request
     * @param Currency $currency
     * @return RedirectResponse
     */
    public function update(CurrencyRequest $request, Currency $currency): RedirectResponse
    {
        $currency->update($request->all());

        CurrencyDescription::where('currency_id', $currency->id)->delete();

        $this->saveData($request, $currency->id);

        return redirect(getCurrentLocale().$this->redirect);
    }

    /**
     * Handle Save form data
     *
     * @param CurrencyRequest $request
     * @param int $currency_id
     * @return void
     */
    private function saveData(CurrencyRequest $request, int $currency_id): void
    {
        $requestData = $request->all();
        foreach (languages() as $lang) {
            $data = [
                'currency_id' => $currency_id,
                'language_id' => $lang->id,
                'name' => $requestData['name_' . $lang->local],
            ];
            CurrencyDescription::create($data);
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
        $currency = Currency::where('id', $id)->withTrashed()->first();

        if (is_null($currency->deleted_at)) {
            $currency->delete();
        } else {
            $currency->restore();
        }

        return redirect(getCurrentLocale().$this->redirect);
    }
}
