<?php
namespace App\Services\Login;

class LoginSocialService implements LoginInterface
{
    public function authLogin($requestContent) :array
    {
        $status = 400;
        $msg = [__('web.checkinputs')];
        $target = route('web.login');

        $response =
            [
                'status' => $status,
                'msg' => $msg,
                'data'=>$target,
            ];
        return $response;
    }
}