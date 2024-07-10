<?php
namespace App\Services\Product\Favorite;

use App\Models\Product;
use App\Models\Favorite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Services\Response\ResponseService;

/**
 * Class based Helper to Send Notifications
 */
class FavoriteService
{
    private $product;

    public function __construct(Product $product = null)
    {
        $this->product = $product;
    }

    public function favorites($message = '')
    {
        $user = Auth::user() ?? app(Request::class)->user('sanctum');
        $favorites = Favorite::withattr()->where('user_id',$user->id)->get();
        $response = $favorites;
        $status = 200;
        $content =
            [
                'msg' => $message,
                'status' => $status,
                'data' => $response,
            ];
        return $content;
    }

    public function favoriteToggle()
    {
        $user = Auth::user() ?? app(Request::class)->user('sanctum');
        $fav = Favorite::where('user_id',$user->id)->where('product_id',$this->product->id)->first();
        if($fav)
        {
            $fav->delete();
        }
        else
        {
            Favorite::create([
                'product_id' => $this->product->id,
                'user_id' => $user->id,
            ]);
        }
        $message = __('web.success');
        $response = $this->favorites($message);
        return ResponseService::response($response);
    }

    public function checkFavorite()
    {
        $user = Auth::user() ?? app(Request::class)->user('sanctum');
        $favorite = Favorite::where('product_id',$this->product->id)->where('user_id',$user->id)->first();
        return $favorite ? true : false;
    }

    public function deleteFavorite($id)
    {
        $user = Auth::user() ?? app(Request::class)->user('sanctum');
        $fav = Favorite::where('user_id',$user->id)->where('id',$id)->first();
        if(!$fav)
        {
            $content =
                [
                    'msg' => [__('web.not_found')],
                    'data' => '',
                    'status' => 400,
                ];
            return ResponseService::response($content);
        }
        $fav->delete();
        $message = __('web.success');
        $response = $this->favorites($message);
        return ResponseService::response($response);
    }

}