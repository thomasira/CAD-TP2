<?php

namespace App\Http\Controllers;

use App\Models\Cad2Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
class Cad2DocumentController extends Controller
{

    public function index() {
        $documents = Cad2Document::paginate(10);
        return view('document.index', compact('documents'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function download(Cad2Document $cad2Document)
    {
        return Storage::download($cad2Document->filename);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function upload(Request $request)
    {
        $request->validate([
            'file' => 'required | file | max:2048',
            'name' => 'required | min:3 | max:80'
        ]);
        $path = $request->file('file')->store('public/storage');
        Cad2Document::create([
            'name' => $request->name,
            'filename' =>$path,
            'student_id' => Auth::user()->id
        ]);
        return redirect(route('blog.index'))->withSuccess('file uplaoded');
    }

    /**
     * Display the specified resource.
     */
    public function show(Cad2Document $cad2Document)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cad2Document $cad2Document)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cad2Document $cad2Document)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cad2Document $cad2Document)
    {
        $cad2Document->delete();
        Storage::delete($cad2Document->filename);
        return 'succesws';
    }
}
