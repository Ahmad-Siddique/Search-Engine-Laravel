<?php

namespace App\Http\Controllers;

use App\Models\AskExpert;
use App\Models\Background_Pic;
use App\Models\CurrencyConversion;
use App\Models\Get_Qoute;
use App\Models\Material;
use App\Models\Resource;
use App\Models\Search_History;
use App\Models\Service;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Maatwebsite\Excel\Facades\Excel;
use Stevebauman\Location\Facades\Location;

use App\Imports\MaterialsImport;

use Illuminate\Support\Facades\Session;
use Mail;





class SearchController extends Controller
{

    function MainPage()
    {
        // $randomnumber = rand(1, 5);
        $backgroundpic = Background_Pic::all()->random(1)->first();
        // echo $backgroundpic;
        return view("mainpage", ["randompic" => $backgroundpic]);
    }



    function FetchSearchedData(Request $req)
    {
        $data = $req->input("search");
        $category = "None";
        $sorting = "None";
        $currency = "None";
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

        if ($req->input("currency")) {


            $currency = $req->input("currency");
        }

        
        $currency_rate = DB::table("currency_conversion")->where("currency",$currency)->get();
        // echo $currency_rate;

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


        $ip = $req->ip();
        // echo $ip;
        $currentUserInfo = Location::get($ip);
        // echo $currentUserInfo;

        for ($x = 0; $x < count($keys); $x++) {
            $search_history = new Search_History;
            $search_history->keyword = $keywords[$keys[$x]];
            if($currentUserInfo){

            
            $search_history->countryName = $currentUserInfo->countryName;
            $search_history->regionName  = $currentUserInfo->regionName ;
            $search_history->cityName  = $currentUserInfo->cityName ;
            $search_history->zipCode = $currentUserInfo->zipCode;
            $search_history->ip = $ip;
            }
            
            if(session("user")){
                $search_history->user_id = session("user")->id;
            }
            $search_history->save();
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
                // echo "Price Ascending";
                $resource = $resource->orderBy('Price_Min', 'ASC');
                $materials = $materials->orderBy('Price_Min', 'ASC');
                $services = $services->orderBy('Price_Min', 'ASC');
            } else {
                // echo "Price Descending";
                $resource = $resource->orderBy('Price_Max', 'DESC');
                $materials = $materials->orderBy('Price_Max', 'DESC');
                $services = $services->orderBy('Price_Max', 'DESC');
            }
        } else if ($category == "Origin") {
            if ($sorting == "Ascending" || $sorting == "None") {
                // echo "Origin Ascending";
                $resource = $resource->orderBy('Nationality', 'ASC');
                $materials = $materials->orderBy('Origin', 'ASC');
                $services = $services->orderBy('Location', 'ASC');
            } else {
                // echo "Origin Descending";
                $resource = $resource->orderBy('Nationality', 'DESC');
                $materials = $materials->orderBy('Origin', 'DESC');
                $services = $services->orderBy('Location', 'DESC');
            }
        } else if ($category == "Availability") {
            if ($sorting == "Ascending" || $sorting == "None") {
                // echo "Availability Ascending";
                $resource = $resource->orderBy('Availability', 'ASC');
                $materials = $materials->orderBy('Availability', 'ASC');
                // $services = $resource->orderBy('Location', 'asc');
            } else {
                // echo "Availability Descending";
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
        return view("contentshow", ["data" => $data, "resource" => $resource, "services" => $services, "materials" => $materials, "category" => $category, "sorting" => $sorting, "country"=>$country, "currency"=>$currency,"currency_rate"=> $currency_rate]);


        // return view("contentshow", ["data" => $data, "resource" => $resource, "category" => $category, "sorting" => $sorting]);
    }

    function FetchResources($search, $category, $sorting,$currency)
    {
        // $response = Http::post("http://127.0.0.1:7000/searchingdata", [
        //     "search" => $search
        // ]);
        // $keywords = $response->json();
        $data = trim($search);
        if ($currency) {


            $currencyrate = $currency;
        }


        $currency_rate = DB::table("currency_conversion")->where("currency", $currencyrate)->get();
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



        $resource = $resource->paginate(3);

        // return $resource;
        return view("contentshow", ["data" => $search, "resource" => $resource, "category" => $category, "sorting" => $sorting, "currency" => $currency, "currency_rate" => $currency_rate]);
    }

    function FetchServices($search, $category, $sorting,$currency)
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


        $services = $services->paginate(3);
        // return $resource;
        return view("contentshow", ["data" => $search, "services" => $services, "category" => $category, "sorting" => $sorting, "currency" => $currency, "currency_rate" => $currency_rate]);
    }

    function FetchMaterials($search, $category, $sorting,$currency)
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


        $materials = $materials->paginate(3);

        // return $resource;
        return view("contentshow", ["data" => $search, "materials" => $materials, "category" => $category, "sorting" => $sorting, "currency" => $currency, "currency_rate" => $currency_rate]);
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
        $user->role = $req->role;
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


    function addmaterialfile(Request $req)
    {

        Excel::import(new MaterialsImport,$req->file('file'));

        // $material->save();

        return redirect("/addmaterialfile");
    }





    function addresource(Request $req)
    {
        $resource = new Resource;

        $resource->CSI = $req->csi;
        $resource->Name = $req->Name;
        $resource->Qualification = $req->Qualification;
        $resource->Experience = $req->Experience;
        $resource->Awards = $req->Awards;
        
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
        $resource->Price_Min = $req->Price_Min;
        $resource->Price_Max = $req->Price_Max;
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



    function expertquery(Request $req){
        echo "This is the requested url";
        $askexpert = new AskExpert;
        $askexpert->email = $req->email;
        $askexpert->question = $req->question;
        $askexpert->save();

        return back();
    }



    function allmaterial(){
        $data = DB::table("materials_csv")->paginate(10);

        return view("allmaterial",["collection"=>$data]);
    }

    function allservice()
    {
        $data = DB::table("service_csv")->paginate(10);

        return view("allservice", ["collection" => $data]);
    }


    function allresource()
    {
        $data = DB::table("resources_csv")->paginate(10);

        return view("allresource", ["collection" => $data]);
    }

    function updatematerial($id){
        $material = Material::find($id);
        
        return view("updatematerial",["data"=>$material]);
    }

    function updateservice($id)
    {
        $material = Service::find($id);
        return view("updateservice", ["data" =>$material]);
    }


    function updateresource($id)
    {
        $material = Resource::find($id);
        return view("updateresource", ["data" => $material]);
    }


    function searchmaterial(Request $req){
        $search = $req->search;
        // echo $search;
        $data = DB::table("materials_csv")->orWhere("Description", "like",   $search . "%")->orWhere("Description", "like", "% " .   $search . "%")
            ->orWhere("CSI", "like", $search . "%")->orWhere("CSI", "like", "% " . $search . "%")
            ->orWhere("Brief_Specs", "like", $search . "%")->orWhere("Brief_Specs", "like", "% " . $search . "%")
            ->orWhere("Qualification", "like", $search . "%")->orWhere("Qualification", "like", "% " . $search . "%")
            ->get();

        // echo $data;
        return view("allmaterial", ["collection" => $data]);
        // $material  = Material::
    }

    function searchresource(Request $req)
    {
        $search = $req->search;
        // echo $search;
        $data = DB::table("resources_csv")->orWhere("Name", "like", $search . "%")->orWhere("Name", "like", "% " . $search . "%")
        ->orWhere("CSI", "like", $search . "%")->orWhere("CSI", "like", "% " . $search . "%")->get();

        // echo $data;
        return view("allresource", ["collection" => $data]);
        // $material  = Material::
    }

    function searchservice(Request $req)
    {
        $search = $req->search;
        // echo $search;
        $data = DB::table("service_csv")->orWhere("Description", "like",   $search . "%")->orWhere("Description", "like",  "% " . $search . "%")
            ->orWhere("CSI", "like", $search . "%")->orWhere("CSI", "like", "% " . $search . "%")
            ->orWhere("Specifications", "like", $search . "%")->orWhere("Specifications", "like", "% " . $search . "%")
            ->get();

        // echo $data;
        return view("allservice", ["collection" => $data]);
        // $material  = Material::
    }


    function postupdatematerial(Request $req){
        $material = Material::find($req->id);
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

        return redirect("/updatematerial/".$req->id);

    }




    function postupdateservice(Request $req)
    {
        $service = Service::find($req->id);
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
       

        return redirect("/updateservice/" . $req->id);
    }




    function postupdateresource(Request $req)
    {
        $resource = Resource::find($req->id);
        $resource->CSI = $req->CSI;
        $resource->Name = $req->Name;
        $resource->Qualification = $req->Qualification;
        $resource->Experience = $req->Experience;
        $resource->Awards = $req->Awards;
        
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
        $resource->Price_Min = $req->Price_Min;
        $resource->Price_Max = $req->Price_Max;
        $resource->Notes = $req->Notes;
        // $resource->Created_On = $req->Created_On;
        // $resource->Update_On = $req->Update_On;


        $resource->save();
        


        return redirect("/updateresource/" . $req->id);
    }


    function getquote(Request $req){


        
        $quote = new Get_Qoute;
        $quote->email = $req->email;
        $quote->table_id = $req->table_id;
        $quote->table_name = $req->table_name;
        $quote->Name = $req->Name;
        $quote->Organization = $req->Organization;
        $quote->Phone_Number = $req->Phone_Number;
        $quote->Item_Description = $req->Item_Description;
        $quote->Quantity = $req->Quantity;


        $quote->Notes = $req->Notes;
        
       

        $quote->save();
        $email = array("name" => $quote->Name);
        $user["to"] = $quote->email;
        Mail::send('quotemail', $email,function($messages) use ($user){
            $messages->to($user["to"]);
            $messages->subject("Quotation Response");

        });


        return back();
    }





    function allusers()
    {
        $data = DB::table("users")->paginate(10);

        return view("allusers", ["collection" => $data]);
    }


    function adduser(Request $req){
        

        $user = new User;
        $user->name = $req->name;
        $user->email = $req->email;
        $user->password = $req->password;
        $user->role = $req->role;
        $user->save();
        return view("adduserform");
    }

    function updateuser($id)
    {
        $material = User::find($id);
        return view("updateuser", ["data" => $material]);
    }

    function postupdateuser(Request $req){
        
            $user = User::find($req->id);
            $user->email = $req->email;
            $user->name = $req->name;
        $user->role = $req->role;
            


            $user->save();



            return redirect("/updateuser/" . $req->id);
        
    }


    function postupdateuserinfo(Request $req)
    {

        $user = User::find($req->id);
        $user->email = $req->email;
        $user->name = $req->name;
        $sessionuser = session("user");
        $sessionuser["name"] = $req->name;
        $sessionuser["email"] = $req->email;
       
        session("user",$sessionuser);
        
        
        echo $req->name;


        $user->save();



        return redirect('/updateprofile');
    }


    function searchuser(Request $req)
    {
        $search = $req->search;
        // echo $search;
        $data = DB::table("users")->orWhere("email", "like",   $search . "%")->orWhere("email", "like",  "% " . $search . "%")
            ->orWhere("name", "like", $search . "%")->orWhere("name", "like", "% " . $search . "%")
            
            ->get();

        // echo $data;
        return view("allusers", ["collection" => $data]);
        // $material  = Material::
    }


    function allbackgroundpics()
    {
        $data = DB::table("backgroundpic")->paginate(10);

        return view("allbackgroundpic", ["collection" => $data]);
    }


    function addbackgroundpic(Request $req)
    {


        $BackgroundPic = new Background_Pic;
        $BackgroundPic->added_by = $req->added_by;
        if ($req->file("Photo")) {
            $BackgroundPic->Photo = $req->file("Photo")->store('public');
        }
        $BackgroundPic->save();
        return view("addbackgroundpicform");
    }

    function updatebackgroundpic($id)
    {
        $material = Background_Pic::find($id);
        return view("updatebackgroundpic", ["data" => $material]);
    }

    function postupdatebackgroundpic(Request $req)
    {

        $BackgroundPic = Background_Pic::find($req->id);
        if ($req->file("Photo")) {
            $BackgroundPic->Photo = $req->file("Photo")->store('public');
        }



        $BackgroundPic->save();



        return redirect("/updatebackgroundpic/" . $req->id);
    }









    function allaskexpert()
    {
        $data = DB::table("askexpert")->paginate(10);

        return view("allaskexpert", ["collection" => $data]);
    }


    // function addaskexpert(Request $req)
    // {


    //     $user = new User;
    //     $user->name = $req->name;
    //     $user->email = $req->email;
    //     $user->password = $req->password;
    //     $user->save();
    //     return view("adduserform");
    // }

    function updateaskexpert($id)
    {
        $material = AskExpert::find($id);
        return view("updateaskexpert", ["data" => $material]);
    }

    function postupdateaskexpert(Request $req)
    {

        $user = AskExpert::find($req->id);
        $user->email = $req->email;
        $user->question = $req->question;
        $user->answer = $req->answer;



        $user->save();



        return redirect("/updateaskexpert/" . $req->id);
    }


    function searchaskexpert(Request $req)
    {
        $search = $req->search;
        // echo $search;
        $data = DB::table("askexpert")->orWhere("email", "like",   $search . "%")->orWhere("email", "like",  "% " . $search . "%")
            ->orWhere("question", "like", $search . "%")->orWhere("question", "like", "% " . $search . "%")

            ->get();

        // echo $data;
        return view("allaskexpert", ["collection" => $data]);
        // $material  = Material::
    }





















    function allgetquote()
    {
        $data = DB::table("get_quote")->paginate(10);

        return view("allgetquote", ["collection" => $data]);
    }


    // function addaskexpert(Request $req)
    // {


    //     $user = new User;
    //     $user->name = $req->name;
    //     $user->email = $req->email;
    //     $user->password = $req->password;
    //     $user->save();
    //     return view("adduserform");
    // }

    function updategetquote($id)
    {
        $material = Get_Qoute::find($id);
        return view("updategetquote", ["data" => $material]);
    }

    function postupdategetquote(Request $req)
    {

        $quote = Get_Qoute::find($req->id);
        $quote->email = $req->email;
        
        $quote->answer = $req->answer;



        $quote->save();


        $email = array("name" => $quote->Name,"answer"=>$quote->answer);
        $user["to"] = $quote->email;
        Mail::send('QuoteResponse', $email, function ($messages) use ($user) {
            $messages->to($user["to"]);
            $messages->subject("Quotation Response");
        });



        return redirect("/updategetquote/" . $req->id);
    }


    function searchgetquote(Request $req)
    {
        $search = $req->search;
        // echo $search;
        $data = DB::table("get_quote")->orWhere("email", "like",   $search . "%")->orWhere("email", "like",  "% " . $search . "%")
            ->orWhere("question", "like", $search . "%")->orWhere("question", "like", "% " . $search . "%")

            ->get();

        // echo $data;
        return view("allgetquote", ["collection" => $data]);
        // $material  = Material::
    }




    function allsearchkeyword()
    {
        $data = DB::table("search_history")->paginate(10);

        return view("allsearchkeyword", ["collection" => $data]);
    }

    function usersearchhistory()
    {
        $data = DB::table("search_history")->where("user_id",session("user")->id)->paginate();
        // dd($data);
        return view("usersearchhistory", ["collection" => $data]);
    }












    function allcurrencyconversion()
    {
        $data = DB::table("currency_conversion")->paginate(10);

        return view("allcurrencyconversion", ["collection" => $data]);
    }


    function addcurrencyconversion(Request $req)
    {


        $user = new CurrencyConversion();
        $user->currency = $req->currency;
        $user->proc_nice = $req->proc_nice;
        
        $user->save();
        return view("addcurrencyconversion");
    }

    function updatecurrencyconversion($id)
    {
        $material = CurrencyConversion::find($id);
        return view("updatecurrencyconversion", ["data" => $material]);
    }

    function postupdatecurrencyconversion(Request $req)
    {

        $quote = CurrencyConversion::find($req->id);
        $quote->currency = $req->currency;

        $quote->price = $req->price;



        $quote->save();

        


        return redirect("/updatecurrencyconversion/" . $req->id);
    }


    function searchcurrencyconversion(Request $req)
    {
        $search = $req->search;
        // echo $search;
        $data = DB::table("currency_conversion")->orWhere("currency", "like",   $search . "%")->orWhere("currency", "like",  "% " . $search . "%")
            ->orWhere("price", "like", $search . "%")->orWhere("price", "like", "% " . $search . "%")

            ->get();

        // echo $data;
        return view("allcurrencyconversion", ["collection" => $data]);
        // $material  = Material::
    }



    function colorscheme(Request $req){
        $user = User::find(session("user")->id);
        $usercolor = $req->color;
        $sessionuser = session("user");
        $sessionuser["color"] = $usercolor;
       
        $user->color = $req->color;
        $user->save();
        session("user", $sessionuser);

        return redirect("/usercolorscheme");
    }



    function deleteuser($id)
    {
        $data = User::find($id);
        $data->delete();
        return redirect("alluser");
    }

    function deletematerial($id)
    {
        $data = Material::find($id);
        $data->delete();
        return redirect("allmaterial");
    }

    function deleteresource($id)
    {
        $data = Resource::find($id);
        $data->delete();
        return redirect("allresource");
    }

    function deleteservice($id)
    {
        $data = Service::find($id);
        $data->delete();
        return redirect("allservice");
    }



    











    





    

     
}
