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


Route::get('/', [SearchController::class,"MainPage"]);


Route::view('/searching', "contentshow");
Route::post('/searching', [SearchController::class, "FetchSearchedData"]);
Route::get("/services/{search}/{category}/{sorting}",[SearchController::class,"FetchServices"]);
Route::get("/resources/{search}/{category}/{sorting}", [SearchController::class, "FetchResources"]);
Route::get("/materials/{search}/{category}/{sorting}", [SearchController::class, "FetchMaterials"]);
Route::get("/images/{search}/{category}/{sorting}", [SearchController::class, "FetchImages"]);




Route::view('/login', "loginform");
Route::view('/register', "registerform");


Route::post('/loginin', [SearchController::class,"login"]);
Route::post('/registerin', [SearchController::class, "register"]);

Route::get("/logout",[SearchController::class,"logout"]);

Route::view('/addmaterial', "addmaterialform");
Route::view('/addresource', "addresourceform");
Route::view('/addservice', "addserviceform");

Route::post('/addmaterial', [SearchController::class, "addmaterial"]);
Route::post('/addresource', [SearchController::class, "addresource"]);
Route::post('/addservice', [SearchController::class, "addservice"]);

