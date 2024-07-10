<?php

namespace App\Http\Controllers\Web;

use App\Models\Governorate;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Models\SellerRequestImage;
use App\Http\Controllers\Controller;
use App\Services\Upload\ImageService;
use App\Http\Requests\Web\SellerRequest;
use App\Services\Response\ResponseService;
use App\Models\SellerRequest as ModelsSellerRequest;

class SellerController extends Controller
{
    private $view = 'web.auth.';

    /**
        * view of seller_register
        * @return view
    */
    public function seller_register()
    {
        $title = __('web.seller_register');

        $count_photos = 0;
        $action = route('web.seller_request');
        $cities = Governorate::withDescription()->get();

        return view($this->view . 'seller_register', get_defined_vars());
    }
    public function check(SellerRequest $request): JsonResponse
    {
        $content = [
            'name' => $request->name,
            'brand_name' => $request->brand_name,
            'phone' => $request->phone,
            'city_id' => $request->city,
            'email' => $request->email,
            'website_link' => $request->website_link,
            'social_media_page' =>$request->social_media_page,
            'social_media_page' => $request->social_media_page,
            'section' => $request->section,
            'question' => $request->question,
        ];
        $seller_request = ModelsSellerRequest::create($content);

        if ($seller_request) {
            $image = ImageService::uploadImage($request->image);
            SellerRequestImage::create([
                'seller_request_id' => $seller_request->id,
                'image' => $image,
            ]);
            $requestData = $request->all();

            if (isset($requestData['images'])) {
                foreach ($requestData['images'] as $row) {
                    $image = ImageService::uploadImage($row);

                    SellerRequestImage::create(['seller_request_id' => $seller_request->id, 'image' => $image]);
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
    public function addphoto(Request $request)
    {
        $key = $request->key;
        return view($this->view . 'photo', get_defined_vars());
    }
    
}
