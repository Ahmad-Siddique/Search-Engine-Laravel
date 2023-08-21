<?php

namespace App\Http\Controllers;

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

        $response = Http::post("http://127.0.0.1:7000/searchingdata", [
            "search" => $data
        ]);
        $keywords = $response->json();
        // return $keywords;
        // return $keywords[0];
        $resource = DB::table("resources_csv");
        $materials = DB::table("materials_csv");
        $services = DB::table("service_csv");
        for ($x = 0; $x < count($keywords); $x++) {

            $resource = $resource->orWhere("Name", "like", $keywords[$x] . "%")->orWhere("Name", "like", "% " . $keywords[$x] . "%")
                ->orWhere("CSI", "like", $keywords[$x] . "%")->orWhere("CSI", "like", "% " . $keywords[$x] . "%");

            $materials = $materials->orWhere("Description", "like",   $keywords[$x] . "%")->orWhere("Description", "like", "% " .   $keywords[$x] . "%")
                ->orWhere("CSI", "like", $keywords[$x] . "%")->orWhere("CSI", "like", "% " . $keywords[$x] . "%")
                ->orWhere("Brief_Specs", "like", $keywords[$x] . "%")->orWhere("Brief_Specs", "like", "% " . $keywords[$x] . "%");
            $services = $services->orWhere("Description", "like",   $keywords[$x] . "%")->orWhere("Description", "like",  "% " . $keywords[$x] . "%")
                ->orWhere("CSI", "like", $keywords[$x] . "%")->orWhere("CSI", "like", "% " . $keywords[$x] . "%")
                ->orWhere("Specifications", "like", $keywords[$x] . "%")->orWhere("Specifications", "like", "% " . $keywords[$x] . "%");
        }

        $resource = $resource->simplePaginate(3);
        $materials = $materials->simplePaginate(3);
        $services = $services->simplePaginate(3);


        // return $resource;
        return view("contentshow", ["data" => $data, "resource" => $resource, "services" => $services, "materials" => $materials]);
    }

    function FetchResources($search)
    {
        $response = Http::post("http://127.0.0.1:7000/searchingdata", [
            "search" => $search
        ]);
        $keywords = $response->json();
        $resource = DB::table("resources_csv");
        for ($x = 0; $x < count($keywords); $x++) {

            $resource = $resource->orWhere("Name", "like", $keywords[$x] . "%")->orWhere("Name", "like", "% " . $keywords[$x] . "%");
        }

        $resource = $resource->simplePaginate(3);

        // return $resource;
        return view("contentshow", ["data" => $search, "resource" => $resource]);
    }

    function FetchServices($search)
    {

        $response = Http::post("http://127.0.0.1:7000/searchingdata", [
            "search" => $search
        ]);
        $keywords = $response->json();
        $services = DB::table("service_csv");

        for ($x = 0; $x < count($keywords); $x++) {

            $services = $services->orWhere("Description", "like",   $keywords[$x] . "%")->orWhere("Description", "like",  "% " . $keywords[$x] . "%");
        }

        $services = $services->simplePaginate(3);
        // return $resource;
        return view("contentshow", ["data" => $search, "services" => $services]);
    }

    function FetchMaterials($search)
    {
        $response = Http::post("http://127.0.0.1:7000/searchingdata", [
            "search" => $search
        ]);
        $keywords = $response->json();

        $materials = DB::table("materials_csv");

        for ($x = 0; $x < count($keywords); $x++) {

            $materials = $materials->orWhere("Description", "like",   $keywords[$x] . "%")->orWhere("Description", "like", "% " .   $keywords[$x] . "%");
        }

        $materials = $materials->simplePaginate(3);

        // return $resource;
        return view("contentshow", ["data" => $search, "materials" => $materials]);
    }



    function login(Request $req){
        
        $req->validate([

            'email' => 'required',
            'password' => 'required'
        ]);
        // return $req->input("password");

        $user = User::where('email', $req->email)->first();

        if (!$user || !Hash::check($req->password, $user->password)) {
            return redirect("/login");
        }
        else{
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
}
