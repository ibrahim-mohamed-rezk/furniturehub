<?php

namespace App\Http\Controllers\Web;

use App\Models\Category;
use App\Models\Governorate;
use App\Models\SellerRequestBranch;
use App\Models\SellerRequestSocialMedia;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Models\SellerRequestImage;
use App\Http\Controllers\Controller;
use App\Services\Upload\ImageService;
use App\Http\Requests\Web\SellerRequest;
use App\Services\Response\ResponseService;
use App\Models\SellerRequest as ModelsSellerRequest;
use Illuminate\View\View;

class SellerController extends Controller
{
    private $view = 'web.pages.';

    /**
        * view of seller_register
        * @return view
    */
    public function seller_register() : view
    {
        $title = __('web.seller_register');

        $count_photos = 0;
        $action = route('web.seller_request');
        $governorates = Governorate::withDescription()->get();
        $categories = Category::withDescription()->get();
        $banner= Slider::withDescription(34)->first();
        return view($this->view . 'seller.seller', get_defined_vars());
    }
    public function check(Request $request): JsonResponse
    {
        dd($request->all());
        $content = [
            'full_name' => $request->full_name,
            'brand_name' => $request->brand_name,
            'phone' => $request->phone,
            'governorate_id'=>$request->governorate_id,
            'city_id' => $request->city_id,
            'email' => $request->email,
            'website_url' => $request->website_url,
            'specialization_id' =>$request->specialization_id,
            'other_specializations' => $request->other_specializations,
            'question_one' => $request->question_one,
            'question_two' => $request->question_two,
            'platforms'=>$request->platforms,
            'number_of_branches' => $request->number_of_branches,
        ];

        $seller_request = ModelsSellerRequest::create($content);

        if ($seller_request) {
            $requestData = $request->all();

            if (isset($requestData['images'])) {
                foreach ($requestData['images'] as $row) {
                    $image = ImageService::uploadImage($row);

                    SellerRequestImage::create(['seller_request_id' => $seller_request->id, 'image' => $image]);
                }
            }
            if (isset($requestData['social_media_pages'])) {
                foreach ($requestData['social_media_pages'] as $row) {
                    SellerRequestSocialMedia::create([
                        'seller_request_id' => $seller_request->id,
                        'url' => $row->url,
                        'position'=>$row->position,
                    ]);
                }
            }
            if (isset($requestData['branches'])) {
                foreach ($requestData['branches'] as $row) {
                    SellerRequestBranch::create([
                        'seller_request_id' => $seller_request->id,
                        'name' => $row->name,
                    ]);
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
