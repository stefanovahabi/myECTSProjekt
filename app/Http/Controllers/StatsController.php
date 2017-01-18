<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
use DB;
use \Auth;

class StatsController extends Controller
{
    public function index(Request $request){
        $var = Auth::user()->id ;
        $s = App\userhassubjectsrelation::all();
        $users = App\user::all()->where('id',$var);
        $fachs = App\fach::all();


      //  $s = DB::table('userhassubjectsrelations')->where('email', 'stefano@name.de');
    //    foreach($s as $x){
      //      foreach ($users as $u){
       //         foreach ($fachs as $f){
       //             if($u->id == $x->userid && $x->subjectid == $f->id) {
         //               echo "(<b>$u->email</b>, $x->note, $x->meinAufwand, $f->name), ";
        //            }
       //         }

      //      }

       // }
           //    <li>ID: {{$x->id}}, Name: {{$x->name}}</li>
        $results = DB::select("select u.subjectid as id , avg(u.meinAufwand)as durchschnitt from userhassubjectsrelations u group by subjectid");
        $dNote = DB::select('select u.subjectid as id , avg(u.note)as dNote from userhassubjectsrelations u group by subjectid');


        // foreach($results as $r){
       //     echo "$r->id -- $r->durchschnitt || ";
        //}

        return view('Statistik', compact('s','users','fachs','var', 'results','dNote'));

    }
}

