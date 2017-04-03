<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }


    public function showLoginForm()
    {
        return View('welcome');
    }

    protected function redirectTo()
    {
        return '/'.Auth::user()->role->title.'/dashboard';
    }

    public function username()
    {
        return 'username';
    }
}
