<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
use Illuminate\Database\Eloquent\Collection;
use DB;


class SearchController extends Controller
{
    public function search($input){
        //$studiengang = App\User::all()->where('email', "$input");
        $bool = false;

        $studiengang = App\User::all();
       $string = "<h2>Resultate der Suche:</h2><ul class='list-group'>";
       foreach ($studiengang as $x){
           if(strpos(strtolower($x->email), strtolower($input)) !== false) {
               $bool=true;


               $string = $string . "<li class='list-group-item'>" . $x->email . "</li>";
           }
       }
        if($bool) {
            return $string . "</ul>";
        }
        else{
            return $string . "<li class='list-group-item'>Keine Einträge gefunden</li>" . "</ul>";
        }
    }

    public function searchHochschulen($input){
        //$studiengang = App\User::all()->where('email', "$input");
        $bool = false;
        $studiengang = App\hochschule::all();
        $string = "<h2>Resultate der Suche:</h2><ul class='list-group'>";
        foreach ($studiengang as $x){
            if(strpos(strtolower($x->name), strtolower($input)) !== false) {
                $bool=true;

                $string = $string . "<li class='list-group-item'>" . $x->name . "</li>";
            }
        }
        if($bool) {
            return $string . "</ul>";
        }
        else{
            return $string . "<li class='list-group-item'>Keine Einträge gefunden</li>" . "</ul>";
        }
    }

    public function searchStudiengang($input){
        //$studiengang = App\User::all()->where('email', "$input");
        $bool = false;

        $hochschulen = App\hochschule::all();
        $studiengang = App\studiengang::all();
        $string = "<h2>Resultate der Suche:</h2><ul class='list-group'>";
        foreach ($studiengang as $x){
            foreach ($hochschulen as $h) {
                if ($x->hochschule == $h->id) {
                    if (strpos(strtolower($x->name), strtolower($input)) !== false) {
                        $bool=true;

                        $string = $string . "<li class='list-group-item'>" . $x->name . ", " . $h->name . "</li>";
                    }
                }
            }
        }
        if($bool) {
            return $string . "</ul>";
        }
        else{
            return $string . "<li class='list-group-item'>Keine Einträge gefunden</li>" . "</ul>";
        }
    }


    public function searchFach($input){
        $bool = false;

        //$studiengang = App\User::all()->where('email', "$input");
        $fach = App\fach::all();
        $string = "<h2>Resultate der Suche:</h2><ul class='list-group'>";
        foreach ($fach as $x){
            if (strpos(strtolower($x->name), strtolower($input)) !== false) {
                $bool=true;

                $string = $string . "<li class='list-group-item'>" . $x->name . " ID: " . $x->id . "</li>";
            }
        }
        if($bool) {
            return $string . "</ul>";
        }
        else{
            return $string . "<li class='list-group-item'>Keine Einträge gefunden</li>" . "</ul>";
        }
    }

    public function getMonth(Request $request){

        $user = $request->input('user');
        $monat = $request->input('monat');
        $rel = App\userandkalender::all();
        $string = "";
        $array = array();
        foreach ($rel as $r) {
            if($r->userid == $user && $r->monat == $monat){
                $rel = $r;

                for ($i = 1; $i <= 31; $i++){
                    $var = "tag".$i;
                    $string = $string . $rel->$var . "-";
                    $array[$i] = $rel->$var;
                }

            }
        }
        return $string;


           // $werte = DB::select("select '$var' from userandkalenders u where u.userid ='$user' AND u.monat = '$monat'");


    }

    public function saveKalender(Request $request){
        $user = $request->input('user');
        $monat = $request->input('monat');
        $tagid = $request->input('tagID');
        $eingabe = $request->input('wert');

        $rel = App\userandkalender::all();
        foreach ($rel as $r) {
            if($r->userid == $user && $r->monat == $monat){
                $rel = $r;
                $rel->$tagid = $eingabe;
                $rel->save();
            }
        }

    }

    public function createKalender(Request $request){
        $allusers = App\user::all();
        $user = $request->input('user');

        foreach ($allusers as $a) {
            if($a->id == $user){
                $a->kalender = 1;
                $a->save();
                for($i = 1; $i <= 12; $i++){
                    $rel = new App\userandkalender;
                    $rel->userid = $user;
                    $rel->monat = $i;
                    $rel->save();
                }
            }
        }

        return "done";

    }


}
