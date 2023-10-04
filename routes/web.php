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
Route::get("/services/{search}/{category}/{sorting}/{currency}",[SearchController::class,"FetchServices"]);
Route::get("/resources/{search}/{category}/{sorting}/{currency}", [SearchController::class, "FetchResources"]);
Route::get("/materials/{search}/{category}/{sorting}/{currency}", [SearchController::class, "FetchMaterials"]);
Route::get("/images/{search}/{category}/{sorting}/{currency}", [SearchController::class, "FetchImages"]);




Route::view('/login', "loginform");
Route::view('/register', "registerform");


Route::post('/loginin', [SearchController::class,"login"]);
Route::post('/registerin', [SearchController::class, "register"]);

Route::get("/logout",[SearchController::class,"logout"]);

Route::view('/addmaterial', "addmaterialform");
Route::view('/addmaterialfile', "addmaterialfile");
Route::view('/addresource', "addresourceform");
Route::view('/addservice', "addserviceform");
Route::view('/adduser', "adduserform");
Route::view('/addbackgroundpic', "addbackgroundpicform");
Route::view('/updateprofile', "updateuserinfo");
Route::view('/usercolorscheme', "usercolorscheme");

Route::get('/allmaterial', [SearchController::class, "allmaterial"]);
Route::get('/allresource', [SearchController::class, "allresource"]);
Route::get('/allservice', [SearchController::class, "allservice"]);
Route::get('/alluser', [SearchController::class, "allusers"]);
Route::get('/allbackgroundpic', [SearchController::class, "allbackgroundpics"]);
Route::get('/allaskexpert', [SearchController::class, "allaskexpert"]);
Route::get('/allgetquote', [SearchController::class, "allgetquote"]);
Route::get('/allsearchkeyword', [SearchController::class, "allsearchkeyword"]);
Route::get('/allcurrencyconversion', [SearchController::class, "allcurrencyconversion"]);

Route::post('/addmaterial', [SearchController::class, "addmaterial"]);
Route::post('/addmaterialfile', [SearchController::class, "addmaterialfile"]);
Route::post('/addresource', [SearchController::class, "addresource"]);
Route::post('/addservice', [SearchController::class, "addservice"]);
Route::post('/adduser', [SearchController::class, "adduser"]);
Route::post('/addbackgroundpic', [SearchController::class, "addbackgroundpic"]);
Route::post('/addgetquote', [SearchController::class, "addgetquote"]);
Route::post('/addgetquote', [SearchController::class, "addgetquote"]);
Route::post('/addcurrencyconversion', [SearchController::class, "addcurrencyconversion"]);

Route::get('/updatematerial/{id}', [SearchController::class, "updatematerial"]);
Route::get('/updateresource/{id}', [SearchController::class, "updateresource"]);
Route::get('/updateservice/{id}', [SearchController::class, "updateservice"]);
Route::get('/updatebackgroundpic/{id}', [SearchController::class, "updatebackgroundpic"]);
Route::get('/updateaskexpert/{id}', [SearchController::class, "updateaskexpert"]);
Route::get('/updategetquote/{id}', [SearchController::class, "updategetquote"]);
Route::get('/updatecurrencyconversion/{id}', [SearchController::class, "updatecurrencyconversion"]);


Route::post('/postupdatematerial/{id}', [SearchController::class, "postupdatematerial"]);
Route::post('/postupdateresource/{id}', [SearchController::class, "postupdateresource"]);
Route::post('/postupdateservice/{id}', [SearchController::class, "postupdateservice"]);
Route::post('/postupdateuser/{id}', [SearchController::class, "postupdateuser"]);
Route::post('/postupdatebackgroundpic/{id}', [SearchController::class, "postupdatebackgroundpic"]);
Route::post('/postupdateaskexpert/{id}', [SearchController::class, "postupdateaskexpert"]);
Route::post('/postupdategetquote/{id}', [SearchController::class, "postupdategetquote"]);
Route::post('/postupdatecurrencyconversion/{id}', [SearchController::class, "postupdatecurrencyconversion"]);
Route::post('/postupdateuserinfo/{id}', [SearchController::class, "postupdateuserinfo"]);

Route::get('/deletematerial/{id}', [SearchController::class, "deletematerial"]);
Route::get('/deleteresource/{id}', [SearchController::class, "deleteresource"]);
Route::get('/deleteservice/{id}', [SearchController::class, "deleteservice"]);

Route::post('/allmaterial', [SearchController::class, "searchmaterial"]);
Route::post('/allresource', [SearchController::class, "searchresource"]);
Route::post('/allservice', [SearchController::class, "searchservice"]);
Route::post('/alluser', [SearchController::class, "searchuser"]);
Route::post('/allaskexpert', [SearchController::class, "searchaskexpert"]);
Route::post('/allgetquote', [SearchController::class, "searchgetquote"]);
Route::post('/allcurrencyconversion', [SearchController::class, "searchcurrencyconversion"]);




Route::post("/expertquery",[SearchController::class,"expertquery"]);
Route::get("/usersearchhistory",[SearchController::class,"usersearchhistory"]);
Route::post("/colorscheme", [SearchController::class, "colorscheme"]);


