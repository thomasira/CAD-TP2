<?php

namespace App\Http\Controllers;

use App\Models\Cad2Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Http\Resources\Cad2DocumentResource;

class Cad2DocumentController extends Controller
{
    public function index() {
        $documents = Cad2DocumentResource::collection(Cad2Document::select()->orderBy('updated_at', 'DESC')->paginate(10));
        return view('document.index', compact('documents'));
    }

    public function create()
    {
        return view('document.create');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function download(Cad2Document $cad2Document)
    {
        return Storage::download($cad2Document->filename);
    }

    public function edit(Cad2Document $cad2Document)
    {
        if($cad2Document->student_id !== Auth::user()->id) return redirect(route('blog.index'));
        $document = $cad2Document;
        $names = json_decode($cad2Document->name);
        $document->name = $names->fr;
        $document->name_en = $names->en;
        return view('document.edit', compact('document'));
    }

    public function update(Request $request, Cad2Document $cad2Document)
    {
        $request->validate([
            'name' => 'required | min:3 | max:80',
            'name_en' => 'max:80'
        ]);
        $name = [
            "fr"=>$request->name,
            "en"=>$request->name_en
        ];
        $cad2Document->update([
            'name' => json_encode($name)
        ]);
        return redirect()->route('profile', Auth::user()->id)->withSuccess(trans('lang.dialog-edit-success'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function upload(Request $request)
    {
        $request->validate([
            'file' => 'required | file | max:2048 | mimes:pdf,zip,doc',
            'name' => 'required | min:3 | max:80',
            'name_en' => 'max:80'
        ]);
        $path = $request->file('file')->store('public/storage');
        $name = [
            "fr"=>$request->name,
            "en"=>$request->name_en
        ];
        Cad2Document::create([
            'name' => json_encode($name),
            'filename' => $path,
            'student_id' => Auth::user()->id
        ]);
        return redirect()->route('profile', Auth::user()->id)->withSuccess(trans('lang.dialog-upload-success'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cad2Document $cad2Document)
    {
        $cad2Document->delete();
        Storage::delete($cad2Document->filename);
        return redirect()->route('profile', Auth::user()->id)->withSuccess(trans('lang.dialog-delete-success'));
    }
}
