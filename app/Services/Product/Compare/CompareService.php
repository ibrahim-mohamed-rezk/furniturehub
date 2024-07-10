<?php
namespace App\Services\Product\Compare;

use App\Models\Compare;
use App\Models\Product;
use App\Services\Response\ResponseService;
use Illuminate\Support\Facades\Auth;

/**
 * Class based Helper to Send Notifications
 */
class CompareService
{
    private $product;

    public function __construct(Product $product = null)
    {
        $this->product = $product;
    }

    public function compares($message = '')
    {
        $user = Auth::user();
        $compares = Compare::withattr()->where('user_id',$user->id)->limit(3)->orderBy('id','DESC')->get();
        $response = $compares;
        $status = 200;
        $content =
            [
                'msg' => $message,
                'status' => $status,
                'data' => $response,
            ];
        return $content;
    }

    public function addProductCompare()
    {
        $user = Auth::user();
        $compare = Compare::where('user_id',$user->id)->orderBy('id','DESC')->first();
        if(!$compare)
        {
            Compare::create([
                'product_id' => $this->product->id,
                'user_id' => $user->id,
            ]);
        }
        else
        {
            $compare_ids = Compare::where('user_id',$user->id)->orderBy('id','DESC')->limit(3)->pluck('product_id')->toArray();
            if(!in_array($this->product->id,$compare_ids))
            {
                Compare::create([
                    'product_id' => $this->product->id,
                    'user_id' => $user->id,
                ]);
            }
        }
        $message = __('web.success');
        $response = $this->compares($message);
        return ResponseService::response($response);
    }

    public function deleteCompare($id)
    {
        $user = Auth::user();
        $compare = Compare::where('user_id',$user->id)->where('id',$id)->first();
        if(!$compare)
        {
            $content =
                [
                    'msg' => [__('web.not_found')],
                    'data' => '',
                    'status' => 400,
                ];
            return ResponseService::response($content);
        }
        $compare->delete();
        $message = __('web.success');
        $response = $this->compares($message);
        return ResponseService::response($response);
    }

}