<?php
namespace App\Services\OTP\Sending;

class OTPSendService
{
    private $otp;

    public function __construct(OTPInterface $otp)
    {
        $this->otp = $otp;
    }

    public function sendOTP($requestContent) :array
    {
        return $this->otp->sendOTP($requestContent);
    }
}