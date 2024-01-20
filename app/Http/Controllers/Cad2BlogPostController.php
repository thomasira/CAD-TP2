<?php

namespace App\Http\Controllers;

use App\Models\Cad2BlogPost;
use Illuminate\Http\Request;
use App\Http\Resources\Cad2BlogpostResource;
class Cad2BlogPostController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blog = Cad2BlogpostResource::collection(Cad2BlogPost::paginate(10));
        return view('blog.index', compact('blog'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $date = date('Y-m-d');
        return view('blog.create', compact('date'));
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
    public function show(Cad2BlogPost $cad2BlogPost)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cad2BlogPost $cad2BlogPost)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cad2BlogPost $cad2BlogPost)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cad2BlogPost $cad2BlogPost)
    {
        //
    }
}
