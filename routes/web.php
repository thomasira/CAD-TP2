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

//home
Route::get('home', [Cad2BlogPostController::class, 'home'])->name('home')->middleware('auth');

//student
Route::get('students', [Cad2StudentController::class, 'index'])->name('student.index');
Route::get('student-create', [Cad2StudentController::class, 'create'])->name('student.create');
Route::get('student/{cad2Student}', [Cad2StudentController::class, 'show'])->name('student.show')->middleware('auth');
Route::get('student-edit/{cad2Student}', [Cad2StudentController::class, 'edit'])->name('student.edit');
Route::get('profile/{cad2Student}', [Cad2StudentController::class, 'profile'])->name('profile')->middleware('auth');

//blog
Route::get('blog', [Cad2BlogPostController::class, 'index'])->name('blog.index')->middleware('auth');
Route::get('blog/{cad2BlogPost}', [Cad2BlogPostController::class, 'show'])->name('blog.show')->middleware('auth');
Route::get('blog-create', [Cad2BlogPostController::class, 'create'])->name('blog.create')->middleware('auth');
Route::post('blog-create', [Cad2BlogPostController::class, 'store'])->name('blog.store')->middleware('auth');
Route::get('blog-edit/{cad2BlogPost}', [Cad2BlogPostController::class, 'edit'])->name('blog.edit')->middleware('auth');
Route::put('blog-edit/{cad2BlogPost}', [Cad2BlogPostController::class, 'update'])->name('blog.update')->middleware('auth');
Route::delete('blog/{cad2BlogPost}', [Cad2BlogPostController::class, 'destroy'])->name('blog.delete'); 

//locale-lang
Route::get('lang/{locale}', [LocalizationController::class, 'index'])->name('lang');

//auth and login
Route::get('login', [CustomAuthController::class, 'index'])->name('login');
Route::get('logout', [CustomAuthController::class, 'logout'])->name('logout');
Route::get('registration', [CustomAuthController::class, 'create'])->name('auth.create');
Route::post('registration', [CustomAuthController::class, 'store'])->name('auth.create');
Route::post('authent', [CustomAuthController::class, 'authentification'])->name('authent');

//document
Route::get('documents', [Cad2DocumentController::class, 'index'])->name('document.index')->middleware('auth');
Route::post('upload', [Cad2DocumentController::class, 'upload'])->name('document.upload')->middleware('auth');
Route::get('download/{cad2Document}', [Cad2DocumentController::class, 'download'])->name('document.download')->middleware('auth');
Route::delete('document/{cad2Document}', [Cad2DocumentController::class, 'destroy'])->name('document.delete'); 



