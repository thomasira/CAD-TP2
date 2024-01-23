<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Http\Resources\Cad2BlogpostResource;
use App\Http\Resources\Cad2DocumentResource;
use App\Models\Cad2Student;
use App\Models\Cad2City;
use App\Models\Cad2User;

class Cad2StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Cad2Student::with('city')->paginate(10);
        return view('student.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cities = Cad2City::all();
        return view('student.create', compact('cities'));
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
        return redirect(route('profile', $user->id))->withSuccess(trans('lang.dialog-account-success'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cad2Student $cad2Student)
    {
        if($cad2Student->user_id !== Auth::user()->id) return redirect(route('blog.index'));

        $cities = Cad2City::all();
        $student = $cad2Student;
        return view('student.edit', compact('student', 'cities'));
    }

    public function profile(Cad2Student $cad2Student)
    {
        if($cad2Student->user_id !== Auth::user()->id) return redirect(route('blog.index'));
        
        $blogpost = Cad2BlogpostResource::collection($cad2Student->blogpost)->resolve();
        $documents = Cad2DocumentResource::collection($cad2Student->document)->resolve();
        return view('profile.profile',compact('cad2Student', 'blogpost', 'documents'));
    }
    
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cad2Student $cad2Student)
    {
        $request->validate([
            'name' => 'min:3 | max:45',
            'city_id' => 'required | exists:cad2_cities,id',
            'd_o_b' => 'max:12 | date'
        ]);

        if($request->email != $cad2Student->user->email) {
            $request->validate([
                'email' => 'required | email | unique:cad2_users'
            ]);
        }

        $cad2Student->user->update([
            'email' => $request->email
        ]);

        $cad2Student->update([
            'name' => $request->name,
            'phone' => $request->phone,
            'd_o_b' => $request->d_o_b,
            'city_id' => $request->city_id
        ]);
        return redirect(route('profile', Auth::user()->id))->withSuccess(trans('lang.dialog-edit-success'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cad2Student $cad2Student)
    {
        $cad2Student->user->delete();
        return redirect()->route('login')->withSuccess(trans('lang.dialog-delete-user-success'));
    }
}
