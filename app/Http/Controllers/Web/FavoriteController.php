<?php

namespace App\Http\Controllers\Web;

use App\Http\Requests\Web\FavoriteRequest;
use App\Models\Favorite;
use App\Models\Product;
use App\Services\Product\Favorite\FavoriteService;
use App\Services\Product\ProductService;
use App\Services\Response\ResponseService;
use Illuminate\View\View;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;

class FavoriteController extends Controller
{
    private $view = 'web.favorite.';

    public function index(): View
    {
        $title = __('web.favorite');
        $offer_ids = (new WebController())->cobonNow();

        $favorites = (new FavoriteService())->favorites()['data'];
        $views_products = (new ProductService())->viewBefore();
        $suggest_products = (new ProductService())->suggestProducts();
        return view($this->view.'index', get_defined_vars());
    }
    public function viewFavorite()
    {
        $user_id = auth()->user()->id;
        $favoritesCount = Favorite::where('user_id', $user_id)->count();

        $response = [
            'data' => $favoritesCount
        ];

        return response()->json($response);
    }
    public function store(FavoriteRequest $request) :JsonResponse
    {
        $product = Product::find($request->product_id);
        if(!$product)
        {
            return ResponseService::notFound();
        }
        $favorites = (new FavoriteService($product))->favoriteToggle();
        return $favorites;
    }
    public function destroy($id) :JsonResponse
    {
        $favorites = (new FavoriteService())->deleteFavorite($id);
        return $favorites;
    }
}
