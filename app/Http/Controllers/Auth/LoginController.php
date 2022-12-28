<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\AuthRequest;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware("auth")->only("logout");
        $this->middleware("guest")->except("logout");
    }

    public function showLoginForm(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        return view("auth.login");
    }

    /**
     * @param AuthRequest $request
     * @return RedirectResponse
     * @throws ValidationException
     */
    public function login(AuthRequest $request): RedirectResponse
    {
        $fields = $request->validated();

        if (!Auth::attempt($fields)) {
            throw ValidationException::withMessages([
                "email" => "Email doesn't exist"
            ]);
        }

        return to_route("admin.dashboard");

    }

    public function logout(): RedirectResponse
    {
        Session::flush();
        Auth::logout();
        return to_route("home");
    }
}
