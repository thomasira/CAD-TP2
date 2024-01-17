<?php

namespace App\Http\Controllers;

use App\Models\Cad2Student;
use Illuminate\Http\Request;

class Cad2StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Cad2Student::all();
        return $students->first()->studentHasCity();
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cad2Student $cad2Student)
    {
        //
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
