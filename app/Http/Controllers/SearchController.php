<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;



class SearchController extends Controller
{
    function FetchSearchedData(Request $req){
        $data = $req->input("search");

        $response = Http::post("http://127.0.0.1:7000/searchingdata",[
            "search"=>$data
        ]);
        $keywords = $response->json();
        
        // return $keywords[0];
        $resource = DB::table("resources_csv");
        $materials = DB::table("materials_csv");
        $services = DB::table("service_csv");
        for($x = 0; $x < count($keywords); $x++){
            echo $keywords[$x];
            $resource = $resource->orWhere("Name","like","% ".$keywords[$x]."%");
            $materials = $materials->orWhere("Description", "like", $keywords[$x] . "%");
            $services = $services->orWhere("Description", "like", $keywords[$x] . "%");
        }

        $resource = $resource->get();
        $materials = $materials->get();
        $services = $services->get();

        
        // return $resource;
        return view("contentshow",["data"=>$data,"resource"=>$resource,"services"=>$services,"materials"=>$materials]);
    }

    function FetchResources($search)
    {
        

        $resource = DB::table("resources")->where("Keywords", $search)->get();
        
        // return $resource;
        return view("contentshow", ["data" => $search, "resource" => $resource]);
    }

    function FetchServices($search)
    {


        $services = DB::table("services")->where("Keywords", $search)->get();

        // return $resource;
        return view("contentshow", ["data" => $search, "services" => $services]);
    }

    function FetchMaterials($search)
    {


        $materials = DB::table("materials")->where("Keywords", $search)->get();

        // return $resource;
        return view("contentshow", ["data" => $search, "materials" => $materials]);
    }
}
