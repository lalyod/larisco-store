<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "name" => "required|string",
            "password" => "required"
        ]);

        if (Auth::attempt($validator->validated(), true)) {
            $request->session()->regenerate();

            return redirect()->route("home");
        }

        return redirect()->back()->withErrors([
            'message' => 'The provided credentials do not match our records.',
        ]);
    }

    public function register(Request $request): RedirectResponse
    {
        $validator = Validator::make($request->all(), [
            "name" => "required|string|min:3|unique:users",
            "email" => "required|string|email",
            "password" => "required|string|min:6|confirmed",
            "password_confirmation" => "required|min:6"
        ]);

        if ($validator->fails()) return redirect()->back()->withErrors($validator->errors());

        User::create($validator->validated());

        return redirect()->route("auth.login.page")->with("success", "Berhasil register, silahkan login");
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('home');
    }
}
