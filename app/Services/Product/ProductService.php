<?php

namespace App\Services\Product;

use App\Models\Category;
use App\Models\Product;
use App\Models\ProductView;
use Illuminate\Support\Facades\Auth;

class ProductService
{
    private $product;

    public function __construct(Product $product = null)
    {
        $this->product = $product;
    }
    public function viewBefore()
    {
        $user = Auth::user();
        $ids = ProductView::where('user_id', $user->id)->orderBy('id', 'DESC')->pluck('product_id')->toArray();
        $ids = count($ids) == 0 ? [0] : $ids;
        $products = Product::withDescription()->orderByRaw("field(products.id," . implode(',', $ids) . ")")->whereRaw("products.id IN (" . implode(',', $ids) . ")")->limit(4)->cursor();
        return $products;
    }
    public function suggestProducts()
    {
        $products = Product::withDescription()->with('category')
            ->whereDoesntHave('category', function ($query) {
                $query->whereNotNull('deleted_at');
            })
            ->whereNull('deleted_at')->where('category_id',settings('category_random'))
            ->inRandomOrder()
            ->limit(4)
            ->get();

        return $products;
    }
    public function productCount()
    {
        if ($this->product->count < 1) {
            $message = __('web.out_of_stock');
            $response = '';
            $status = 400;

            return
                [
                    'msg' => [$message],
                    'status' => $status,
                    'response' => $response,
                ];
        }
        $message = __('web.success');
        $response = '';
        $status = 200;

        return
            [
                'message' => $message,
                'status' => $status,
                'response' => $response,
            ];
    }
    public function checkAvailable($count)
    {
        $user = Auth::user();

        $checkCount = $this->productCount();

        if ($checkCount['status'] != 200) {
            return $checkCount;
        }

        $product_count = $this->product->count;

        if (!$this->product) {
            $message = __('web.not_found');
            $status = 404;
            $response = '';
            return
                [
                    'message' => $message,
                    'status' => $status,
                    'response' => $response,
                ];
        }

        if ($product_count < $count) {
            $message = __('web.over_count');
            $status = 400;
            $response = '';
            return
                [
                    'message' => $message,
                    'status' => $status,
                    'response' => $response,
                ];
        }

        $message = '';
        $status = 200;
        $response = '';
        return
            [
                'message' => $message,
                'status' => $status,
                'response' => $response,
            ];
    }
}
