<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ThemeController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SubscriberController;

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

Route::controller(ThemeController::class)->group(function(){
Route::get('/','index')->name('theme.index');
Route::get('/category/{id}','category')->name('theme.category');
Route::get('/contact','contact')->name('theme.contact');


});
Route::get('/my-blogs',[BlogController::class,'myBlogs'])->name('blogs.my-blogs');
Route::post('/subscribe/store',[SubscriberController::class,'store'])->name('subscribe.store');
Route::post('/contact/store',[ContactController::class,'store'])->name('contact.store');

Route::resource('blogs',BlogController::class)->except('index');

Route::post('/comments/store',[CommentController::class,'store'])->name('comments.store');

require __DIR__.'/auth.php';
