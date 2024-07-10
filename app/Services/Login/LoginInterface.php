<?php
namespace App\Services\Login;

interface LoginInterface
{
    public function authLogin(string $type) :array;
}