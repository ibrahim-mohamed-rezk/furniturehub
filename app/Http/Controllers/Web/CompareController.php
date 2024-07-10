<?php

namespace App\Http\Controllers\Web;

use App\Http\Requests\Web\CompareRequest;
use App\Models\Product;
use App\Models\Cobon;

use App\Services\Product\ProductService;
use App\Services\Response\ResponseService;
use Illuminate\View\View;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Services\Product\Compare\CompareService;

class CompareController extends Controller
{
    private $view = 'web.compare.';

    public function index(): View
    {
        $title = __('web.compare');
        $offer_ids = (new WebController())->cobonNow();
        $compares = (new CompareService())->compares()['data'];
        $views_products = (new ProductService())->viewBefore();
        $suggest_products = (new ProductService())->suggestProducts();
        return view($this->view.'index', get_defined_vars());
    }
    public function store(CompareRequest $request) :JsonResponse
    {
        $product = Product::find($request->product_id);
        if(!$product)
        {
            return ResponseService::notFound();
        }
        $compares = (new CompareService($product))->addProductCompare();
        return $compares;
    }
    public function destroy($id) :JsonResponse
    {
        $compares = (new CompareService())->deleteCompare($id);
        return $compares;
    }
}
