<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function login()
    {
        return view("pages.auth.login", [
            'title' => 'login'
        ]);
    }

    public function register()
    {
        return view("pages.auth.register", [
            "title" => "register"
        ]);
    }
}
