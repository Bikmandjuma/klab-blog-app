<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;

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

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/addnewblog', [App\Http\Controllers\BlogController::class, 'addblog'])->name('adddata');
Route::get('/home', [BlogController::class, 'Usersfn']);
Route::get('/user/{id}',[BlogController::class,'myprofiles']);
Route::get('edit-user/{id}', [BlogController::class, 'edit_image']);
Route::post('update-user/{id}', [BlogController::class, 'update_image'])->name('user');
Route::post('addblogdata', [BlogController::class,'addblog'])->name('adddata');
Route::get('myblog', [BlogController::class,'MyBlog']);
Route::get('deleteblog/{id}', [BlogController::class,'DeleteMyBlog']);
Route::get('/UserBlog/{id}', [BlogController::class,'UserBlogfn'])->name('UserBlog');
Route::post('/like-post/{id}',[BlogController::class,'likePost'])->name('like.post');
Route::post('/unlike-post/{id}',[BlogController::class,'unlikePost'])->name('unlike.post');
Route::get('Follow/{id}',[BlogController::class,'following']);
Route::get('delete/{id}',[BlogController::class,'unfollowing'])->name('delete');
Route::get('deleteaccount/{id}',[BlogController::class,'DeleteMyAccount']);
Route::get('account',function(){
    return view('myaccount');
});

Route::get('editblog/{id}', [BlogController::class, 'editblog']);
Route::post('update-blog/{id}', [BlogController::class, 'updateblog'])->name('blog');
