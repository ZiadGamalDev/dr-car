<?php

namespace App\Http\Interfaces;

interface AuthInterface
{
    public function login($request);

    public function logout();

    public function register($request);
    
    public function me();

    public function webLogin($request);

    public function webLogout();
}