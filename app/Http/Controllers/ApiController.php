<?php

namespace App\Http\Controllers;

use SimpleXMLElement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use Spatie\SimpleExcel\SimpleExcelReader;


class ApiController extends Controller
{
    public function listings(Request $request)
    {
        $data = [];
        $listings = DB::table('listings')->get();

        // Move this into a query as bulky at the moment

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

        return Response::json(['listings'=>$listings],200);
    }

    public function GetListing(Request $request)
    {
        $listing = DB::table('listings')->where('id', $request->id)->first();

        return($listing);
    }
    
    public function importCSV(Request $request)
    {
        //Get Long & Lat From Address Via Google Maps API

       
        $i = 0;
        //
        SimpleExcelReader::create('test.csv')->getRows()
        ->each(function(array $rowProperties) {

            $address = $rowProperties['address'];
            $address = trim(preg_replace('/\s\s+/', '', $address));
            $address = str_replace(",","+",$address);
            $address = str_replace(" ","",$address);
            

            
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, "https://maps.googleapis.com/maps/api/geocode/json?address=".$address."&key=AIzaSyDxgA5Hw6elayyKIURAI-Ax2tJeZko5wAI");
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            $data = curl_exec($ch);
            $decode = json_decode($data, true);
            
            curl_close($ch); 

            DB::table('listings')->insert([
                'name' => $rowProperties['name'],
                'description' => $rowProperties['description'],
                'long' => $decode['results'][0]['geometry']['location']['lng'],
                'lat' => $decode['results'][0]['geometry']['location']['lat'],
                'image' => $rowProperties['image-src'],
                'price' => null,
                'website' => $rowProperties['website-href'],
                'phone' => $rowProperties['number'],
                'address' => $rowProperties['address'],
            ]);
            
         });

         return('Import Complete');
    }

}
