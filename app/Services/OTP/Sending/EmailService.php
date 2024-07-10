<?php
namespace App\Services\OTP\Sending;

use App\Mail\resetMail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class EmailService implements OTPInterface
{
    public function sendOTP($requestContent) :array
    {
        $data['email']= $requestContent->email;
        $data['subject']= "FurnitureHub Reset password";
        $data['code'] = $requestContent->code;
        $sendMail = Mail::to($requestContent->email)->send(new resetMail($data));
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