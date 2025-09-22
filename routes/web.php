<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ArticleController;

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

// Route::get('/', function () {
//     return view('layout');
// });
Route::get('/', [MainController::class, 'index']);
Route::get('/galery/{full_image}', [MainController::class, 'show']);

Route::get('/registration', [AuthController::class, 'create']);
Route::post('/auth/login', [AuthController::class, 'registration']);

Route::get('/articles/show', [ArticleController::class, 'index']);

Route::get('/about', function () {
    return view('main/about');
});

Route::get('/contacts', function () {
    $contact = [
        'name' => 'Polytech',
        'address' => 'B.Semenovskay',
        'phone' => '8(495) 423-2323',
        'email' => '@mospolytech.ru'
    ];
    return view('main/contacts', ['contact' => $contact]);
});

