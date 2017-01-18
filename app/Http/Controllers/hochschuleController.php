<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
use Redirect;

class hochschuleController extends Controller
{
    public function create(Request $request){
        $h = new App\hochschules;
        $name = $request->input('hochschule');
        $h->name=$name;
        $h->save();
        $s = App\hochschule::all();
        return Redirect::to('/controlpanel');
        //return view('admincp', compact('s'));
    }
}
