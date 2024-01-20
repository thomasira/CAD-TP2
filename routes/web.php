<?php

use App\Http\Controllers\Cad2StudentController;
use App\Http\Controllers\Cad2BlogPostController;
use App\Http\Controllers\LocalizationController;
use App\Http\Controllers\CustomAuthController;
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

Route::get('/', function () { return view('welcome'); })->name('home');
Route::get('info', function () { return view('info'); })->name('info');

Route::get('students', [Cad2StudentController::class, 'index'])->name('student.index');
Route::get('blog', [Cad2BlogPostController::class, 'index'])->name('blog.index')->middleware('auth');
Route::get('blog-create', [Cad2BlogPostController::class, 'create'])->name('blog.create')->middleware('auth');
Route::post('blog-create', [Cad2BlogPostController::class, 'store'])->name('blog.store')->middleware('auth');
Route::get('blog/{cad2BlogPost}', [Cad2BlogPostController::class, 'show'])->name('blog.show')->middleware('auth');
Route::get('lang/{locale}', [LocalizationController::class, 'index'])->name('lang');
Route::get('login', [CustomAuthController::class, 'index'])->name('login');
Route::get('logout', [CustomAuthController::class, 'logout'])->name('logout');
Route::get('registration', [CustomAuthController::class, 'create'])->name('auth.create');
Route::post('registration', [CustomAuthController::class, 'store'])->name('auth.create');
Route::post('authent', [CustomAuthController::class, 'authentification'])->name('authent');
/* Route::get('etudiant-create', [Cad1EtudiantController::class, 'create'])->name('etudiant.create');
Route::post('etudiant-create', [Cad1EtudiantController::class, 'store']);
Route::get('etudiant/{cad1Etudiant}', [Cad1EtudiantController::class, 'show'])->name('etudiant.show');
Route::get('etudiant-edit/{cad1Etudiant}', [Cad1EtudiantController::class, 'edit'])->name('etudiant.edit');
Route::put('etudiant-edit/{cad1Etudiant}', [Cad1EtudiantController::class, 'update']);
Route::delete('etudiant/{cad1Etudiant}', [Cad1EtudiantController::class, 'destroy'])->name('etudiant.delete'); */



