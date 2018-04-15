<?php

namespace SpringCms\AdminAuth\App\Http\Auth;

use SpringCms\AdminAuth\App\Http\SpringAdminBaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Contracts\Auth\Guard;

class LoginController extends SpringAdminBaseController
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = 'admin/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:apicustom')->except('logout');
      
    }
    
    protected function guard()
    {
        return Auth::guard('auth:apicustom');
    }

     public function login(Guard $auth_guard)
      {
        if ($this->guard()->validate()) {
          // get the current authenticated user
          $user = $auth_guard->user();
         
          echo 'Success!';
        } else {
          echo 'Not authorized to access this page!';
        }
      }


    /**
     * Get the login username to be used by the controller.
     *
     * @return string
     */
    public function username()
    {
        return 'username';
    }


    public function showlogin($value='')
    {  
        return view('adminspringcms::auth.login');
    }

    
}
