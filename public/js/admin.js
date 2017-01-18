/**
 * Created by Stefano on 06.01.2017.
 */
var hochschuleClicked=false;
var studiengangClicked=false;
var fachClicked=false;
var searchClicked=false;


$('#selection').hide();
$('#result3').hide();
$('#selectionZuordnung').hide();




function hochschule(){
    if(!hochschuleClicked) {

        $('#hochschule').css({backgroundColor: '#8181F7'});
        $('#studiengang').css({backgroundColor: ''});
        $('#search').css({backgroundColor: ''});

        $('#fach').css({backgroundColor: ''});
        $( "#form" ).attr( "action", "/hoch" );
        $("#result").html("<input id='hs' type='text' name='hochschule' placeholder='Name der Hochschule' required><br><input id='sub' type='submit' name='sub' value='Send to DB!'>");
        $('#alleSchulen').hide();
        $('#selection').hide();
        $('#labelA').hide();
        $('#result3').show();
        $('#result').show();
        $('#selectionZuordnung').hide();


        $("#result3").html("<input id='search1' type='search' name='search1' placeholder='Suche Hochschule' onkeyup='suchhs(this)'>");


    }
    hochschuleClicked=true;
    studiengangClicked=false;
    fachClicked=false;
    searchClicked=false;
}

function checkSelect(){
    var e = document.getElementById("selection");
    if(e.options[e.selectedIndex].value.length < 1){
        alert("Hochschule angeben!");
    }else{
        $('#sub1').attr('type','submit');
        document.getElementById("form").submit();

    }
}
function checkMultiselect(){
    var e = document.getElementById("selectionZuordnung");
    if(e.options[e.selectedIndex].value.length < 1){
        alert("Hochschule angeben!");
    }else{
        $('#sub').attr('type','submit');
        document.getElementById("form").submit();

    }
}

function studiengang(){

    if(!studiengangClicked) {

        $('#studiengang').css({backgroundColor: '#8181F7'});
        $('#hochschule').css({backgroundColor: ''});
        $('#fach').css({backgroundColor: ''});
        $('#search').css({backgroundColor: ''});



        $( "#form" ).attr( "action", "/studiengang" );
        //$("#result").html("<label>Hochschule<input id='hs' type='text' name='hochschule'></label><br><input id='sub' type='submit' name='sub' value='Send to DB!'>");
        $("#result").html("<input id='ku' type='text' name='kuerzel' placeholder='Kürzel'required>" +
            "<br><input id='na' type='text' name='name' placeholder='Name' required>" +
            //"<br><label>Hochschul-ID<input id='hs' type='text' name='hochschulid'></label>"+
            //"<br><label>Hochschul-ID</label><select></select><input id='hs' type='text' name='hochschulid'>"+

            "<br><input id='sub1' type='button' name='sub' value='Send to DB!' onclick='checkSelect()'></form>");
        //$('#alleSchulen').html("<ol>Hochschul-IDs<li>HTWG KN</li> <li>Uni KN</li></ol>");
        $('#alleSchulen').show();
        $('#selection').show();
        $('#labelA').show();
        $('#selectionZuordnung').hide();
        $("#result3").html("<input id='search1' type='search' name='search1' placeholder='Suche Studiengang' onkeyup='suchsg(this)'>");

        $('#result3').show();
        $('#result').show();





    }
    studiengangClicked=true;
    hochschuleClicked=false;
    fachClicked=false;
    searchClicked=false;
}

function fach(){

    if(!fachClicked) {

        $('#fach').css({backgroundColor: '#8181F7'});
        $('#studiengang').css({backgroundColor: ''});
        $('#hochschule').css({backgroundColor: ''});
        $('#search').css({backgroundColor: ''});

        $( "#form" ).attr( "action", "/fach" );

        $("#result").html("<input id='hs' type='text' name='kuerzel' placeholder='Kürzel' required>" +
            "<br><input id='na' type='text' name='name' placeholder='Name' required>"+
            "<br><input id='sws' type='number' name='sws' placeholder='SWS' required>"+
            "<br><input id='ects' type='number' placeholder='ECTS' name='ects' required>"+
            "<br><input id='prof' type='text' name='prof' placeholder='Dozent' required>"+
            "<br><input id='sub' type='button' name='sub' value='Send to DB!' onclick='checkMultiselect()'>");
        $('#alleSchulen').hide();
        $('#selection').hide();
        $('#labelA').hide();
        $("#result3").html("<input id='search1' type='search' name='search1' placeholder='Suche Fach' onkeyup='suchfa(this)'>");

        $('#result3').show();
        $('#result').show();
        $('#selectionZuordnung').show();




    }
    fachClicked=true;
    hochschuleClicked=false;
    studiengangClicked=false;
    searchClicked=false;
}


function search(){
    if(!searchClicked) {
        $('#search').css({backgroundColor: '#8181F7'});
        $('#hochschule').css({backgroundColor: ''});
        $('#studiengang').css({backgroundColor: ''});
        $('#fach').css({backgroundColor: ''});
        $( "#form" ).attr( "action", "/hoch" );
        $("#result3").html("<input id='search1' type='search' name='search1' placeholder='Suche User-EMail' onkeyup='such(this)'>");
        $('#alleSchulen').hide();
        $('#selection').hide();
        $('#labelA').hide();
        $('#result').show();
        $('#selectionZuordnung').hide();

        $('#result').hide();


    }
    searchClicked=true;
    hochschuleClicked=false;
    studiengangClicked=false;
    fachClicked=false;
}

function such(x){
    //alert(x.value);
    $("#result4").html($("#result4").load("http://localhost:8000/searchajax/"+x.value));
   // alert("ww");
}

function suchhs(x){
    //alert(x.value);
    $("#result4").html($("#result4").load("http://localhost:8000/searchhs/"+x.value));
    // alert("ww");
}

function suchsg(x){
    //alert(x.value);
    $("#result4").html($("#result4").load("http://localhost:8000/searchsg/"+x.value));
    // alert("ww");
}
function suchfa(x){
    //alert(x.value);
    $("#result4").html($("#result4").load("http://localhost:8000/searchfa/"+x.value));
    // alert("ww");
}

