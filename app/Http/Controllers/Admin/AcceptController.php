<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AcceptRequest;
use App\Models\Seller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\View\View;

class AcceptController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return View
     */
    private $view = 'admin.accepts.';
    private $redirect = '/admin/accepts/';
    private $routes = 'accepts';

    public function index(Request $request): View
    {
        $title = __('accepts.index');
        $query = Seller::where('active','inactive')->latest();

        $routes = $this->routes;

        $filter = $this->filter($request, $query);

        $action = $filter['action'];
        $sellers = $filter['sellers'];
        $count = $filter['count'];
        $trashed_title = $filter['trashed_title'];
        $delete_button = $filter['delete_button'];

        return view($this->view . 'index', get_defined_vars());
    }

    /**
     * Filter data
     *
     * @param array $request
     * @param Collection $seller_id
     * @return array
     */
    private function filter($request, $query): array
    {
        $paginate = settings('paginate_dashboard');
        $delete_button = 'delete';

        if ($request->name) {
            $query->where('sellers.name', 'LIKE', '%' . $request->name . '%');
        }
        if ($request->start_date) {
            $query->whereDate('sellers.created_at', '>=', $request->start_date);
        }
        if ($request->end_date) {
            $query->whereDate('sellers.created_at', '<=', $request->end_date);
        }

        $action = route($this->routes . '.index');

        if (!is_null($request->trashed)) {
            $sellers = $query->onlyTrashed()->paginate($paginate);
            $count = $query->onlyTrashed()->count();
            $trashed_title = __('dashboard.displayActive');
            $delete_button = 'restore';
        } else {
            $action .= '?trashed=true';
            $sellers = $query->paginate($paginate);
            $count = $query->count();
            $trashed_title = __('dashboard.displayTrash');
        }

        return [
            'action' => $action,
            'sellers' => $sellers,
            'count' => $count,
            'trashed_title' => $trashed_title,
            'delete_button' => $delete_button,
        ];
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param Seller $accept
     * @return View
     */
    public function edit(Seller $accept): View
    {
        $title = __('accepts.edit');
        $action = route('accepts.update', $accept->id);

        return view($this->view . 'form', get_defined_vars());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param AcceptRequest $request
     * @param Seller $seller
     * @return RedirectResponse
     */
    public function update(AcceptRequest $request, Seller $accept): RedirectResponse
    {

        $accept->update(['code'=>$request->code,'active'=>'active']);

        return redirect(getCurrentLocale().$this->redirect);
    }


}
