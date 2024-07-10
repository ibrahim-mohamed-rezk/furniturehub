<?php
namespace App\Services\OTP;

use App\Models\PhoneCode;
use App\Services\OTP\Sending\EmailService;
use App\Services\OTP\Sending\OTPSendService;
use App\Services\OTP\Sending\SMSService;
use Illuminate\Support\Facades\Config;

/**
 * Class based Helper to Send Notifications
 */
class OTPService
{
    public static function CheckOTP($content)
    {
        $data = PhoneCode::where($content['type'],$content['target'])->orderBy('id','DESC')->first();

        if($data)
        {
            $minutes = Config::get('app.minutes');
            $max_time = date('Y-m-d H:i:s',strtotime('+ '.$minutes. ' minutes'));
            $time_now = date('Y-m-d H:i:s');
            if($data->code == $content['code'] && $time_now <= $max_time)
            {
                session()->put('target', $content['target']);
                session()->put('type', $content['type']);
                $message = __('web.success');
                $response = route('web.reset_password');
                $status = 200;
                return
                [
                    'msg'=>$message,
                    'data'=>$response,
                    'status'=>$status
                ];
            }
        }

        $res_check = Self::CheckSendOTP($content);
        if($res_check['status'] != 200)
        {
            return $res_check;
        }

        $message = [__('web.code_wrong')];
        // $response = Self::SendOTP($content)['msg'];
        $status = 400;
        return
        [
            'msg'=>$message,
            'data'=>[],
            'status'=>$status
        ];
    }

    public static function CheckSendOTP($content)
    {
        $counter = PhoneCode::where($content['type'],$content['target'])->whereDate('created_at',date('Y-m-d'))->count();

        $count = Config::get('app.counter_otp');
        if($counter >= $count)
        {
            $message = [__('web.max_today')];
            $responseData = route('web.forget_password');
            $status = 400;
        }
        else
        {
            $message = __('web.success');
            $responseData = route('web.verify_forget_password').'?'.$content['type'].'='.$content['target'];
            $status = 200;
        }
        return
        [
            'msg'=>$message,
            'data'=>$responseData,
            'status'=>$status
        ];
    }

    public static function SendOTP($content)
    {
        $code = rand(11111,99999);
        // $code = 12345;
        $count = Config::get('app.counter_otp');
        $res_check = Self::CheckSendOTP($content);

        if($res_check['status'] != 200)
        {
            return $res_check;
        }

        $otp = PhoneCode::create
        ([
            $content['type'] => $content['target'],
            'code'=>$code
        ]);
        switch ($content['type']) {
            case 'phone':
                $sendOTP = new OTPSendService(new SMSService());
                $response = $sendOTP->sendOTP($otp);
                break;
            default:
                $sendOTP = new OTPSendService(new EmailService());
                $response = $sendOTP->sendOTP($otp);
        }

        return $response;
    }

}


