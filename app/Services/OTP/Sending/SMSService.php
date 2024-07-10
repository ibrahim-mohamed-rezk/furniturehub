<?php
namespace App\Services\OTP\Sending;

class SMSService implements OTPInterface
{
    public function sendOTP($requestContent) :array
    {
        $status = 200;
        $msg = __('web.success');

        $response =
        [
            'status' => $status,
            'msg' => $msg,
        ];
        return $response;
    }
}