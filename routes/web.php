<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SearchController;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Schema;
use App\Models\Post;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'show']); //Shows the home page

Route::get('/search_posts/', [SearchController::class,  'search']);

Route::get('/show_post/{post:title}', [PostController::class, 'show']); //Display a view to show a particular post

Route::get('/create_post', [PostController::class, 'create'])->middleware('auth'); //Invokes the create method which would return a view to create a new post

Route::post('/create_post', [PostController::class, 'store'])->middleware('auth'); //Invokes the store method which would persist the post to the database

Route::get('/edit_post/{post:title}', [PostController::class, 'edit'])->middleware('auth'); //Invokes a method that would display a view that would enable the user edit his post

Route::put('/edit_post/{post}', [PostController::class, 'update'])->middleware('auth'); //Invokes a method that would update the post model stored in the database

Route::delete('/delete_post/{post}', [PostController::class, 'destroy'])->middleware('auth'); //The destroy method would delete a post model from the database

Route::view('/about-us', 'general/about_us');










// For testing purposes only
Route::view('test', '/general/test');


























Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
