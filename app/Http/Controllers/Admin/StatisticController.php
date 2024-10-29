<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use App\Models\Category;
use App\Models\Governorate;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StatisticController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::selectRaw('MONTH(created_at) as month, COUNT(*) as count')
            ->whereYear('created_at', date('Y'))->whereNull('deleted_at')
            ->groupBy('month')
            ->orderBy('month')
            ->get();
        $orders = Order::selectRaw('MONTH(created_at) as month, COUNT(*) as count')
            ->whereYear('created_at', date('Y'))->whereNull('deleted_at')
            ->groupBy('month')
            ->orderBy('month')
            ->get();
        $products = Product::selectRaw('MONTH(created_at) as month, COUNT(*) as count')
            ->whereYear('created_at', date('Y'))->whereNull('deleted_at')
            ->groupBy('month')
            ->orderBy('month')
            ->get();
        $governorates = Governorate::withDescription()->get();
        $now = Carbon::now();
        $lastMonth = $now->copy()->subMonth();
        $order_Sum_last = Order::whereNull('deleted_at')
            ->where('created_at', '>=', $lastMonth)
            ->where('created_at', '<=', $now)
            ->sum('total');
        $product_count = Product::whereNull('deleted_at')->count();
        $order_count = Order::whereNull('deleted_at')->count();
        $order_Sum = Order::whereNull('deleted_at')->sum('total');

        $categories_count = Category::whereNull('deleted_at')->whereNull('category_id')->count();
        $categories = Category::withDescription()->whereNull('deleted_at')->whereNull('categories.category_id')->with([
            'models' => function ($query) {
                $query->with('details');
            },
        ])->get();

        $data_categories = [];
        $category_not_count = [];
        $category_deleted_count = [];
        foreach ($categories as $category) {
            array_push($data_categories, $category->title);
            $count = 0;
            $count_deleted = 0;
            $count += Product::where('category_id', $category->id)->whereNull('deleted_at')->count();
            $count_deleted += Product::where('category_id', $category->id)->whereNotNull('deleted_at')->count();
            foreach ($category->models as $model) {
                $count += Product::where('category_id', $model->details->category_id)->whereNull('deleted_at')->count();
                $count_deleted += Product::where('category_id', $model->details->category_id)->whereNotNull('deleted_at')->count();
            }
            $category_not_count[] = $count;
            $category_deleted_count[] = $count_deleted;
        }
        $data_users = [];
        $data_orders = [];
        $data_products = [];
        for ($i = 1; $i <= 12; $i++) {
            $month = date('F', mktime(0, 0, 0, $i, 1));
            $count = 0;
            foreach ($users as $user) {
                if ($user->month == $i) {
                    $count = $user->count;
                    break;
                }
            }
            array_push($data_users, $count);
        }

        for ($i = 1; $i <= 12; $i++) {
            $month = date('F', mktime(0, 0, 0, $i, 1));
            $count = 0;
            foreach ($orders as $order) {
                if ($order->month == $i) {
                    $count = $order->count;
                    break;
                }
            }
            array_push($data_orders, $count);
        }

        for ($i = 1; $i <= 12; $i++) {
            $month = date('F', mktime(0, 0, 0, $i, 1));
            $count = 0;
            foreach ($products as $product) {
                if ($product->month == $i) {
                    $count = $product->count;
                    break;
                }
            }
            array_push($data_products, $count);
        }

        $data_governorates = [];
        $data_count_goverates = [];
        foreach ($governorates as $row) {
            $data_governorates[] = $row->name;
            $data_count_goverates[] = User::where('gevernorate_id', $row->id)->count();
        }



        $visitors = json_encode($data_users);
        $sales = json_encode($data_orders);
        $products = json_encode($data_products);
        return view('admin.statistics.index', get_defined_vars());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
