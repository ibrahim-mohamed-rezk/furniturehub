<?php

namespace App\Http\Controllers\Admin;

use App\Models\Cart;
use App\Models\User;
use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    private $view = "admin.carts.";
    private $redirect = "/admin/carts/";
    private $routes = "carts";
    public function index(Request $request)
    {
        $title = __('carts.index');
        $query = Cart::select('carts.id', 'carts.user_id', 'carts.created_at', 'carts.label')
            ->join(
                DB::raw('(SELECT user_id, MAX(created_at) AS latest_created_at FROM carts GROUP BY user_id) subquery'),
                function ($join) {
                    $join->on('carts.user_id', '=', 'subquery.user_id');
                    $join->on('carts.created_at', '=', 'subquery.latest_created_at');
                }
            )->whereNotIn('carts.user_id', [1067, 1070, 1071, 1072, 1073, 1074, 1075, 2322, 2320, 1723, 2295, 2293, 2292, 2091, 2138, 2287, 1583, 2161, 1530, 2123, 2114])
            ->latest('carts.created_at');
        $routes = $this->routes;

        $filter = $this->filter($request, $query);

        $action = $filter['action'];
        $cartsdash = $filter['carts'];
        $count = $filter['count'];



        return view($this->view . 'index', get_defined_vars());
    }
    /**
     * Filter data
     *
     * @param array $request
     * @param Collection $order_id
     * @return array
     */
    private function filter($request, $query): array
    {
        $paginate = settings('paginate_dashboard');
        $delete_button = 'delete';

        if ($request->name) {
            $ids = User::where('name', 'LIKE', '%' . $request->name . '%')->pluck('id');
            $query->whereIn('carts.user_id', $ids);
        }
        if ($request->start_date) {
            $query->whereDate('carts.created_at', '>=', $request->start_date);
        }
        if ($request->end_date) {
            $query->whereDate('carts.created_at', '<=', $request->end_date);
        }

        $action = route($this->routes . '.index');
        $carts = $query->paginate();
        $count = $query->count();

        return [
            'action' => $action,
            'count' => $count,
            'carts' => $carts,
        ];
    }
    public function show($id)
    {
        $title = __('carts.show');
        $user_id = $id;
        $products = Cart::where('user_id', $id)->get();
        $label_text = Cart::where('user_id', $id)->first();


        return view($this->view . 'form', get_defined_vars());
    }
    public function confirm($id)
    {
        $products = Cart::where('user_id', $id)->get();
        foreach ($products as $product) {
            $product->update([
                'label' => Auth::user()->name
            ]);
        }

        return back();
    }


    public function export()
    {
        $text = "mohamed";

        $pdf = App::make('dompdf.wrapper');
        $pdf->loadView('admin.pdf.carts', ['text' => $text]);
        return $pdf->download();
    }
    public function label_text(Request $request)
    {
        $products = Cart::where('user_id', $request->id)->get();
        foreach ($products as $product) {
            $product->update([
                'label' => Auth::user()->name,
                'label_message' => $request->message
            ]);
        }

        return back();
    }
    // public function send_message(Request $request)
    // {
    //     $user_id = User::where('id',$request->id)->first();


    // }
}
