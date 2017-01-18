<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
use DB;
use Redirect;

class kontoController extends Controller
{
    public function ajaxBuchen(Request $request)
    {
        $user = $request->input('user');
        $value = $request->input('zeit');

        $string ="";

        $fachid = $request->input('fach');
        $results = App\userhassubjectsrelation::all()->where('userid', $user);



        foreach ($results as $r){
            if($r->subjectid == $fachid){
                if($r->meinAufwand+(float)$value < 0){
                    return "ERROR, zu viel abgezogen!";
                }else {
                    $r->meinAufwand = (float)$r->meinAufwand + (float)$value;
                    $r->save();
                    return "$r->meinAufwand [min], " . round($r->meinAufwand / 60, 2) . " [h]";
                }
            }
        }
       // $rel = App\userhassubjectsrelation::all()->where('userid', $user);

        //$rel->meinAufwand+=$value;

        //$rel->save();

    }

    public function ajaxWertHolen(Request $request)
    {
        $user = $request->input('user');

        $string ="";


        $fachid = $request->input('fach');

        $results = App\userhassubjectsrelation::all()->where('userid', $user);
        foreach ($results as $r){
            if($r->subjectid == $fachid){
                if(is_null($r->meinAufwand) || empty($r->meinAufwand) || strlen($r->meinAufwand) < 1){
                    $string = "0";
                }
                $string = $string . $r->meinAufwand;
            }
        }
        //$results = DB::select("select u.meinAufwand as aufwand from userhassubjectsrelations u");

        //$rel->meinAufwand+=$value;

        //$rel->save();

        return (float)$string;
        //return "$string [min], " . round($string/60,2) . " [h]";
    }


    public function start(Request $request){
        $facher = App\fach::all();
        $relation = App\userhassubjectsrelation::all();
        $x = $request->input('stoppuhrWert');
        return view('myECTSKonto', compact('facher','relation','x'));
    }

    public function fromStoppuhr($value){


        $facher = App\fach::all();
        $relation = App\userhassubjectsrelation::all();
        $x = round($value/60,2);
        if(is_null($x) || empty($x)){
            return Redirect::to('/konto');
        }else{
            return view('myECTSKonto_Stoppuhr', compact('facher','relation','x'));

        }


    }



}
