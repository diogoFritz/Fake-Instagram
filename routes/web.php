<?php


use Illuminate\Support\Facades\Route;

//incluir full path para reduzir texto nos routes
use App\Http\Controllers\PostsController;
use App\Http\Controllers\ProfilesController;
use App\Http\Controllers\FollowsController;
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


/* Route::get('/', function () {
    return view('welcome');
}); */

Auth::routes();

Route::post('follow/{user}',[FollowsController::class, 'store']);

//ordem dos routes é importante
Route::get('/',[PostsController::class, 'index']);
Route::get('/p/create', [PostsController::class, 'create']);
Route::get('/p/{post}', [PostsController::class, 'show']);
Route::post('/p', [PostsController::class, 'store']);
//Route::get('/p/create', [App\Http\Controllers\PostsController::class, 'create']);


Route::get('/profile/{user}',        [App\Http\Controllers\ProfilesController::class, 'index'])->name('profile.show');
Route::get('/profile/{user}/edit', [App\Http\Controllers\ProfilesController::class, 'edit'])->name('profile.edit');
Route::patch('/profile/{user}', [App\Http\Controllers\ProfilesController::class, 'update'])->name('profile.update');
