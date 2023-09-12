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

Route::post("/getquote", [SearchController::class, "getquote"]);

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
Route::view('/adduser', "adduserform");
Route::view('/addbackgroundpic', "addbackgroundpicform");

Route::get('/allmaterial', [SearchController::class, "allmaterial"]);
Route::get('/allresource', [SearchController::class, "allresource"]);
Route::get('/allservice', [SearchController::class, "allservice"]);
Route::get('/alluser', [SearchController::class, "allusers"]);
Route::get('/allbackgroundpic', [SearchController::class, "allbackgroundpics"]);


Route::post('/addmaterial', [SearchController::class, "addmaterial"]);
Route::post('/addresource', [SearchController::class, "addresource"]);
Route::post('/addservice', [SearchController::class, "addservice"]);
Route::post('/adduser', [SearchController::class, "adduser"]);
Route::post('/addbackgroundpic', [SearchController::class, "addbackgroundpic"]);

Route::get('/updatematerial/{id}', [SearchController::class, "updatematerial"]);
Route::get('/updateresource/{id}', [SearchController::class, "updateresource"]);
Route::get('/updateservice/{id}', [SearchController::class, "updateservice"]);
Route::get('/updatebackgroundpic/{id}', [SearchController::class, "updatebackgroundpic"]);

Route::post('/postupdatematerial/{id}', [SearchController::class, "postupdatematerial"]);
Route::post('/postupdateresource/{id}', [SearchController::class, "postupdateresource"]);
Route::post('/postupdateservice/{id}', [SearchController::class, "postupdateservice"]);
Route::post('/postupdateuser/{id}', [SearchController::class, "postupdateuser"]);
Route::post('/postupdatebackgroundpic/{id}', [SearchController::class, "postupdatebackgroundpic"]);

Route::get('/deletematerial/{id}', [SearchController::class, "deletematerial"]);
Route::get('/deleteresource/{id}', [SearchController::class, "deleteresource"]);
Route::get('/deleteservice/{id}', [SearchController::class, "deleteservice"]);

Route::post("/expertquery",[SearchController::class,"expertquery"]);


