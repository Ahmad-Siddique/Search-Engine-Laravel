<?php

namespace App\Http\Controllers;

use App\Imports\DocumentsImport;
use App\Models\Documents;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use Maatwebsite\Excel\Facades\Excel;
use App\Exports\DocumentsExport;
use App\Exports\EquipmentsExport;
use App\Models\CurrencyConversion;
use League\CommonMark\Node\Block\Document;

class DocumentsController extends Controller
{
    //
    function FetchDocuments($search, $category, $sorting, $currency)
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

        $services = DB::table("documents_csv");

        for ($x = 0; $x < count($keys); $x++) {

            $services = $services->orWhere("Description", "like",   $keywords[$keys[$x]] . "%")->orWhere("Description", "like",  "% " . $keywords[$keys[$x]] . "%")
                ->orWhere("CSI", "like", $keywords[$keys[$x]] . "%")->orWhere("CSI", "like", "% " . $keywords[$keys[$x]] . "%")
                ->orWhere("Keywords", "like", $keywords[$keys[$x]] . "%")->orWhere("Keywords", "like", "% " . $keywords[$keys[$x]] . "%");
        }


        if ($category == "Price") {
            if ($sorting == "Ascending" || $sorting == "None") {


                // $services = $services->orderBy('Price_Min', 'asc');
            } else {


                $services = $services->orderBy('Price_Max', 'desc');
            }
        } else if ($category == "Origin") {
            if ($sorting == "Ascending" || $sorting == "None") {


                // $services = $services->orderBy('Location', 'asc');
            } else {


                // $services = $services->orderBy('Location', 'desc');
            }
        }

        $currencies = CurrencyConversion::pluck('currency')->toArray();
        $services = $services->paginate(3);
        // return $resource;
        return view("contentshow", ["data" => $search, "documents" => $services, "category" => $category, "sorting" => $sorting, "currency" => $currency, "currency_rate" => $currency_rate, "currencies" => $currencies]);
    }


    function alldocument()
    {
        $data = DB::table("documents_csv")->orderBy('created_at', 'desc')->paginate(10);

        return view("alldocument", ["collection" => $data]);
    }


    function adddocumentsfile(Request $req)
    {
        DB::beginTransaction();  // Start a transaction
        try {
            // Check the type of operation requested
            if ($req->type === 'new') {
                // Clear the existing data safely within a transaction
                Documents::query()->delete();  // Using delete() to ensure model events are fired
            }

            // Import new data from Excel file
            Excel::import(new DocumentsImport, $req->file('file'));

            DB::commit();  // Commit the transaction if everything's good
            return redirect("/alldocument")->with('success', 'File Imported Successfully!');
        } catch (Exception $e) {
            DB::rollBack();  // Rollback the transaction on error
            // Optional: Log the error message
            // \Log::error("Error adding material: " . $e->getMessage());

            return redirect("/alldocument")->with('error', 'Failed to import file: ' . $e->getMessage());
        }
    }

    public function adddocument(Request $req)
    {
        try {
            $service = new Documents;

            $service->CSI = $req->CSI;
            $service->Description = $req->Description;
            $service->Keywords = $req->Keywords;

            if ($req->hasFile("Files")) {
                // Validate the files
                $validatedData = $req->validate([
                    'Files.*' => 'file|mimes:pdf,xlsx,xls,doc,docx,ppt,pptx,png,jpg,jpeg,gif|max:10240', // max file size 10MB
                ]);

                // Store the files
                $filePaths = [];
                foreach ($req->file("Files") as $file) {
                    $filePaths[] = $file->store('public');
                }
                // Convert the file paths array to a JSON string to store in the database
                $service->File = json_encode($filePaths);
            }

            $service->save();
            return redirect("/alldocument")->with('success', 'Document Added Successfully!');
        } catch (\Exception $e) {
            // Log the error if necessary
            \Log::error("Error adding document: " . $e->getMessage());

            // Redirect with an error message
            return redirect("/alldocument")->with('error', $e->getMessage());
        }
    }



    function searchdocument(Request $req)
    {
        $search = $req->search;
        // echo $search;
        $data = DB::table("documents_csv")->orWhere("Description", "like",   $search . "%")->orWhere("Description", "like",  "% " . $search . "%")
        ->orWhere("CSI", "like", $search . "%")->orWhere("CSI", "like", "% " . $search . "%")
        ->orWhere("Keywords", "like", $search . "%")->orWhere("Keywords", "like", "% " . $search . "%")
        ->orderBy('created_at', 'desc')->get();

        // echo $data;
        return view("alldocument", ["collection" => $data]);
        // $material  = Material::
    }

    function updatedocument($id)
    {
        $material = Documents::find($id);
        return view("updatedocument", ["data" => $material]);
    }


    function postupdatedocument(Request $req)
    {
        try {
            $service = Documents::find($req->id);
            $service->CSI = $req->CSI;
            $service->Description = $req->Description;
            $service->Keywords = $req->Keywords;
           

            if ($req->file("File")) {
                $service->File = $req->file("File")->store('public');
            }


            $service->save();


            return redirect("/alldocument")->with('success', 'Document Updated Successfully!');
        } catch (\Exception $e) {
            // Handle the error, log it if necessary, and redirect with an error message
            // \Log::error("Error adding equipment: " . $e->getMessage());

            // Redirect to the same page or an error page with an error message
            return redirect("/alldocument")->with('error', 'Failed to Update Document');
        }
    }

    function deletedocument($id)
    {
        try {
            $data = Documents::find($id);
            $data->delete();
            return redirect("/alldocument")->with('success', 'Document Deleted Successfully!');
        } catch (\Exception $e) {
            // Handle the error, log it if necessary, and redirect with an error message
            // \Log::error("Error adding equipment: " . $e->getMessage());

            // Redirect to the same page or an error page with an error message
            return redirect("/alldocument")->with('error', 'Failed to Delete Document');
        }
    }

    public function exportdocuments()
    {
        return Excel::download(new DocumentsExport, 'documents.xlsx');
    }
}
