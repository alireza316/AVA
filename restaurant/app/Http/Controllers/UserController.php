<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function getRegister()
    {
        return view('register');
    }
    public function postRegister(RegisterRequest $request) {
        $validated = $request->validated();

        $user = new User();
        $user->email = $validated['email'];
        $user->password = Hash::make($validated['password']);
        $user->save();

        return redirect(route('getLogin'));
    }

    public function getLogin()
    {
        return view('login');
    }

    public function postLogin(LoginRequest $request) {
        $validated = $request->validated();

        $user = User::where('email', $validated['email'])->first();
        if (!Hash::check($validated['password'], $user['password'])) {
            return back()->with('error', 'password mismatch!');
        }

        Auth::login($user);

        return redirect()->route('getMenu');
    }
}
