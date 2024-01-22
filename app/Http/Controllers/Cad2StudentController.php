<?php

namespace App\Http\Controllers;

use App\Models\Cad2Student;
use App\Models\Cad2City;
use Illuminate\Support\Facades\Auth;
use App\Models\Cad2Blogpost;
use Illuminate\Http\Request;
use App\Http\Resources\Cad2BlogpostResource;
use App\Models\Cad2Document;

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
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Cad2Student $cad2Student)
    {
        $blogPost = Cad2BlogpostResource::collection($cad2Student->blogPost);
        return view('student.show',compact('cad2Student', 'blogPost'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cad2Student $cad2Student)
    {
        $cities = Cad2City::all();
        return view('student.edit', compact('cities'));
    }

    public function profile(Cad2Student $cad2Student)
    {
        if($cad2Student->user_id !== Auth::user()->id) return redirect(route('blog.index'));
        $blogpost = Cad2BlogpostResource::collection($cad2Student->blogpost)->resolve();
        $documents = $cad2Student->document;
        return view('profile.profile',compact('cad2Student', 'blogpost', 'documents'));
    }
    
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cad2Student $cad2Student)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cad2Student $cad2Student)
    {
        //
    }
}
