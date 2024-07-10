<?php
namespace App\Services\OTP\Sending;

interface OTPInterface
{
    public function sendOTP(string $type) :array;
}