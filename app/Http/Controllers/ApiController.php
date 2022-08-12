<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApiController extends Controller
{
    public function listings(Request $request)
    {
        $data = [];
        $listings = DB::table('listings')->get();

        // return($listings);

        foreach($listings as $listing)
        {
            $lon2 = $listing->long;
            $lat2 = $listing->lat;

            $unit = '';
            $theta = $request->long - $lon2;
            $dist = sin(deg2rad($request->lat)) * sin(deg2rad($lat2)) +  cos(deg2rad($request->lat)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
            $dist = acos($dist);
            $dist = rad2deg($dist);
            $miles = $dist * 60 * 1.1515;
            $unit = strtoupper($unit);
          
        
                
            if($miles < $request->radius)
            {
                array_push($data,$listing); 
            }
        }
       
    //    foreach($data as $dat){
    //      $listing = DB::table('listings')->where('id', $dat)->first();

    //      var_dump($listing);
    //    }

    $data = json_encode($data);
    $output = json_encode(['listings' => json_decode($data, true)]);

    echo $output;
        // return($data);
    }

    public function AllListings()
    {
        $listings = DB::table('listings')->get();

        return($listings);
    }

    public function GetListing(Request $request)
    {
        $listing = DB::table('listings')->where('id', $request->id)->first();

        return($listing);
    }
}
