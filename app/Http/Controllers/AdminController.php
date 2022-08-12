<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index()
    {
        $listings = DB::table('listings')->count(); //Get The Listing Count 

        return view('admin.index', [ //Returns the Admin Index View
            'listings' => $listings  //Passes The Count To View
        ]);
    }

    public function addListing()
    {
        return view('admin.addListing');
    }

    public function StoreListing(Request $request)
    {

        $long = 'long';
        $lat = 'lat';
        
        DB::table('listings')->insert([
            'name' => $request->name,
            'image' => 'update asap',
            'description' => $request->description,
            'long' => $long,
            'lat' => $lat,
            'website' => $request->website,
            'line_one' => $request->line_one,
            'line_two' => $request->line_two,
            'town' => $request->town,
            'county' => $request->county,
            'country' => $request->country,
            'postcode' => $request->postcode,
        ]);
    }

    public function listings()
    {

        $listings = DB::table('listings')->get();

        return view('admin.listings', [
            'listings' => $listings
        ]);

    }

    public function stats()
    {
        
    }
}
