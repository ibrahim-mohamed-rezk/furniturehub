<?php
namespace App\Services\Response;

use Illuminate\Http\Exceptions\HttpResponseException;

/**
 * Class based Helper to upload and resize Images
 */
class ApiResponseService
{

    public static function response($response)
    {
        if($response['status'] == 200)
        {
            return response()->json
            (
                [
                    'status_code'=>true,
                    'message' => $response['msg'],
                    'data' => $response['data']
                ]
                , $response['status']
            );
        }
        throw new HttpResponseException(response()->json(['status_code'=>false,'message' => $response['msg']], $response['status']));
    }

    public static function notFound()
    {
        $status = 400;
        $msg = __('web.not_found');
        throw new HttpResponseException(response()->json(['status_code'=>false,'errors' => $msg], $status));
    }

}


