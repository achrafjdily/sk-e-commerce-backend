<?php

use App\Http\Controllers\Api\Backoffice\Auth\LoginController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group([
    'namespace' => 'App\Http\Controllers\Api\Backoffice',
    'as' => 'backoffice.',
    'prefix' => 'backoffice'
], function () {
    Route::group(
        [
            'namespace' => 'Auth',
            'as' => 'auth.',
            'prefix' => 'auth'
         ],
        function () {
            Route::post('login', [LoginController::class, 'login'])->name('login');
        }
    );
});
