<?php

namespace App\Http\Controllers\API\V1;

use App\Models\Address;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Web\AddressRequest;
use App\Http\Resources\AddressResource;
use App\Services\Response\ApiResponseService;

class AddressController extends Controller
{
    public function index(Request $request)
    {
        $addresses = Address::where('user_id', $request->user()->id)->get();
        return AddressResource::collection($addresses);
    }
    public function store(AddressRequest $request)
    {
        $content = $request->all();
        $content['user_id'] = $request->user()->id;
        $address = Address::create($content);
        if ($address) {
            $response =
                [
                    'status' => 200,
                    'msg' => __('web.success'),
                    'data' => new AddressResource($address),
                ];
            return ApiResponseService::response($response);
        }
        $response =
            [
                'status' => 400,
                'msg' => __('web.faild'),
                'data' => [],
            ];
        return ApiResponseService::response($response);
    }
    public function update(AddressRequest $request, $id)
    {
        $address = Address::findOrFail($id);

        $update = $address->update($request->all());
        if ($update) {
            $status = 200;
            $msg = __('web.success');
            $target = new AddressResource($address);
        } else {
            $status = 400;
            $msg = [__('web.failed')];
            $target = [];
        }

        $response =
            [
                'status' => $status,
                'msg' => $msg,
                'data' => $target,
            ];
        return ApiResponseService::response($response);
    }
    public function default_address(Request $request, $id)
    {
        $address = Address::findOrFail($id);

        $address->update([
            'default_address' => 1,
        ]);

        $default = Address::where('id', '<>', $id)
            ->where('user_id', $request->user()->id)
            ->update([
                'default_address' => "0",
            ]);

        if ($default) {
            $status = 200;
            $msg = __('web.success');
            $target = new AddressResource($address);
        } else {
            $status = 400;
            $msg = [__('web.failed')];
            $target = [];
        }

        $response =
            [
                'status' => $status,
                'msg' => $msg,
                'data' => $target,
            ];
        return ApiResponseService::response($response);
    }
    public function delete_address(Request $request,$id)
    {
        $address = Address::where('id',$id)
        ->where('user_id', $request->user()->id)
        ->first();
        
        if ($address) {
            $address->delete();
            $status = 200;
            $msg = __('web.success');
            $target = new AddressResource($address);
        } else {
            $status = 400;
            $msg = [__('web.failed')];
            $target = [];
        }

        $response =
            [
                'status' => $status,
                'msg' => $msg,
                'data' => $target,
            ];
        return ApiResponseService::response($response);

    }
}
