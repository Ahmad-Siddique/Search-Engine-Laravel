<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\EquipmentController;
use App\Http\Controllers\AnalyticsController;
use App\Http\Controllers\DocumentsController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\LogoController;
use App\Http\Controllers\ModuleNameController;
use App\Http\Controllers\PrivacyPolicyController;

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
Route::get("/knowledgebase/{search}/{category}/{sorting}/{currency}", [SearchController::class, "FetchKnowledge"]);
Route::get("/equipments/{search}/{category}/{sorting}/{currency}", [EquipmentController::class, "FetchEquipments"]);
Route::get("/documents/{search}/{category}/{sorting}/{currency}", [DocumentsController::class, "FetchDocuments"]);
Route::get("/gallery/{search}/{category}/{sorting}/{currency}", [GalleryController::class, "FetchGallery"]);
Route::get("/images/{search}/{category}/{sorting}/{currency}", [SearchController::class, "FetchImages"]);




Route::view('/login', "loginform");
Route::view('/register', "registerform");


Route::post('/loginin', [SearchController::class,"login"]);
Route::post('/registerin', [SearchController::class, "register"]);

Route::get("/logout",[SearchController::class,"logout"]);

Route::view('/updateprofile', "updateuserinfo");
Route::view('/usercolorscheme', "usercolorscheme");







Route::post('/postupdateuserinfo/{id}', [SearchController::class, "postupdateuserinfo"]);







Route::post("/expertquery",[SearchController::class,"expertquery"]);
Route::get("/usersearchhistory",[SearchController::class,"usersearchhistory"]);
Route::post("/colorscheme", [SearchController::class, "colorscheme"]);



// ********** Super Admin Routes *********
Route::group([ 'middleware' => ['web', 'admin']], function () {
    Route::post('/allmaterial', [SearchController::class, "searchmaterial"]);
    Route::post('/allresource', [SearchController::class, "searchresource"]);
    Route::post('/allservice', [SearchController::class, "searchservice"]);
    Route::post('/allequipment', [EquipmentController::class, "searchequipment"]);
    Route::post('/alldocument', [DocumentsController::class, "searchdocument"]);
    Route::post('/allgallery', [GalleryController::class, "searchgallery"]);
    Route::post('/alluser', [SearchController::class, "searchuser"]);
    Route::post('/allaskexpert', [SearchController::class, "searchaskexpert"]);
    Route::post('/allgetquote', [SearchController::class, "searchgetquote"]);
    Route::post('/allcurrencyconversion', [SearchController::class, "searchcurrencyconversion"]);






    Route::post('/postupdatematerial/{id}', [SearchController::class, "postupdatematerial"]);
    Route::post('/postupdateresource/{id}', [SearchController::class, "postupdateresource"]);
    Route::post('/postupdateservice/{id}', [SearchController::class, "postupdateservice"]);
    Route::post('/postupdateequipment/{id}', [EquipmentController::class, "postupdateequipment"]);
    Route::post('/postupdatedocument/{id}', [DocumentsController::class, "postupdatedocument"]);
    Route::post('/postupdategallery/{id}', [GalleryController::class, "postupdategallery"]);
    Route::post('/postupdateuser/{id}', [SearchController::class, "postupdateuser"]);
    Route::post('/postupdatebackgroundpic/{id}', [SearchController::class, "postupdatebackgroundpic"]);
    Route::post('/postupdateaskexpert/{id}', [SearchController::class, "postupdateaskexpert"]);
    Route::post('/postupdategetquote/{id}', [SearchController::class, "postupdategetquote"]);
    Route::post('/postupdatecurrencyconversion/{id}', [SearchController::class, "postupdatecurrencyconversion"]);



    Route::get('/deletematerial/{id}', [SearchController::class, "deletematerial"]);
    Route::get('/deleteresource/{id}', [SearchController::class, "deleteresource"]);
    Route::get('/deleteservice/{id}', [SearchController::class, "deleteservice"]);
    Route::get('/deleteequipment/{id}', [EquipmentController::class, "deleteequipment"]);
    Route::get('/deletedocument/{id}', [DocumentsController::class, "deletedocument"]);
    Route::get('/deletegallery/{id}', [GalleryController::class, "deletegallery"]);
    Route::get('/deleteuser/{id}', [SearchController::class, "deleteuser"]);
    Route::get('/deletebackgroundpic/{id}', [SearchController::class, "deletebackgroundpic"]);
    Route::get('/deleteaskexpert/{id}', [SearchController::class, "deleteaskexpert"]);


    Route::get('/updatematerial/{id}', [SearchController::class, "updatematerial"]);
    Route::get('/updateresource/{id}', [SearchController::class, "updateresource"]);
    Route::get('/updateservice/{id}', [SearchController::class, "updateservice"]);
    Route::get('/updateequipment/{id}', [EquipmentController::class, "updateequipment"]);
    Route::get('/updatedocument/{id}', [DocumentsController::class, "updatedocument"]);
    Route::get('/updategallery/{id}', [GalleryController::class, "updategallery"]);
    Route::get('/updatebackgroundpic/{id}', [SearchController::class, "updatebackgroundpic"]);
    Route::get('/updateaskexpert/{id}', [SearchController::class, "updateaskexpert"]);
    Route::get('/updategetquote/{id}', [SearchController::class, "updategetquote"]);
    Route::get('/updatecurrencyconversion/{id}', [SearchController::class, "updatecurrencyconversion"]);
    Route::get('/updateuser/{id}', [SearchController::class, "updateuser"]);


    Route::get('/allmaterial', [SearchController::class, "allmaterial"]);
    Route::get('/allresource', [SearchController::class, "allresource"]);
    Route::get('/allservice', [SearchController::class, "allservice"]);
    Route::get('/allequipment', [EquipmentController::class, "allequipment"]);
    Route::get('/alldocument', [DocumentsController::class, "alldocument"]);
    Route::get('/allgallery', [GalleryController::class, "allgallery"]);
    Route::get('/alluser', [SearchController::class, "allusers"]);
    Route::get('/allbackgroundpic', [SearchController::class, "allbackgroundpics"]);
    Route::get('/allaskexpert', [SearchController::class, "allaskexpert"]);
    Route::get('/allgetquote', [SearchController::class, "allgetquote"]);
    Route::get('/allsearchkeyword', [SearchController::class, "allsearchkeyword"]);
    Route::get('/allcurrencyconversion', [SearchController::class, "allcurrencyconversion"]);

    Route::post('/addmaterial', [SearchController::class, "addmaterial"]);
    Route::post('/addmaterialfile', [SearchController::class, "addmaterialfile"]);
    Route::post('/addresource', [SearchController::class, "addresource"]);
    Route::post('/addresourcefile', [SearchController::class, "addresourcefile"]);
    Route::post('/addservice', [SearchController::class, "addservice"]);
    Route::post('/addequipment', [EquipmentController::class, "addequipment"]);
    Route::post('/addequipmentfile', [EquipmentController::class, "addequipmentfile"]);
    Route::post('/adddocument', [DocumentsController::class, "adddocument"]);
    Route::post('/adddocumentfile', [DocumentsController::class, "adddocumentfile"]);
    Route::post('/addgallery', [GalleryController::class, "addgallery"]);
    Route::post('/addgalleryfile', [GalleryController::class, "addgalleryfile"]);
    Route::post('/addservicefile', [SearchController::class, "addservicefile"]);
    Route::post('/adduser', [SearchController::class, "adduser"]);
    Route::post('/addbackgroundpic', [SearchController::class, "addbackgroundpic"]);
    Route::post('/addgetquote', [SearchController::class, "addgetquote"]);
    Route::post('/addgetquote', [SearchController::class, "addgetquote"]);
    Route::post('/addcurrencyconversion', [SearchController::class, "addcurrencyconversion"]);


    Route::view('/addmaterial', "addmaterialform");
    Route::view('/addmaterialfile', "addmaterialfile");
    Route::view('/addresourcefile', "addresourcefile");
    Route::view('/addservicefile', "addservicefile");
    Route::view('/addequipmentfile', "addequipmentfile");
    Route::view('/adddocumentfile', "adddocumentfile");
    Route::view('/addgalleryfile', "addgalleryfile");
    Route::view('/addresource', "addresourceform");
    Route::view('/addservice', "addserviceform");
    Route::view('/addequipment', "addequipmentform");
    Route::view('/adduser', "adduserform");
    Route::view('/addbackgroundpic', "addbackgroundpicform");
    Route::view('/addcurrencyconversion', "addcurrencyconversion");
    


});




Route::group([ 'middleware' => ['web', 'datamanager']], function () {
    Route::view('/addmaterial', "addmaterialform");
    Route::view('/addmaterialfile', "addmaterialfile");
    Route::view('/addresource', "addresourceform");
    Route::view('/addservice', "addserviceform");
    Route::view('/addequipment', "addequipmentform");
    Route::view('/adddocument', "adddocumentform");
    Route::view('/addgallery', "addgalleryform");


    Route::post('/addmaterial', [SearchController::class, "addmaterial"]);
    Route::post('/addmaterialfile', [SearchController::class, "addmaterialfile"]);
    Route::post('/addresource', [SearchController::class, "addresource"]);
    Route::post('/addservice', [SearchController::class, "addservice"]);
    Route::post('/addequipment', [EquipmentController::class, "addequipment"]);
    Route::post('/adddocument', [DocumentsController::class, "adddocument"]);
    Route::post('/addgallery', [GalleryController::class, "addgallery"]);


    Route::get('/allmaterial', [SearchController::class, "allmaterial"]);
    Route::get('/allresource', [SearchController::class, "allresource"]);
    Route::get('/allservice', [SearchController::class, "allservice"]);
    Route::get('/allequipment', [EquipmentController::class, "allequipment"]);
    Route::get('/alldocument', [DocumentsController::class, "alldocument"]);
    Route::get('/allgallery', [GalleryController::class, "allgallery"]);


    Route::get('/updatematerial/{id}', [SearchController::class, "updatematerial"]);
    Route::get('/updateresource/{id}', [SearchController::class, "updateresource"]);
    Route::get('/updateservice/{id}', [SearchController::class, "updateservice"]);
    Route::get('/updateequipment/{id}', [EquipmentController::class, "updateequipment"]);
    Route::get('/updatedocument/{id}', [DocumentsController::class, "updatedocument"]);
    Route::get('/updategallery/{id}', [GalleryController::class, "updategallery"]);



    Route::get('/deletematerial/{id}', [SearchController::class, "deletematerial"]);
    Route::get('/deleteresource/{id}', [SearchController::class, "deleteresource"]);
    Route::get('/deleteservice/{id}', [SearchController::class, "deleteservice"]);
    Route::get('/deleteequipment/{id}', [EquipmentController::class, "deleteequipment"]);
    Route::get('/deletedocument/{id}', [DocumentsController::class, "deletedocument"]);
    Route::get('/deletegallery/{id}', [GalleryController::class, "deletegallery"]);

    Route::post('/postupdatematerial/{id}', [SearchController::class, "postupdatematerial"]);
    Route::post('/postupdateresource/{id}', [SearchController::class, "postupdateresource"]);
    Route::post('/postupdateservice/{id}', [SearchController::class, "postupdateservice"]);
    Route::post('/postupdateequipment/{id}', [EquipmentController::class, "postupdateequipment"]);
    Route::post('/postupdatedocument/{id}', [DocumentsController::class, "postupdatedocument"]);
    Route::post('/postupdategallery/{id}', [GalleryController::class, "postupdategallery"]);

    Route::post('/allmaterial', [SearchController::class, "searchmaterial"]);
    Route::post('/allresource', [SearchController::class, "searchresource"]);
    Route::post('/allservice', [SearchController::class, "searchservice"]);
    Route::post('/allequipment', [EquipmentController::class, "searchequipment"]);
    Route::post('/alldocument', [DocumentsController::class, "searchdocument"]);
    Route::post('/allgallery', [GalleryController::class, "searchgallery"]);




    Route::get('/analytics', [AnalyticsController::class,"index"]);
    Route::get('/analytics/country', [AnalyticsController::class, "countryWise"]) ;
    Route::get('/analytics/region', [AnalyticsController::class, "regionWise"]) ;
    Route::get('/analytics/zip', [AnalyticsController::class, "zipWise"]) ;
    Route::get('/analytics/time', [AnalyticsController::class, "timeSeries"]) ;
    Route::get('/analytics/ip', [AnalyticsController::class, "ipAnalysis"]);



    Route::get('/users/export/', [SearchController::class, 'exportusers']);
    Route::get('/materials/export/', [SearchController::class, 'exportmaterials']);
    Route::get('/services/export/', [SearchController::class, 'exportservices']);
    Route::get('/resources/export/', [SearchController::class, 'exportresources']);
    Route::get('/searchedkeywords/export/', [SearchController::class, 'exportsearchedkeywords']);
    Route::get('/equipments/export/', [EquipmentController::class, 'exportequipments']);
    Route::get('/documents/export/', [DocumentsController::class, 'exportdocuments']);


    Route::get('/module-names', [ModuleNameController::class, 'showForm'])->name('module-names.form');
    Route::post('/module-names/update', [ModuleNameController::class, 'update'])->name('module-names.update');



    Route::get('/monthly_trend/{table_name}/{csi}', [SearchController::class, 'getData']);

    // Route::get('/users/export/', [UsersController::class, 'export']);
    // Route::get('/users/export/', [UsersController::class, 'export']);
    // Route to show the update password form
    Route::get('/updatepassword', [SearchController::class, 'showUpdatePasswordForm']);

    // Route to handle the update password form submission
    Route::post('/postupdatepassword', [SearchController::class, 'updatePassword']);



    Route::get('/logo_change', [LogoController::class, 'showForm']);
    Route::post('/logo_change', [LogoController::class, 'upload']);


    Route::get('privacy-policy/edit', [PrivacyPolicyController::class, 'edit'])->name('privacy-policies.edit');
    Route::put('privacy-policy/update', [PrivacyPolicyController::class, 'update'])->name('privacy-policies.update');

    Route::get('disclaimer/edit', [PrivacyPolicyController::class, 'disclaimeredit'])->name('disclaimer.edit');
    Route::put('disclaimer/update', [PrivacyPolicyController::class, 'disclaimerupdate'])->name('disclaimer.update');

    Route::get('disclaimer', [PrivacyPolicyController::class, 'disclaimerview'])->name('disclaimer.update');
    Route::get('privacy-policy', [PrivacyPolicyController::class, 'privacypolicyview'])->name('disclaimer.update');



    Route::post('/add-to-list', [SearchController::class, 'addToList'])->name('materials.add_to_list');
    Route::get('/user-list', [SearchController::class, 'userList'])->name('materials.user_list');
    Route::post('/export-list', [SearchController::class, 'exportList'])->name('materials.export_list');

});