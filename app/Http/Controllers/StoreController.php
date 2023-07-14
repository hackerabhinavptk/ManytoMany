<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Store;
use App\Models\Region;
class StoreController extends Controller
{
    public function form(Request $request)
    {

        return view('store');

    }

    public function submit_store(Request $request)
    {

        $request->validate([
            'store_name' => 'required|min:4',


        ]);


        $store = Store::create($_REQUEST);
        if ($store) {

            $request->session()->flash('success', 'data submitted successfully');

        } else {
            $request->session()->flash('error', 'data not submitted successfully');
        }
        return back();
    }


    public function relation_form(Request $request){

$regions=Region::all();
return view('regionstore',['regions'=>$regions]);
        

    }

    public function submit(Request $request){

        // dd($_REQUEST);

        $store = new Store();
        $store->store_name = $request->store_name;
          $store->save();
        $store->regions()->attach($request->region_name);
       
    }

}