<?php

namespace App\Http\Controllers;

use App\Models\Cad2City;
use App\Models\Cad2Student;
use App\Models\Cad2User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class CustomAuthController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cities = Cad2City::all();
        return view('auth.create', compact('cities'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'min:3 | max:45',
            'email' => 'required | email | unique:cad2_users',
            'password' => 'min:6 | max:20 | confirmed',
            'address' => 'required | min:6 | max: 100',
            'city_id' => 'required | exists:cad2_cities,id',
            'd_o_b' => 'max:12 | date'
        ]);

        $user = new Cad2User;
        $user->fill($request->all());
        $user->password = Hash::make($request->password);
        $user->save();

        $student = new Cad2Student;
        $student->fill($request->all());
        $student->user_id = $user->id;
        $student->save();

        Auth::login($user);
        return redirect(route('profile', $user->id));
    }

    /**
     * Display the specified resource.
     */
    public function show(Cad2User $cad2User)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cad2User $cad2User)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cad2User $cad2User)
    {
        //
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
        return redirect()->intended(route('home'));
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cad2User $cad2User)
    {
        //
    }
    public function logout() 
    {
        Auth::logout();
        return redirect(route('login'));
    }
}
