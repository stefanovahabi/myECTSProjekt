<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
use \Auth;
use DB;

class veranstaltungController extends Controller
{

    public function start(){
        //$facher = App\fach::all();
        //$rel = App\userhassubjectsrelations::all();
        return "hej";
    }

    public function ajax(Request $request){

        $user = $request->input('user');
        $felder = $request->input('felder');

        $stmnt = DB::select("select count(*) as anzahl from userandstundenplans u where u.userid ='$user'");

        if(is_null($felder) && $stmnt[0]->anzahl == 0) //leeren Stundenplan und hat keinen Eintrag in DB
            return "nene, so nicht dikka";

        //DB::table('userandstundenplans')->where('userid', '=', $user)->delete();

        if($stmnt[0]->anzahl == 0){
            $rel = new App\userandstundenplan;
            $rel->userid = $user;

        }else{
            $rel = App\userandstundenplan::all();
            foreach ($rel as $r){
                if($r->userid == $user){
                    $rel = $r;
                }
            }
        }
      //  $rel = new App\userandstundenplan;
//                $table->string('td'.$i)->nullable()->default(" ");
        $string = "";
       //$rel->userid = $user;
        $variable = "td";
        $i = 1;
        foreach ($felder as $f){
            $other = $variable.$i;

            if(is_null($f))
                $f = " ";

                $rel->$other = $f;
                //$string = $string . $i . $f;

            $x = $i;
            $i++;


        }

        $rel->save();

        //$rest = substr((string)$stmnt, 3, -5);  // gibt "cde" zurück
     //   return $stmnt[0]->anzahl;
    }

}
