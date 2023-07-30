<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\HomeController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/greet', function () {
    return "Hello from my first Laravel Project";
});
Route::get("/authors/{id}", [AuthorController::class, "show"]);

Route::get("/home/registration", [HomeController::class, "register"]);

Route::post('/home/showuser', 'App\Http\Controllers\HomeController@showuser')->name('showuser.form');


Route::get("/list", [AuthorController::class, "list"]);
// Route::get('/authors/{id}', function ($id = 0) {
//     return "Info about author $id";
// });
Route::get('/user/{id}/comments/{commentId}', function ($userId, $commentId) {
    return "Info about user $userId comment $commentId";
})->whereNumber("id");
Route::redirect('/hello', '/greet', 301);
Route::view(
    '/home',
    'home',
    ["name" => "Igor Dorokhov", "frameworks" => ["ASP.NET", "ExpressJS", "CodeIgniter"]]
);
