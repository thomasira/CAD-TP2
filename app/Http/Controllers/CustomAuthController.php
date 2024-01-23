<?php

namespace App\Http\Controllers;

use App\Models\Cad2City;
use App\Models\Cad2Student;
use App\Models\Cad2User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class CustomAuthController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function authentification(Request $request) 
    {   
        $request->validate([
            'email' => 'email | required | exists:cad2_users',
            'password' => 'min:6 | max: 20 | alpha_dash'
        ]);

        $credentials = $request->only('email', 'password');
        if(!Auth::validate($credentials)) {
            return redirect(route('login'))->withErrors(trans('auth.password'))->withInput();
        }
        $user = Auth::getProvider()->retrieveByCredentials($credentials);
        
        Auth::login($user);
        return redirect()->route('profile', Auth::user()->id);
    }

    public function logout() 
    {
        Auth::logout();
        return redirect(route('login'));
    }
}
