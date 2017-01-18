<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
use Redirect;

class studiengangController extends Controller
{
    public function create(Request $request){
        $s = new App\studiengang;
        $kuerzel = $request->input('kuerzel');
        $name = $request->input('name');
        $hochschulid = $request->input('selection');

        $s->kuerzel=$kuerzel;
        $s->name=$name;
        $s->hochschule=$hochschulid;
        $s->save();
        $s = App\hochschule::all();

        return Redirect::to('/controlpanel');
    }
}
