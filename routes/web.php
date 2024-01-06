<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dossier;
use App\Http\Controllers\Account;

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


/*
    # GET # (pages)
*/
Route::redirect('/', "/en");
Route::group(['prefix' => '{lang}', 'where' => ['lang' => 'en|nl']], function () {

    // Main dossier file
    Route::get('/', [Dossier::class, 'index'])->middleware('auth');

    // Account overview
    Route::get('/account', [Account::class, 'index'])->middleware('auth');

    // Account edit
    Route::get('/account/manage', [Account::class, 'manage'])->middleware('auth');

    // Login page
    Route::get('/account/login', [Account::class, 'login'])->name('login')->middleware('guest');

    /*
        # POST # (requests)
    */
    // Login post request
    Route::post('/account/authenticate', [Account::class, 'authenticate'])->middleware('guest');

    // Logout post request
    Route::post('/account/logout', [Account::class, 'logout'])->middleware('auth');
});





