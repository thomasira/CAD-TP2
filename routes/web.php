<?php

use App\Http\Controllers\Cad2StudentController;
use App\Http\Controllers\Cad2BlogPostController;
use App\Http\Controllers\Cad2DocumentController;
use App\Http\Controllers\LocalizationController;
use App\Http\Controllers\CustomAuthController;
use App\Models\Cad2Document;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
//static routes
Route::get('/', function () { return view('welcome'); });
Route::get('info', function () { return view('info'); })->name('info');
Route::get('login', [CustomAuthController::class, 'index'])->name('login');
Route::post('authent', [CustomAuthController::class, 'authentification'])->name('authent');
Route::get('student-create', [Cad2StudentController::class, 'create'])->name('student.create');
Route::post('student-create', [Cad2StudentController::class, 'store'])->name('student.store');

//locale-lang
Route::get('lang/{locale}', [LocalizationController::class, 'index'])->name('lang');

//auth locked
Route::middleware('auth')->group(function() {

    //home
    Route::get('home', [Cad2BlogPostController::class, 'home'])->name('home');

    //student
    Route::get('students', [Cad2StudentController::class, 'index'])->name('student.index');
    Route::get('student-edit/{cad2Student}', [Cad2StudentController::class, 'edit'])->name('student.edit');
    Route::put('student-edit/{cad2Student}', [Cad2StudentController::class, 'update'])->name('student.update');
    Route::delete('student-delete/{cad2Student}', [Cad2StudentController::class, 'destroy'])->name('student.delete');
    Route::get('profile/{cad2Student}', [Cad2StudentController::class, 'profile'])->name('profile');

    //blog
    Route::get('blog', [Cad2BlogPostController::class, 'index'])->name('blog.index');
    Route::get('blog/{cad2BlogPost}', [Cad2BlogPostController::class, 'show'])->name('blog.show');
    Route::get('blog-create', [Cad2BlogPostController::class, 'create'])->name('blog.create');
    Route::post('blog-create', [Cad2BlogPostController::class, 'store'])->name('blog.store');
    Route::get('blog-edit/{cad2BlogPost}', [Cad2BlogPostController::class, 'edit'])->name('blog.edit');
    Route::put('blog-edit/{cad2BlogPost}', [Cad2BlogPostController::class, 'update'])->name('blog.update');
    Route::delete('blog/{cad2BlogPost}', [Cad2BlogPostController::class, 'destroy'])->name('blog.delete'); 

    //auth and login
    Route::get('logout', [CustomAuthController::class, 'logout'])->name('logout');

    //document
    Route::get('documents', [Cad2DocumentController::class, 'index'])->name('document.index');
    Route::get('document-create', [Cad2DocumentController::class, 'create'])->name('document.create');
    Route::get('document-edit/{cad2Document}', [Cad2DocumentController::class, 'edit'])->name('document.edit');
    Route::put('document-edit/{cad2Document}', [Cad2DocumentController::class, 'update'])->name('document.update');
    Route::post('upload', [Cad2DocumentController::class, 'upload'])->name('document.upload');
    Route::get('download/{cad2Document}', [Cad2DocumentController::class, 'download'])->name('document.download');
    Route::delete('document/{cad2Document}', [Cad2DocumentController::class, 'destroy'])->name('document.delete'); 
});






