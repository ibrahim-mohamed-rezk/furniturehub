<?php

namespace App\Http\Controllers\Web;

use App\Models\Slider;
use App\Models\Category;
use App\Models\Quantity;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Models\QuantityImage;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Services\Upload\ImageService;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\Web\QuantityRequest;
use App\Services\Response\ResponseService;

class QuantitiesController extends Controller
{
    private $view = 'web.quantities.';
    public function index() : View
    {
        $title = __('web.wholesale_orders_and_quantities');
        $count_photos = 0;
        $action = route('web.quantities_check');
        $categories = Category::withDescription()->where('categories.category_id',null)->get();
        $banner = Slider::withDescription(17)->get();
        return view($this->view . 'index',get_defined_vars());

    } 
    public function quantities_check(QuantityRequest $request) : JsonResponse
    {
        $content = [
            'name' => $request->name,
            'business_activity' => $request->business_activity,
            'phone' => $request->phone,
            'notes' => $request->notes ?? '',
        ];
        $quanities = Quantity::create($content);

        if ($quanities) {
            $image = ImageService::uploadImage($request->image);
            QuantityImage::create([
                'quantity_id' => $quanities->id,
                'image' => $image,
            ]);
            $requestData = $request->all();

            if (isset($requestData['images'])) {
                foreach ($requestData['images'] as $row) {
                    $image = ImageService::uploadImage($row);

                    QuantityImage::create(['quantity_id' => $quanities->id, 'image' => $image]);
                }
            }

            $status = 200;
            $msg = __('web.success');
            $target = route('web.index');

        }else{
            $status = 400;
            $msg = ["failed"];
            $target = route('web.index');

        }


        $response =
            [
            'status' => $status,
            'msg' => $msg,
            'data' => $target,
        ];
        return ResponseService::response($response);
    }
    public function addphotoquantities(Request $request)
    {
        $key = $request->key;
        return view($this->view . 'photo', get_defined_vars());
    }
}
