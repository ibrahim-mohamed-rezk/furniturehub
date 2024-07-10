<?php

namespace App\Http\Controllers\Web;

use App\Models\Slider;
use App\Models\Product;
use App\Models\Category;
use App\Models\Cobon;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Response\ResponseService;

class OfferController extends Controller
{
    private $take = 28;

    /**
     * Web offers.
     * @return View
     */
    public function offers(Request $request)
    {
        $title = __('web.offers');
        $banner = Slider::withDescription([19,22, 24, 26, 28, 30,50,51])->orderBy('sliders.id', 'ASC')->get();
        $query = Product::withDescription()->where('page_offer', 'yes');
        $filter = $this->filter($request, $query);
        $products = $query->inRandomOrder()->get();
        $offer_ids = (new WebController())->cobonNow()['ids'];
        $cobonCategory = Cobon::where('start_date', '<=', date('Y-m-d'))->where('end_date', '>=', date('Y-m-d'))->where('type','category')->orderBy('id', 'DESC')->first();        
        if ($request->ajax()) {
            $res_filter = view('web.pages.offer_filtring')
                ->with(
                    [
                        'products' => $products,
                        'offer_ids' => $offer_ids,
                        'cobonCategory' => $cobonCategory,
                        'num' => $filter['num'],
                        'orderBy' => $filter['orderBy'],
                        'paginates' => $filter['paginates'],
                        'count_products' => $filter['count_products'],
                    ]
                )
                ->render();

            $res =
                [
                    'msg' => null,
                    'data' =>
                    [
                        'res' => $res_filter,
                        'filter' => $filter
                    ],
                    'status' => 200
                ];

            return ResponseService::response($res);
        }

        return view('web.pages.soon', get_defined_vars());
    }
    /**
     * Filter data
     *
     * @param array $request
     * @param Collection $product_id
     * @return array
     */
    private function filter($request, $query): array
    {
        $take = $this->take;
        $orderBy = null;
        if ($request->take) {
            $take = $request->take;
        }
        if ($request->category_id) {
            $category_ids = [];
            if (is_array($request->category_id)) {
                foreach ($request->category_id as $row) {
                    array_push($category_ids, $row);
                    $category = Category::find($row);
                    if (is_null($category->category_id)) {
                        $ids = Category::where('category_id', $row)->pluck('id')->toArray();
                        $category_ids = array_merge($category_ids, $ids);
                    }
                }
            } else {
                array_push($category_ids, $request->category_id);
                $ids = Category::where('category_id', $request->category_id)->pluck('id')->toArray();
                $category_ids = array_merge($category_ids, $ids);
            }

            $query->whereIn('products.category_id', $category_ids);
        }
        if (!$request->ajax()) {
            if ($request->model_id) {
                $query->where('products.category_id', $request->model_id);
            }
        }
        if ($request->offer) {
            foreach ($request->offer as $row) {
                if ($row == 'sale') {
                    $ids = $this->saleIds();
                    $query->whereRaw("products.id IN (" . implode(',', $ids) . ")");
                }
                if ($row == 'best_selling') {
                    $ids = $this->orderIds();
                    $query->whereRaw("products.id IN (" . implode(',', $ids) . ")");
                }
            }
        }
        if ($request->product_offer) {
            $query->where('ad.name', 'LIKE', '%' . $request->product_offer . '%')->orwhere('products.sku_code', 'LIKE', '%' . $request->product_offer . '%');
        }

        $count_products = $query->count();

        $paginates = $query->count() / $take;
        $num = 1;

        if ($request->num) {
            $num = $request->num;
        }

        $query->skip(($num - 1) * $take)->take($take);
        
        $query->distinct();

        $products = $query->get();
        return [
            'num' => $num,
            'take' => $take,
            'orderBy' => $orderBy,
            'products' => $products,
            'paginates' => ceil($paginates),
            'count_products' => $count_products,
        ];
    }
}
