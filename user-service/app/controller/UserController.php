<?php
namespace App\Controller;

use Service\Abst\IUserService;


class UserController
{
    private $iUserService;

    public function __construct(IUserService $iUserService)
    {
        $this->iUserService = $iUserService;
    }

    public function register() {
        $this->iUserService->register();
    }

    public function login() {
        $this->iUserService->login();
    }
}