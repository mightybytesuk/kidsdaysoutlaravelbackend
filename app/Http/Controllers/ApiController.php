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
       
    $data = json_encode($data);
    $output = json_encode(['listings' => json_decode($data, true)]);

    echo $output;
      
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

    //Testing Best Way to import csv file to DB
    public function importCSV(Request $request)
    {
        $row = 1;
        if (($handle = fopen("test.csv", "r")) !== FALSE) {
            while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                $num = count($data);
                echo "<p> $num fields in line $row: <br /></p>\n";
                $row++;
                for ($c=0; $c < $num; $c++) {
                    echo $data[$c] . "<br />\n";
                }
            }
            fclose($handle);
        }
        
    }
}
