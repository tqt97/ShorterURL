<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ShortUrlController;
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

Route::get('/dashboard', [HomeController::class, 'index'])->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';


Route::get('/short', [ShortUrlController::class, 'index'])->name('short.index');
Route::post('/short', [ShortUrlController::class, 'store'])->name('short.create');
Route::get('/{code}', [ShortUrlController::class, 'show'])->name('short.show');
