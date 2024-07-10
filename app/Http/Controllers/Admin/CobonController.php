<?php

namespace App\Http\Controllers\Admin;

use App\Models\Cobon;
use App\Models\CobonCategory;
use App\Models\CobonProduct;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Admin\CobonRequest;

class CobonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return View
     */
    private $view = 'admin.cobons.';
    private $redirect = '/admin/cobons/';
    private $routes = 'cobons';

    public function index(Request $request): View
    {
        $title = __('cobons.index');
        $query = Cobon::latest()
            ->select('cobons.*');

        $routes = $this->routes;

        $filter = $this->filter($request, $query);

        $action = $filter['action'];
        $cobons = $filter['cobons'];
        $count = $filter['count'];
        $trashed_title = $filter['trashed_title'];
        $delete_button = $filter['delete_button'];

        return view($this->view . 'index', get_defined_vars());
    }
    /**
     * Filter data
     *
     * @param array $request
     * @param Collection $cobon_id
     * @return array
     */
    private function filter($request, $query): array
    {
        $paginate = settings('paginate_dashboard');
        $delete_button = 'delete';

        if ($request->status) {
            $query->where('cobons.status', 'LIKE', '%' . $request->status . '%');
        }
        if ($request->start_date) {
            $query->whereDate('cobons.created_at', '>=', $request->start_date);
        }
        if ($request->end_date) {
            $query->whereDate('cobons.created_at', '<=', $request->end_date);
        }

        $action = route($this->routes . '.index');

        if (!is_null($request->trashed)) {
            $cobons = $query->onlyTrashed()->paginate($paginate);
            $count = $query->onlyTrashed()->count();
            $trashed_title = __('dashboard.displayActive');
            $delete_button = 'restore';
        } else {
            $action .= '?trashed=true';
            $cobons = $query->paginate($paginate);
            $count = $query->count();
            $trashed_title = __('dashboard.displayTrash');
        }

        return [
            'action' => $action,
            'cobons' => $cobons,
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
        $title = __('cobons.create');
        $action = route('cobons.store');


        return view($this->view . 'form', get_defined_vars());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CobonRequest $request
     * @return RedirectResponse
     */
    public function store(CobonRequest $request): RedirectResponse
    {
        $cobon = Cobon::create($request->all());

        $cobon->categories()->attach($request->category_ids);
        $cobon->products()->attach($request->product_ids);

        return redirect(getCurrentLocale().$this->redirect);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param Cobon $cobon
     * @return View
     */
    public function edit(Cobon $cobon): View
    {
        $title = __('cobons.edit');
        $action = route('cobons.update', $cobon->id);

        $categories = CobonCategory::where('cobon_id',$cobon->id)->get();
        $products = CobonProduct::where('cobon_id',$cobon->id)->get();

        return view($this->view . 'form', get_defined_vars());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param CobonRequest $request
     * @param Cobon $cobon
     * @return RedirectResponse
     */
    public function update(CobonRequest $request, Cobon $cobon): RedirectResponse
    {
        $cobon->update($request->all());
        $cobon->categories()->sync($request->category_ids);
        $cobon->products()->sync($request->product_ids);


        return redirect(getCurrentLocale().$this->redirect);
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return RedirectResponse
     *
     */
    public function destroy($id): RedirectResponse
    {
        $cobon = Cobon::where('id', $id)->withTrashed()->first();
        if (is_null($cobon->deleted_at)) {
            $cobon->delete();
        } else {
            $cobon->restore();
        }
        return redirect(getCurrentLocale().$this->redirect);
    }
}
