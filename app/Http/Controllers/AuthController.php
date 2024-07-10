<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function create()
    {
        return view('layouts.signup');
    }

    public function signform()
    {
        return view('layouts.signin');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'firstname' => 'required|string|between:3,50',
            'lastname' => 'required|string|between:3,55',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
        ]);

        $validated['password'] = Hash::make($validated['password']);
        $validated['role_id'] = 2;

        User::create($validated);
        return redirect()->route('form.signin')->with('success', 'Signed Up Successfully!');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');;
        $credentials = $request->only('email', 'password');

        $user = User::where('email', $credentials['email'])->first();

        if ($user) {
            if (Hash::check($credentials['password'], $user->password)) {
                Auth::login($user);
                $request->session()->regenerate();
                return $this->redirectTo();
            } else {
                return back()->withErrors(['password' => 'Wrong Password'])->onlyInput('email');
            }
        } else {
            return back()->withErrors(['email' => 'No user found!']);
        }
    }

    private function redirectTo()
    {
        $user = Auth::user();

      
        switch ($user->role->name) {
            case 'admin':
                return redirect()->route('dashboard');
                break;
            case 'client':
                return redirect()->route('clientdashboard');;
                break;
            default:
                return redirect('/login');
                break;
        }
    }

    public function logout()
    {
        session()->flush();;
        Auth::logout();

        return redirect()->route('form.signin');
    }
}
