<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
use Redirect;

class fachController extends Controller
{
    public function create(Request $request){
        $f = new App\fach;
        $kuerzel = $request->input('kuerzel');
        $name = $request->input('name');
        $sws = $request->input('sws');
        $ects = $request->input('ects');
        $prof = $request->input('prof');
        $gange = $request->input('selectionZuordnung');


        $f->kuerzel=$kuerzel;
        $f->name=$name;
        $f->sws=$sws;
        $f->prof=$prof;
        $f->ects=$ects;

        $f->save();

        $max = sizeof($gange);
        for ($i = 0; $i < $max; $i++) {
            $rel = new App\studiengangfachrelation;
            $rel->studiengang=$gange[$i];
            $rel->fach=$f->id;
            $rel->save();
            // $string = $string . "," . $facher[$i];
        }

        $s = App\hochschule::all();
        //return $gange;
        return Redirect::to('/controlpanel');
    }
}
