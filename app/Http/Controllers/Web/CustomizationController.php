<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\Web\CustomizationRequest;
use App\Models\Demand;
use App\Models\DemandImage;
use App\Services\Response\ResponseService;
use App\Services\Upload\ImageService;
use App\Services\Upload\FileService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CustomizationController extends Controller
{
    private $view = 'web.customization.';

    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $title = __('web.customization');
        $action = route('web.customization.check');
        $count_photos = 0;
        return view($this->view . 'customization', get_defined_vars());

    }

    public function check(CustomizationRequest $request): JsonResponse
    {
        if(isset($request->pdf)){

            $pdf = FileService::uploadFile($request->pdf);
        }else{
            $pdf = "defualt.pdf";
        }
        $content = [
            'name' => $request->fullname,
            'state' => $request->state,
            'phone' => $request->phone,
            'address' => $request->address,
            'size' => $request->size,
            'file' => $pdf,
            'cost_status' => $request->cost_state,
            'date' => $request->receiving_date,
        ];
        $Demand = Demand::create($content);
        if ($Demand) {
            $image = ImageService::uploadImage($request->image);
            $dimension = $request->dimension;
            DemandImage::create([
                'demand_id' => $Demand->id,
                'image' => $image,
                'status' => 'image',
                'sizes' =>$dimension
            ]);
            $requestData = $request->all();


            if (isset($requestData['images']) && isset($requestData['dimensions'])) {
                $array = array_map($requestData['images'] ,$requestData['dimensions']);
                foreach ($array as [$row,$dim]) {
                    $image = null;
                    if (isset($row['image'])) {
                        $image = ImageService::uploadImage($row['image']);
                    }

                    DemandImage::create(['demand_id' => $Demand->id, 'image' => $image,'status' =>'image','sizes'=>$dim]);
                }
            }

            if (isset($requestData['images_extensions']) && isset($requestData['dimensions_extensions'])) {
                $array = array_map($requestData['images_extensions'] ,$requestData['dimensions_extensions']);
                foreach ($array as [$row,$dim]) {
                    $image = null;
                    if (isset($row['image'])) {
                        $image = ImageService::uploadImage($row['image']);
                    }

                    DemandImage::create(['demand_id' => $Demand->id, 'image' => $image,'status' =>'extension','sizes'=>$dim]);
                }
            }
            $status = 200;
            $msg = __('web.success');
            $target = route('web.index');

        }else{
            $status = 400;
            $msg = ["dfjso"];
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

    /**
     * Display a listing of the resource.
     * @param Request $request
     * @return view
     */
    public function addphoto(Request $request): View
    {
        $key = $request->key;
        return view($this->view . 'photo', get_defined_vars());
    }
    public function addextension(Request $request): View
    {
        $key = $request->key;
        return view($this->view . 'extension', get_defined_vars());
    }
}
