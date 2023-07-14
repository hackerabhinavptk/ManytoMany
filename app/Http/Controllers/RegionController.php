<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Region;
use App\Models\Store;

class RegionController extends Controller
{
    public function form(Request $request)
    {

        return view('region');

    }

    public function submit_region(Request $request)
    {

        $request->validate([
            'region_name' => 'required|min:4',


        ]);
        $region = Region::create($_REQUEST);
        if ($region) {

            $request->session()->flash('success', 'data submitted successfully');

        } else {
            $request->session()->flash('error', 'data not submitted successfully');
        }
        return back();

    }



    public function relation_form(Request $request){

        $stores = Store::all();
        // dd($stores);
        return view('storeregion',['stores'=>$stores]);
                
        
            }
        
            public function submit(Request $request){
        
                //  dd($_REQUEST);
        
                $region = new Region();
                $region->region_name = $request->region_name;
                  $region->save();
                $region->stores()->attach($request->store_name);
               return back();
            }

}