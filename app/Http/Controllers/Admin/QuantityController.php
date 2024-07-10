<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Quantity;
use Illuminate\Http\Request;

class QuantityController extends Controller
{
    private $view = 'admin.quantities.';
    private $redirect = '/admin/quantities/';
    private $routes = 'quantities';
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Quantity::latest();
        $routes = $this->routes;
        $title = __('quantities.index');
        $filter = $this->filter($request, $query);

        $action = $filter['action'];
        $quantities = $filter['quantities'];
        $trashed_title = $filter['trashed_title'];
        $delete_button = $filter['delete_button'];
        return view($this->view . 'index', get_defined_vars());
    }

    /**
     * Filter data
     *
     * @param array $request
     * @param Collection $query
     * @return array
     */
    private function filter($request, $query): array
    {
        $paginate = settings('paginate_dashboard');
        $delete_button = 'delete';

        if ($request->name) {
            $query->where('name', 'LIKE', '%' . $request->name . '%');
        }
        if ($request->phone) {
            $query->where('phone', $request->phone);
        }
        if ($request->start_date) {
            $query->whereDate('created_at', '>=', $request->start_date);
        }
        if ($request->end_date) {
            $query->whereDate('created_at', '<=', $request->end_date);
        }

        $action = route($this->routes . '.index');

        if (!is_null($request->trashed)) {
            $quantities = $query->onlyTrashed()->paginate($paginate);
            $trashed_title = __('dashboard.displayActive');
            $delete_button = 'restore';
        } else {
            $action .= '?trashed=true';
            $quantities = $query->paginate($paginate);
            $trashed_title = __('dashboard.displayTrash');
        }

        return [
            'action' => $action,
            'quantities' => $quantities,
            'trashed_title' => $trashed_title,
            'delete_button' => $delete_button,
        ];
    }

    public function show(Quantity $quantity)
    {
        $title = __('quantities.show'); 

        return view($this->view . 'form', get_defined_vars());
    }

    
}
