<?php

namespace App\Http\Controllers;

use App\Imports\EquipmentsImport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Equipment;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\EquipmentsExport;
use App\Models\CurrencyConversion;

class EquipmentController extends Controller

{

    function FetchEquipments($search, $category, $sorting, $currency)
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

        $services = DB::table("equipments_csv");

        for ($x = 0; $x < count($keys); $x++) {

            $services = $services->orWhere("Description", "like",   $keywords[$keys[$x]] . "%")->orWhere("Description", "like",  "% " . $keywords[$keys[$x]] . "%")
                ->orWhere("CSI", "like", $keywords[$keys[$x]] . "%")->orWhere("CSI", "like", "% " . $keywords[$keys[$x]] . "%")
                ->orWhere("Specifications", "like", $keywords[$keys[$x]] . "%")->orWhere("Specifications", "like", "% " . $keywords[$keys[$x]] . "%");
        }


        if ($category == "Price") {
            if ($sorting == "Ascending" || $sorting == "None") {


                $services = $services->orderBy('Price_Min', 'asc');
            } else {


                $services = $services->orderBy('Price_Max', 'desc');
            }
        } else if ($category == "Origin") {
            if ($sorting == "Ascending" || $sorting == "None") {


                $services = $services->orderBy('Location', 'asc');
            } else {


                $services = $services->orderBy('Location', 'desc');
            }
        }
        $moduleNames = app('moduleNames');
        $currencies = CurrencyConversion::pluck('currency')->toArray();
        $services = $services->paginate(3);
        // return $resource;
        return view("contentshow", ["data" => $search, "equipments" => $services, "category" => $category, "sorting" => $sorting, "currency" => $currency, "currency_rate" => $currency_rate, "currencies" => $currencies,"moduleNames"=>$moduleNames]);
    }


    function allequipment()
    {
        $data = DB::table("equipments_csv")->orderBy('created_at', 'desc')->paginate(10);

        return view("allequipment", ["collection" => $data]);
    }


    function addequipmentfile(Request $req)
    {
        DB::beginTransaction();  // Start a transaction
        try {
            // Check the type of operation requested
            if ($req->type === 'new') {
                // Clear the existing data safely within a transaction
                Equipment::query()->delete();  // Using delete() to ensure model events are fired
            }

            // Import new data from Excel file
            Excel::import(new EquipmentsImport, $req->file('file'));

            DB::commit();  // Commit the transaction if everything's good
            return redirect("/allequipment")->with('success', 'File Imported Successfully!');
        } catch (Exception $e) {
            DB::rollBack();  // Rollback the transaction on error
            // Optional: Log the error message
            // \Log::error("Error adding material: " . $e->getMessage());

            return redirect("/allequipment")->with('error', 'Failed to import file: ' . $e->getMessage());
        }
    }

    function addequipment(Request $req)
    {
        try{
        $service = new Equipment;

        $service->CSI = $req->CSI;
        $service->Description = $req->Description;
        $service->Specifications = $req->Specifications;
        $service->Unit = $req->Unit;
        $service->Price_Min = $req->Price_Min;
        $service->Price_Max = $req->Price_Max;
        $service->Currency = $req->Currency;


        $service->Discount = $req->Discount;
        $service->Monthly_Trend = $req->Monthly_Trend;
        $service->Location = $req->Location;
        $service->Notes = $req->Notes;


        // $service->Created_On = $req->Created_On;
        // $service->Update_On = $req->Update_On;
        $service->Keywords = $req->Keywords;

        if ($req->file("Photo")) {
            $service->Photo = $req->file("Photo")->store('img');
        }


        $service->save();
            return redirect("/allequipment")->with('success', 'Equipment Added Successfully!');
        } catch (\Exception $e) {
            // Handle the error, log it if necessary, and redirect with an error message
            // \Log::error("Error adding equipment: " . $e->getMessage());

            // Redirect to the same page or an error page with an error message
            return redirect("/allequipment")->with('error', 'Failed to Add Equipment');
        }
    }


    function searchequipment(Request $req)
    {
        $search = $req->search;
        // echo $search;
        $data = DB::table("equipments_csv")->orWhere("Description", "like",   $search . "%")->orWhere("Description", "like",  "% " . $search . "%")
        ->orWhere("CSI", "like", $search . "%")->orWhere("CSI", "like", "% " . $search . "%")
        ->orWhere("Specifications", "like", $search . "%")->orWhere("Specifications", "like", "% " . $search . "%")
        ->orderBy('created_at', 'desc')->get();

        // echo $data;
        return view("allequipment", ["collection" => $data]);
        // $material  = Material::
    }

    function updateequipment($id)
    {
        $material = Equipment::find($id);
        return view("updateequipment", ["data" => $material]);
    }


    function postupdateequipment(Request $req)
    {
        try{
        $service = Equipment::find($req->id);
        $service->CSI = $req->CSI;
        $service->Description = $req->Description;
        $service->Specifications = $req->Specifications;
        $service->Unit = $req->Unit;
        $service->Price_Min = $req->Price_Min;
        $service->Price_Max = $req->Price_Max;
        $service->Currency = $req->Currency;


        $service->Discount = $req->Discount;
        $service->Monthly_Trend = $req->Monthly_Trend;
        $service->Location = $req->Location;
        $service->Notes = $req->Notes;


        // $service->Created_On = $req->Created_On;
        // $service->Update_On = $req->Update_On;
        $service->Keywords = $req->Keywords;

        if ($req->file("Photo")) {
            $service->Photo = $req->file("Photo")->store('img');
        }


        $service->save();


            return redirect("/allequipment")->with('success', 'Equipment Updated Successfully!');
        } catch (\Exception $e) {
            // Handle the error, log it if necessary, and redirect with an error message
            // \Log::error("Error adding equipment: " . $e->getMessage());

            // Redirect to the same page or an error page with an error message
            return redirect("/allequipment")->with('error', 'Failed to Update Equipment');
        }
    }

    function deleteequipment($id)
    {
        try{
        $data = Equipment::find($id);
        $data->delete();
            return redirect("/allequipment")->with('success', 'Equipment Deleted Successfully!');
        } catch (\Exception $e) {
            // Handle the error, log it if necessary, and redirect with an error message
            // \Log::error("Error adding equipment: " . $e->getMessage());

            // Redirect to the same page or an error page with an error message
            return redirect("/allequipment")->with('error', 'Failed to Delete Equipment');
        }
    }

    public function exportequipments()
    {
        return Excel::download(new EquipmentsExport, 'equipments.xlsx');
    }
}
