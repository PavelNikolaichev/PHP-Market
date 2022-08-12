<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CatalogUnitController;

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
Route::get('/catalog', [CatalogUnitController::class, 'index']);
//Route::get('/dashboard', [CatalogUnitController::class, 'index']);
