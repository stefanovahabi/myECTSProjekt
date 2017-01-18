<?php
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/


Route::get('/register1', function () {
    return view('register1');
});

Route::get('/start', function () {
    return view('startseite');
});


Route::get('/vergessen', function () {
    return view('vergessen');
});

Route::get('/vergessen1', function () {
    return view('vergessen1');
});


Route::get('/about', function () {
    return view('about');
});

Route::get('/datenschutz', function () {
    return view('Datenschutz');
});

Route::get('/howtouse', function () {
    return view('howtouse');
});

Route::get('/impressum', function () {
    return view('impressum');
});
Route::get('/loggedin', function () {
    if (!Auth::guest() && Auth::user()->adminrolle) {
        return view('myECTS_After_Login_Admin');
    }
    if (!Auth::guest() && !Auth::user()->adminrolle) {
        return view('myECTS_After_Login');
    }
    return Redirect::to('/');
});

Route::get('/home', function () {
    return view('myECTS_Startseite');
});
/*Route::get('/konto', function(){
    $facher = App\fach::all();
    $relation = App\userhassubjectsrelation::all();

    return view('myECTSKonto', compact('facher','relation'));
});*/

Route::get('/konto', 'kontoController@start');

/*Route::get('/konto/{value}', function(){
    $facher = App\fach::all();
    $relation = App\userhassubjectsrelation::all();
    $x = value;
    return view('myECTSKonto', compact('facher','relation','x'));
});*/

Route::post('/kontoajax','kontoController@ajaxBuchen');
Route::post('/kontoajaxwert','kontoController@ajaxWertHolen');
Route::post('/getMonth','searchController@getMonth');
Route::post('/saveKalender','searchController@saveKalender');
Route::post('/createKalender','searchController@createKalender');


Route::get('/controlpanel', function(){

    if (!Auth::guest() && Auth::user()->adminrolle) {

        $s = App\hochschule::all();
        $gange = App\studiengang::all();

        //  foreach ($s as $k) {
        //     echo $k->name;
        //}
        return view('admincp', compact('s','gange'));
    }
    if (!Auth::guest() && !Auth::user()->adminrolle) {
        return Redirect::to('/loggedin');
    }
    return Redirect::to('/');
});

//Route::post('/controlpanel','Controller@insert');

Route::post('/hoch','hochschuleController@create');
Route::post('/studiengang','studiengangController@create');
Route::post('/fach','fachController@create');

/*Route::get('/veranstaltungen', function(){
    $facher = App\fach::all();
   // $relation = App\userhassubjectsrelation::all();

    return view('Veranstaltungen', compact('facher'));
});*/



Route::get('/veranstaltungen', function () {
    if(Auth::guest()){
        return Redirect::to('/');
    }
    $facher = App\fach::all();
    $rel = App\userhassubjectsrelation::all();
    $stundenplan = App\userandstundenplan::all();
    return view('Veranstaltungen', compact('facher','rel','stundenplan'));
});

Route::post('/stundenplanajax','veranstaltungController@ajax');

Route::get('/stats', 'StatsController@index');
/*Route::get('/stats', function () {
    if(Auth::guest()){
        return Redirect::to('/');
    }
    return view('Statistik');
});
*/

Route::post('/relationajax','settingsController@ajaxRelation');
Route::post('/deleterelationajax','settingsController@deleteRelation');


Route::post('/settingsajax', 'settingsController@aTest');

Route::get('/settings', 'settingsController@getHochschulen');
Route::post('/settingsajax/{x}','settingsController@getStudiengang');
Route::get('/settingsajax/{x}','settingsController@getStudiengang');
Route::get('/settingsajax/{id}/{y}','settingsController@saveStudiengang');
Route::post('/settingsajax/{id}/{y}','settingsController@saveStudiengang');

Route::get('/searchajax/{input}','SearchController@search');
Route::get('/searchhs/{input}','SearchController@searchHochschulen');
Route::get('/searchsg/{input}','SearchController@searchStudiengang');
Route::get('/searchfa/{input}','SearchController@searchFach');



/*Route::get('/konto', function () {
    if(Auth::guest()){
        return Redirect::to('/');
    }
    return view('myECTSKonto');
});*/




Route::get('/test', function(){
    return view('test');
});

Route::get('/homeadmin', function () {
    return view('myECTS_AFter_Login_Admin');
});

Route::get('admin', function () {
    echo 'ADMIN';
})->middleware('isAdmin');




Route::get('/stoppuhr', function () {
    if(Auth::guest()){
        return Redirect::to('/');
    }
    $meineFacher = App\userhassubjectsrelation::all();
    $facher = App\fach::all();

    return view('Stoppuhr', compact('meineFacher','facher'));
});

Route::get('/support', function () {
    return view('support');
});


Route::get('/', function () {
    if(!Auth::guest()){
        return Redirect::to('/loggedin');
    }
    return view('myECTS_Startseite');
});


Auth::routes();

Route::get('/home', 'HomeController@index');
