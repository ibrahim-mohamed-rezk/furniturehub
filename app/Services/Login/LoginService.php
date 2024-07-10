<?php
namespace App\Services\Login;

class LoginService
{
    private $login;

    public function __construct(LoginInterface $login)
    {
        $this->login = $login;
    }

    public function authLogin(array $requestContent) :array
    {
        return $this->login->authLogin($requestContent);
    }
}