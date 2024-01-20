<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\Cad2BlogpostResource;
use App\Models\Cad2Student;
use App\Models\Cad2BlogPost;

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
        $request->validate([
            'title' => 'min:3 | max:50 | required',
            'title_en' => 'max:50',
            'article' => 'min:10 | required',
        ]);
        $title = [
            "fr"=>$request->title,
            "en"=>$request->title_en
        ];
        $article = [
            "fr"=>$request->article,
            "en"=>$request->article_en
        ];
        $newBlog = Cad2BlogPost::create([
            'title' => json_encode($title),
            'article' => json_encode($article),
            'student_id' => Auth::user()->id,
        ]);
        return redirect(route('blog.show', $newBlog));
    }

    /**
     * Display the specified resource.
     */
    public function show(Cad2BlogPost $cad2BlogPost)
    {
        $blog = new Cad2BlogpostResource($cad2BlogPost);
        $blog = $blog->resolve();
        return view('blog.show', compact('blog'));
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
