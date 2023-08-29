<?php

namespace App\Http\Controllers;

use App\Models\Material;
use App\Models\Resource;
use App\Models\Service;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;



class SearchController extends Controller
{

    function MainPage()
    {
        $randomnumber = rand(1, 5);
        return view("mainpage", ["randompic" => $randomnumber]);
    }



    function FetchSearchedData(Request $req)
    {
        $data = $req->input("search");
        $category = "None";
        $sorting = "None";
        $country = "Pakistan";
        if ($req->input("category")) {


            $category = $req->input("category");
        }


        if ($req->input("sorting")) {


            $sorting = $req->input("sorting");
        }

        if ($req->input("country")) {


            $country = $req->input("country");
        }


        $data = trim($data);
        $keywords = explode("+", $data);
        $keys = array_keys($keywords);
        // $response = Http::post("http://127.0.0.1:7000/searchingdata", [
        //     "search" => $data
        // ]);
        // $keywords = $response->json();
        // return $keywords;
        // return $keywords[0];
        $resource = DB::table("resources_csv");
        $materials = DB::table("materials_csv");
        $services = DB::table("service_csv");


        



        for ($x = 0; $x < count($keys); $x++) {

            $resource = $resource->orWhere("Name", "like", $keywords[$keys[$x]] . "%")->orWhere("Name", "like", "% " . $keywords[$keys[$x]] . "%")
                ->orWhere("CSI", "like", $keywords[$keys[$x]] . "%")->orWhere("CSI", "like", "% " . $keywords[$keys[$x]] . "%");

            $materials = $materials->orWhere("Description", "like",   $keywords[$keys[$x]] . "%")->orWhere("Description", "like", "% " .   $keywords[$keys[$x]] . "%")
                ->orWhere("CSI", "like", $keywords[$keys[$x]] . "%")->orWhere("CSI", "like", "% " . $keywords[$keys[$x]] . "%")
                ->orWhere("Brief_Specs", "like", $keywords[$keys[$x]] . "%")->orWhere("Brief_Specs", "like", "% " . $keywords[$keys[$x]] . "%");
            $services = $services->orWhere("Description", "like",   $keywords[$keys[$x]] . "%")->orWhere("Description", "like",  "% " . $keywords[$keys[$x]] . "%")
                ->orWhere("CSI", "like", $keywords[$keys[$x]] . "%")->orWhere("CSI", "like", "% " . $keywords[$keys[$x]] . "%")
                ->orWhere("Specifications", "like", $keywords[$keys[$x]] . "%")->orWhere("Specifications", "like", "% " . $keywords[$keys[$x]] . "%");
        }



        if ($category == "Price") {
            if ($sorting == "Ascending" || $sorting == "None") {
                echo "Price Ascending";
                $resource = $resource->orderBy('Current_Salary', 'ASC');
                $materials = $materials->orderBy('Price_Min', 'ASC');
                $services = $services->orderBy('Price_Min', 'ASC');
            } else {
                echo "Price Descending";
                $resource = $resource->orderBy('Current_Salary', 'DESC');
                $materials = $materials->orderBy('Price_Max', 'DESC');
                $services = $services->orderBy('Price_Max', 'DESC');
            }
        } else if ($category == "Origin") {
            if ($sorting == "Ascending" || $sorting == "None") {
                echo "Origin Ascending";
                $materials = $materials->orderBy('Origin', 'ASC');
                $services = $services->orderBy('Location', 'ASC');
            } else {
                echo "Origin Descending";
                $materials = $materials->orderBy('Origin', 'DESC');
                $services = $services->orderBy('Location', 'DESC');
            }
        } else if ($category == "Availability") {
            if ($sorting == "Ascending" || $sorting == "None") {
                echo "Availability Ascending";
                $resource = $resource->orderBy('Availability', 'ASC');
                $materials = $materials->orderBy('Availability', 'ASC');
                // $services = $resource->orderBy('Location', 'asc');
            } else {
                echo "Availability Descending";
                $resource = $resource->orderBy('Availability', 'DESC');
                $materials = $materials->orderBy('Availability', 'DESC');
                // $services = $resource->orderBy('Location', 'desc');
            }
        }




        // echo "Category".$category;
        // echo "Sorting" . $sorting;
        // return
        // "Category" . $category. "And Sorting" . $sorting;






        $resource = $resource->get();
        $materials = $materials->get();
        $services = $services->get();

        // $resource = $resource->get();
        // $materials = $materials->get();
        // $services = $services->get();


        // return $resource;
        return view("contentshow", ["data" => $data, "resource" => $resource, "services" => $services, "materials" => $materials, "category" => $category, "sorting" => $sorting, "country"=>$country]);


        // return view("contentshow", ["data" => $data, "resource" => $resource, "category" => $category, "sorting" => $sorting]);
    }

    function FetchResources($search, $category, $sorting)
    {
        // $response = Http::post("http://127.0.0.1:7000/searchingdata", [
        //     "search" => $search
        // ]);
        // $keywords = $response->json();
        $data = trim($search);

        $keywords = explode("+", $data);
        $keys = array_keys($keywords);

        $resource = DB::table("resources_csv");
        for ($x = 0; $x < count($keys); $x++) {

            $resource = $resource->orWhere("Name", "like", $keywords[$keys[$x]] . "%")->orWhere("Name", "like", "% " . $keywords[$keys[$x]] . "%")
                ->orWhere("CSI", "like", $keywords[$keys[$x]] . "%")->orWhere("CSI", "like", "% " . $keywords[$keys[$x]] . "%");
        }

        if ($category == "Availability") {
            if ($sorting == "Ascending" || $sorting == "None") {
                $resource = $resource->orderBy('Availability', 'asc');

                // $services = $resource->orderBy('Location', 'asc');
            } else {
                $resource = $resource->orderBy('Availability', 'desc');

                // $services = $resource->orderBy('Location', 'desc');
            }
        }



        $resource = $resource->simplePaginate(3);

        // return $resource;
        return view("contentshow", ["data" => $search, "resource" => $resource, "category" => $category, "sorting" => $sorting]);
    }

    function FetchServices($search, $category, $sorting)
    {

        // $response = Http::post("http://127.0.0.1:7000/searchingdata", [
        //     "search" => $search
        // ]);
        // $keywords = $response->json();

        $data = trim($search);
        $keywords = explode("+", $data);
        $keys = array_keys($keywords);

        $services = DB::table("service_csv");

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


        $services = $services->simplePaginate(3);
        // return $resource;
        return view("contentshow", ["data" => $search, "services" => $services, "category" => $category, "sorting" => $sorting]);
    }

    function FetchMaterials($search, $category, $sorting)
    {
        // $response = Http::post("http://127.0.0.1:7000/searchingdata", [
        //     "search" => $search
        // ]);
        // $keywords = $response->json();

        $data = trim($search);
        $keywords = explode("+", $data);
        $keys = array_keys($keywords);


        $materials = DB::table("materials_csv");

        for ($x = 0; $x < count($keywords); $x++) {

            $materials = $materials->orWhere("Description", "like",   $keywords[$keys[$x]] . "%")->orWhere("Description", "like", "% " .   $keywords[$keys[$x]] . "%")
                ->orWhere("CSI", "like", $keywords[$keys[$x]] . "%")->orWhere("CSI", "like", "% " . $keywords[$keys[$x]] . "%")
                ->orWhere("Brief_Specs", "like", $keywords[$keys[$x]] . "%")->orWhere("Brief_Specs", "like", "% " . $keywords[$keys[$x]] . "%");
        }

        if ($category == "Price") {
            if ($sorting == "Ascending" || $sorting == "None") {

                $materials = $materials->orderBy('Price_Min', 'asc');
            } else {

                $materials = $materials->orderBy('Price_Max', 'desc');
            }
        } else if ($category == "Origin") {
            if ($sorting == "Ascending" || $sorting == "None") {

                $materials = $materials->orderBy('Origin', 'asc');
            } else {

                $materials = $materials->orderBy('Origin', 'desc');
            }
        } else if ($category == "Availability") {
            if ($sorting == "Ascending" || $sorting == "None") {

                $materials = $materials->orderBy('Availability', 'asc');
                // $services = $resource->orderBy('Location', 'asc');
            } else {

                $materials = $materials->orderBy('Availability', 'desc');
                // $services = $resource->orderBy('Location', 'desc');
            }
        }


        $materials = $materials->simplePaginate(3);

        // return $resource;
        return view("contentshow", ["data" => $search, "materials" => $materials, "category" => $category, "sorting" => $sorting]);
    }

    function FetchImages($search, $category, $sorting){
        $imagedata = [
            "https://plus.unsplash.com/premium_photo-1682721999780-28ee72fd8970?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2071&q=80",
            "https://images.unsplash.com/photo-1560435650-7ec2e17ba926?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80",
            "https://images.unsplash.com/photo-1588399944136-efbd34b99d6b?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2065&q=80",
            "https://plus.unsplash.com/premium_photo-1682724027686-a3cb190bafa2?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2071&q=80",
            "https://images.unsplash.com/photo-1630816058207-b99271ccab34?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1974&q=80"
        ];

        return view("contentshow", ["data" => $search, "imagedata" => $imagedata, "category" => $category, "sorting" => $sorting]);
    }



    function login(Request $req)
    {

        $req->validate([

            'email' => 'required',
            'password' => 'required'
        ]);
        // return $req->input("password");

        $user = User::where('email', $req->email)->first();

        if (!$user || !Hash::check($req->password, $user->password)) {
            return redirect("/login");
        } else {
            // return $user;
            $req->session()->put("user", $user);
            return redirect("/");
        }
    }


    function register(Request $req)
    {

        $req->validate([

            'email' => 'required',
            'password' => 'required',
            'username' => 'required'
        ]);

        $user = new User;
        $user->name = $req->username;
        $user->email = $req->email;
        $user->password = $req->password;
        $user->save();
        return redirect("/login");
        // return $req->input("password");


    }


    function logout(Request $req)
    {


        $req->session()->pull("user", null);
        return redirect("/");
    }


    function addmaterial(Request $req)
    {

        $material = new Material;
        $material->CSI = $req->csi;
        $material->Description = $req->description;
        $material->Qualification = $req->qualifications;
        $material->Brief_Specs = $req->brief_specs;
        $material->Function = $req->function;
        $material->Origin = $req->origin;
        $material->Currency = $req->currency;
        $material->Price_Min = $req->price_min;
        $material->Price_Max = $req->price_max;
        $material->Unit = $req->unit;
        $material->Discount = $req->discount;
        $material->Monthly_Trend = $req->monthly_trend;

        $material->Availability = $req->availability;
        $material->Alternate = $req->alternate;
        $material->Alternate_CSI = $req->alternate_csi;
        $material->Notes = $req->notes;
        // $material->Created_On = $req->created_on;
        // $material->Update_On = $req->update_on;
        $material->Keywords = $req->keywords;

        if ($req->file("Photo")) {
            $material->Photo = $req->file("Photo")->store('img');
        }

        $material->save();

        return redirect("/addmaterial");
    }





    function addresource(Request $req)
    {
        $resource = new Resource;

        $resource->CSI = $req->csi;
        $resource->Name = $req->Name;
        $resource->Qualification = $req->Qualification;
        $resource->Experience = $req->Experience;
        $resource->Awards = $req->Awards;
        $resource->Current_Salary = $req->Current_Salary_All;
        $resource->Currency = $req->Currency;
        if ($req->file("Photo")) {
            $resource->Photo = $req->file("Photo")->store('img');
        }

        $resource->Notes = $req->Notes;
        $resource->Engagement = $req->Engagement_Type;
        $resource->Availability = $req->Availability;
        $resource->Location = $req->Location;

        $resource->Nationality = $req->Nationality;
        $resource->Age_Years = $req->Age_Years;
        $resource->Reference = $req->References;
        $resource->Notes = $req->Notes;
        // $resource->Created_On = $req->Created_On;
        // $resource->Update_On = $req->Update_On;


        $resource->save();
        return redirect("/addresource");
    }


    function addservice(Request $req)
    {
        $service = new Service;

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
        return redirect("/addservice");
    }

     
}
