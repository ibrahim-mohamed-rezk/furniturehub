<?php

namespace App\Http\Controllers\admin;

use App\Models\Bank;
use App\Models\Period;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Models\BankDescription;
use App\Http\Controllers\Controller;
use App\Services\Upload\ImageService;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Admin\BankRequest;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class BankController extends Controller
{
    /**
     * Display a listing of the resource.
     * @param Request $request
     * @return view
     */
    private $view = 'admin.banks.';
    private $redirect = '/admin/banks/';
    private $routes = 'banks';
    public function index(Request $request): View
    {
        $title = __('banks.index');
        $query = Bank::latest()
            ->join('bank_descriptions AS bd', 'banks.id', 'bd.bank_id')
            ->join('languages', 'languages.id', 'bd.language_id')
            ->where('local', LaravelLocalization::getCurrentLocale())
            ->select(['bd.*', 'banks.*']);

        $routes = $this->routes;

        $filter = $this->filter($request, $query);

        $action = $filter['action'];
        $banks = $filter['banks'];
        $count = $filter['count'];
        $trashed_title = $filter['trashed_title'];
        $delete_button = $filter['delete_button'];


        return view($this->view . 'index', get_defined_vars());
    }

    /**
     * Filter data
     *
     * @param array $request
     * @param Collection $article_id
     * @return array
     */
    private function filter($request, $query): array
    {
        $paginate = settings('paginate_dashboard');
        $delete_button = 'delete';

        if ($request->name) {
            $query->where('bd.name', 'LIKE', '%' . $request->name . '%');
        }


        $action = route($this->routes . '.index');

        if (!is_null($request->trashed)) {
            $banks = $query->with(['periods' => function ($query) {
                $query->onlyTrashed();
            }])->paginate($paginate);
            $count = $query->with(['periods' => function ($query) {
                $query->onlyTrashed();
            }])->count();
            $trashed_title = __('dashboard.displayActive');
            $delete_button = 'restore';
        } else {
            $action .= '?trashed=true';
            $banks = $query->paginate($paginate);
            $count = $query->count();
            $trashed_title = __('dashboard.displayTrash');
        }

        return [
            'action' => $action,
            'banks' => $banks,
            'count'=> $count,
            'trashed_title' => $trashed_title,
            'delete_button' => $delete_button,
        ];
    }

    public function create(): View
    {
        $title = __('banks.create');
        $query = Bank::
            join('bank_descriptions AS bd', 'banks.id', 'bd.bank_id')
            ->join('languages', 'languages.id', 'bd.language_id')
            ->where('local', LaravelLocalization::getCurrentLocale())
            ->select(['bd.*', 'banks.*']);

        $banks = $query->get();
        $action = route('banks.store');

        return view($this->view . 'form', get_defined_vars());
    }

    /**
     * Store a newly created resource in storage.
     * @param BankRequest $request
     * @return RedirectResponse
     */
    public function store(BankRequest $request): RedirectResponse
    {
        $content = $request->all();
        $data = Period::create($content);

        return redirect(getCurrentLocale() . $this->redirect);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Period $period
     * @return View
     */
    public function edit(Period $bank): View
    {
        $title = __('banks.edit');
        $action = route('banks.update', $bank->id);

        $query = Bank::latest()
            ->join('bank_descriptions AS bd', 'banks.id', 'bd.bank_id')
            ->join('languages', 'languages.id', 'bd.language_id')
            ->where('local', LaravelLocalization::getCurrentLocale())
            ->select(['bd.*', 'banks.*']);
        $banks = $query->get();


        return view($this->view . 'form', get_defined_vars());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param BankRequest $request
     * @param Period $bank
     * @return RedirectResponse
     */
    public function update(BankRequest $request, Period $bank): RedirectResponse
    {

        $bank->update($request->all());



        return redirect(getCurrentLocale() . $this->redirect);
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
        $period = Period::where('id', $id)->withTrashed()->first();

        if (is_null($period->deleted_at)) {
            $period->delete();
        } else {
            $period->restore();
        }

        return redirect(getCurrentLocale() . $this->redirect);
    }
}
