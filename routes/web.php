<?php

use App\Http\Controllers\Conversations\ConversationController;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');//end home route
Route::get('/conversations',ConversationController::class.'@index')->name('conversations.index');//end conversations index route
Route::get('/conversations/{conversation}',ConversationController::class.'@show')->name('conversations.show');// end conversations show route
