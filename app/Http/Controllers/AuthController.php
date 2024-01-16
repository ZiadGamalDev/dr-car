<?php

namespace App\Http\Controllers;

use App\Http\Interfaces\AccountInterface;
use App\Http\Interfaces\AuthInterface;
use App\Http\Interfaces\ConfirmEmailPhoneInterface;
use App\Http\Interfaces\PasswordInterface;
use App\Http\Requests\AccountRequest;
use App\Http\Requests\changePasswordRequest;
use App\Http\Requests\ConfirmEmailRequest;
use App\Http\Requests\ForgetPasswordRequest;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\ResetPasswordRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{

    public function __construct(private AuthInterface $authInterface, private ConfirmEmailPhoneInterface $confirmEmailPhoneInterface, private PasswordInterface $passwordInterface, private AccountInterface $accountInterface)
    {
    }

    function login(LoginRequest $request)
    {
        return $this->authInterface->login($request);
    }
    function register(RegisterRequest $request)
    {
        return $this->authInterface->register($request);
    }
    public function me()
    {
        return $this->authInterface->me();
    }



    public function sendCodePhone()
    {
        return $this->confirmEmailPhoneInterface->sendCodePhone();
    }
    public function confirmCodePhone(Request $request)
    {
        return $this->confirmEmailPhoneInterface->confirmCodePhone($request);
    }
    public function confirmCodeEmail(ConfirmEmailRequest $request)
    {
        return $this->confirmEmailPhoneInterface->confirmCodeEmail($request);
    }





    function forgetPassword(ForgetPasswordRequest $request)
    {
        return $this->passwordInterface->forgetPassword($request);
    }
    function resetPassword(ResetPasswordRequest $request)
    {
        return $this->passwordInterface->resetPassword($request);
    }
    function changePassword(changePasswordRequest $request)
    {
        return $this->passwordInterface->changePassword($request);
    }




    public function showAccount()
    {
        return $this->accountInterface->show();
    }
    public function updateAccount(AccountRequest $request)
    {
        return $this->accountInterface->update($request);
    }
    public function deleteAccount()
    {
        return $this->accountInterface->delete();
    }


    public function webLogin(LoginRequest $request)
    {
        return $this->authInterface->webLogin($request);
    }
    public function webLogout()
    {
        return $this->authInterface->webLogout();
    }
}
