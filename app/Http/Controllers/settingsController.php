<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
use \Auth;
use Input;
use Redirect;
use DB;
class settingsController extends Controller
{

    public function deleteRelation(Request $request){


        $user = $request->input('user');
        $facher = $request->input('facher');
        $note = $request->input('note');


        $rel = App\userhassubjectsrelation::all();
        foreach ($rel as $r){
            if($r->userid == $user && $r->subjectid == $facher){

                $r->userid = NULL;
                $r->note = $note;
                //$rel = $r;
                $r->save();
            }
        }

        return "saved!";



    }




    public function ajaxRelation(Request $request){


        $user = $request->input('user');
        $facher = $request->input('facher');

        $string ="";

        /*foreach ($facher as $f){
            $rel = new App\userhassubjectsrelation;
            $rel->userid=$user;
            $rel->subjectid=$f;
            $rel->save();
            //$string = $string . "/" . $f;
        }*/
        $max = sizeof($facher);
        for ($i = 0; $i < $max; $i++) {
            $rel = new App\userhassubjectsrelation;
            $rel->userid=$user;
            $rel->subjectid=$facher[$i];
            $rel->save();
           // $string = $string . "," . $facher[$i];
        }
        return "saved!";

       // return $string;
       /* $results = App\userhassubjectsrelation::all()->where('userid', $user);



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
        }*/
        // $rel = App\userhassubjectsrelation::all()->where('userid', $user);

        //$rel->meinAufwand+=$value;

        //$rel->save();

    }


    public function getHochschulen()
    {
        $hochschulen = App\hochschule::all();
        $relation = App\studiengangfachrelation::all();
        $userHas = App\userhassubjectsrelation::all();
        $userHatNicht = DB::select("select u.subjectid as id from userhassubjectsrelations u where u.subjectid NOT IN (select x.subjectid as nr from userhassubjectsrelations x)");
        $st = DB::select("SELECT f.id FROM faches f, studiengangfachrelations s, users u WHERE  f.id = s.fach AND s.studiengang = u.studiengang AND u.id = ".Auth::user()->id." AND f.id NOT IN (SELECT uhs.subjectid FROM  userhassubjectsrelations uhs WHERE uhs.userid =".Auth::user()->id.")");
        $facher = App\fach::all();
        /*   foreach ($hochschulen as $h){
               echo "$h->name";
           }*/

        return view('settings', compact('hochschulen', 'relation', 'facher','userHas','st'));

    }

    public function getStudiengang($x)
    {
        $studiengang = App\studiengang::all()->where('hochschule', $x);
        echo "Die Hochschule bietet folgende Studiengänge an: <br><select>";
        echo "<option selected disabled hidden style='display: none' value=''>--wähle Studiengang aus--</option>";
        foreach ($studiengang as $s) {
            echo "<option onclick='saveStudi($s->id)'><b>$s->id, $s->name</b></option>";
        }
        echo "</select>";
       // echo "<br>USERID: $y";


    }

    public function saveStudiengang($id, $y)
    {


        //$user = App\user::all()->where('id',$y);
        $user = App\user::find($y);
        $user->studiengang = $id;
        $user->save();

        // echo "all saved";
    }

    public function aTest(Request $request){
        $uid = $request->input('userid');
        $sid = $request->input('studienid');


        $user = App\user::find($uid);
        $user->studiengang = $sid;
        $user->save();
        DB::table('userhassubjectsrelations')->where('userid', '=', $uid)->delete();
        DB::table('userandstundenplans')->where('userid', '=', $uid)->delete();



        return Redirect::to('/settings');

    }


}
