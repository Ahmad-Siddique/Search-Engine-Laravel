<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SearchController;
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
//     return view('welcome');
// });


Route::get('/', function () {
    return view('mainpage');
});


Route::view('/searching', "contentshow");
Route::post('/searching', [SearchController::class, "FetchSearchedData"]);
Route::get("/services/{search}",[SearchController::class,"FetchServices"]);
Route::get("/resources/{search}", [SearchController::class, "FetchResources"]);
Route::get("/materials/{search}", [SearchController::class, "FetchMaterials"]);