<?php

namespace App\Http\Controllers;



use Illuminate\Support\Facades\Log;
use App\Imports\GalleryImport;
use App\Models\CurrencyConversion;
use App\Models\Gallery;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;

class GalleryController extends Controller
{

    //
    function FetchGallery($search, $category, $sorting, $currency)
    {


        if ($currency) {


            $currencyrate = $currency;
        }


        $currency_rate = DB::table("currency_conversion")->where("currency", $currencyrate)->get();
        // $response = Http::post("http://127.0.0.1:7000/searchingdata", [
        //     "search" => $search
        // ]);
        // $keywords = $response->json();

        $data = trim($search);
        $keywords = explode("+", $data);
        $keys = array_keys($keywords);

        $services = DB::table("gallery");

        for ($x = 0; $x < count($keys); $x++) {

            $services = $services->orWhere("Description", "like",   $keywords[$keys[$x]] . "%")->orWhere("Description", "like",  "% " . $keywords[$keys[$x]] . "%")
                ->orWhere("CSI", "like", $keywords[$keys[$x]] . "%")->orWhere("CSI", "like", "% " . $keywords[$keys[$x]] . "%")
                ->orWhere("Keywords", "like", $keywords[$keys[$x]] . "%")->orWhere("Keywords", "like", "% " . $keywords[$keys[$x]] . "%");
        }


        if ($category == "Price") {
            if ($sorting == "Ascending" || $sorting == "None") {


                // $services = $services->orderBy('Price_Min', 'asc');
            } else {


                // $services = $services->orderBy('Price_Max', 'desc');
            }
        } else if ($category == "Origin") {
            if ($sorting == "Ascending" || $sorting == "None") {


                // $services = $services->orderBy('Location', 'asc');
            } else {


                // $services = $services->orderBy('Location', 'desc');
            }
        }
        $moduleNames = app('moduleNames');
        $currencies = CurrencyConversion::pluck('currency')->toArray();
        $services = $services->paginate(10);
        // return $resource;
        return view("contentshow", ["data" => $search, "gallery" => $services, "category" => $category, "sorting" => $sorting, "currency" => $currency, "currency_rate" => $currency_rate, "currencies" => $currencies,"moduleNames"=>$moduleNames]);
    }


    function allgallery()
    {
        $data = DB::table("gallery")->orderBy('created_at', 'desc')->paginate(10);

        return view("allgallery", ["collection" => $data]);
    }


    function addgalleryfile(Request $req)
    {
        DB::beginTransaction();  // Start a transaction
        try {
            // Check the type of operation requested
            if ($req->type === 'new') {
                // Clear the existing data safely within a transaction
                Gallery::query()->delete();  // Using delete() to ensure model events are fired
            }

            // Import new data from Excel file
            Excel::import(new GalleryImport, $req->file('file'));

            DB::commit();  // Commit the transaction if everything's good
            return redirect("/allgallery")->with('success', 'File Imported Successfully!');
        } catch (Exception $e) {
            DB::rollBack();  // Rollback the transaction on error
            // Optional: Log the error message
            // \Log::error("Error adding material: " . $e->getMessage());

            return redirect("/allgallery")->with('error', 'Failed to import file: ' . $e->getMessage());
        }
    }

    function addgallery(Request $req)
    {
        try {
            // Validate the Photo input to ensure it's an image and does not exceed the size limit
            $validator = Validator::make($req->all(), [
                'Photo' => 'required|file|image|mimes:jpeg,jpg,png,gif|max:10240', // Max 10MB and must be an image
            ]);

            if ($validator->fails()) {
                return redirect("/allgallery")
                ->withErrors($validator)
                ->withInput();
            }

            $gallery = new Gallery;

            $gallery->CSI = $req->csi;
            $gallery->Description = $req->description;
            $gallery->Keywords = $req->keywords;

            if ($req->hasFile('Photo') && $req->file('Photo')->isValid()) {
                $path = $req->file('Photo')->store('public');
                $gallery->Photo = $path;
            } else {
                Log::warning('No valid file was uploaded.');
                return back()->with('error', 'Please upload a valid image file.');
            }

            $gallery->save();
            return redirect('/allgallery')->with('success', 'Gallery item added successfully!');
        } catch (\Exception $e) {
            Log::error("Error adding gallery item: " . $e->getMessage());
            return redirect('/allgallery')->with('error', 'Error adding gallery item.');
        }
    }


    function searchgallery(Request $req)
    {
        $search = $req->search;
        // echo $search;
        $data = DB::table("gallery")->orWhere("Description", "like",   $search . "%")->orWhere("Description", "like",  "% " . $search . "%")
        ->orWhere("CSI", "like", $search . "%")->orWhere("CSI", "like", "% " . $search . "%")
        ->orWhere("Keywords", "like", $search . "%")->orWhere("Keywords", "like", "% " . $search . "%")
        ->orderBy('created_at', 'desc')->get();

        // echo $data;
        return view("allgallery", ["collection" => $data]);
        // $material  = Material::
    }

    function updategallery($id)
    {
        $material = Gallery::find($id);
        return view("updategallery", ["data" => $material]);
    }


    function postupdategallery(Request $req)
    {
        try {
            $validator = Validator::make($req->all(), [
                'Photo' => 'required|file|image|mimes:jpeg,jpg,png,gif|max:10240', // Max 10MB and must be an image
            ]);

            if ($validator->fails()) {
                return redirect("/allgallery")
                    ->with('error',$validator);
                   
            }

            $service = Gallery::find($req->id);
            $service->CSI = $req->CSI;
            $service->Description = $req->Description;
            $service->Keywords = $req->Keywords;

          

            if ($req->file("Photo")) {
                $service->Photo = $req->file("Photo")->store('public');
            }


            $service->save();


            return redirect("/allgallery")->with('success', 'Gallery Updated Successfully!');
        } catch (\Exception $e) {
            // Handle the error, log it if necessary, and redirect with an error message
            // \Log::error("Error adding equipment: " . $e->getMessage());

            // Redirect to the same page or an error page with an error message
            return redirect("/allgallery")->with('error', $e);
        }
    }

    function deletegallery($id)
    {
        try {
            $data = Gallery::find($id);
            $data->delete();
            return redirect("/allgallery")->with('success', 'Gallery Deleted Successfully!');
        } catch (\Exception $e) {
            // Handle the error, log it if necessary, and redirect with an error message
            // \Log::error("Error adding equipment: " . $e->getMessage());

            // Redirect to the same page or an error page with an error message
            return redirect("/allgallery")->with('error', 'Failed to Delete Gallery');
        }
    }
}


