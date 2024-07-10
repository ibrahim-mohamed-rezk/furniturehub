<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductDescription;
use App\Models\Rate;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class RateController extends Controller
{
    /**
     * Display a listing of the resource.
     * @param Request $request
     * @return view
     */
    private $view = 'admin.rates.';
    private $redirect = '/admin/rates/';
    private $routes = 'rates';

    public function index(Request $request): View
    {
        $title = __('rates.index');
        $query = Rate::latest();
        $ratings = [1,2,3,4,5];
        $routes = $this->routes;

        $filter = $this->filter($request, $query);

        $action = $filter['action'];
        $rates = $filter['rates'];
        $count = $filter['count'];
        $trashed_title = $filter['trashed_title'];
        $delete_button = $filter['delete_button'];

        return view($this->view . 'index', get_defined_vars());
    }

    /**
     * Filter data
     *
     * @param array $request
     * @param Collection $rate_id
     * @return array
     */
    private function filter($request, $query): array
    {
        $paginate = settings('paginate_dashboard');
        $delete_button = 'delete';

        if ($request->rate) {
            $query->where('rate', 'LIKE', '%' . $request->rate . '%');
        }
        if ($request->user) {
            $ids = User::where('name', 'LIKE', '%'.$request->name.'%')->pluck('id');
            $query->whereIn('user_id',$ids);
        }
        if ($request->product) {
            $ids = ProductDescription::where('name', 'LIKE', '%'.$request->name.'%')->pluck('product_id');
            $query->whereIn('product_id',$ids);
        }
        if ($request->start_date) {
            $query->whereDate('created_at', '>=', $request->start_date);
        }
        if ($request->end_date) {
            $query->whereDate('created_at', '<=', $request->end_date);
        }

        $action = route($this->routes . '.index');

        if (!is_null($request->trashed)) {
            $rates = $query->onlyTrashed()->paginate($paginate);
            $count = $query->onlyTrashed()->count();
            $trashed_title = __('dashboard.displayActive');
            $delete_button = 'restore';
        } else {
            $action .= '?trashed=true';
            $rates = $query->paginate($paginate);
            $count = $query->count();
            $trashed_title = __('dashboard.displayTrash');
        }

        return [
            'action' => $action,
            'rates' => $rates,
            'count'=>$count,
            'trashed_title' => $trashed_title,
            'delete_button' => $delete_button,
        ];
    }

    public function show(Rate $rate)
    {
        $title = __('rates.edit');

        return view($this->view . 'form', get_defined_vars());
    }


    /**
     * Remove Or Return the specified resource from storage.
     *
     * @param  int  $id
     * @return RedirectResponse
     */
    public function destroy($id): RedirectResponse
    {
        $rate = Rate::where('id', $id)->withTrashed()->first();

        if (is_null($rate->deleted_at)) {
            $rate->delete();
        } else {
            $rate->restore();
        }
        return redirect(getCurrentLocale().$this->redirect);
    }
}