<?php


namespace App\Http\Controllers;


use App\Http\Controllers\Auth\LoginController;
use Illuminate\Http\Request;


class CaptchaController extends LoginController
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function myCaptcha()
    {
        return view('myCaptcha');
    }


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function myCaptchaPost(Request $request)
    {
        request()->validate([
            'email' => 'required|email',
            'password' => 'required',
            'captcha' => 'required|captcha'
        ],
            ['captcha.captcha'=>'Invalid captcha code.']);
        return $this->login($request);
    }

}