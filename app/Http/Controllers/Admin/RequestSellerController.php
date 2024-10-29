<?php

namespace App\Http\Controllers\Admin;

use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Models\SellerRequest;
use App\Http\Controllers\Controller;

class RequestSellerController extends Controller
{
    private $view = 'admin.requestSellers.';
    private $routes = 'sellerrequests';
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $query = SellerRequest::latest();
        $routes = $this->routes;
        $title = __('sellerrequests.index');
        $filter = $this->filter($request, $query);

        $action = $filter['action'];
        $sellerrequests = $filter['sellerrequests'];
        $count = $filter['count'];
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
            $sellerrequests = $query->onlyTrashed()->paginate($paginate);
            $count = $query->onlyTrashed()->count();
            $trashed_title = __('dashboard.displayActive');
            $delete_button = 'restore';
        } else {
            $action .= '?trashed=true';
            $sellerrequests = $query->paginate($paginate);
            $count = $query->count();
            $trashed_title = __('dashboard.displayTrash');
        }

        return [
            'action' => $action,
            'sellerrequests' => $sellerrequests,
            'count'=>$count,
            'trashed_title' => $trashed_title,
            'delete_button' => $delete_button,
        ];
    }

    public function show($sellerRequestId)
    {
        $sellerRequest = SellerRequest::where('id',$sellerRequestId)->first();
        // dd($sellerRequest);
        $title = __('demands.edit'); 

        return view($this->view . 'form', get_defined_vars());
    }
}
