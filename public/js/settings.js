/**
 * Created by Stefano on 09.01.2017.
 */
var user;
$(document).ready(function(){

    $('#divhs').hide();

    $('#divfacher').hide();
    $('#divAbmelden').hide();



});
function getStudiengang(hochschulID, id){
//alert(hochschulID);
user = id;

    $('#result').html($('#result').load("http://localhost:8000/settingsajax/"+hochschulID));
}

function saveStudi(id){

    $( "#form" ).attr( "action", "/settingsajax" );
    //$("#result").html("<label>Hochschule<input id='hs' type='text' name='hochschule'></label><br><input id='sub' type='submit' name='sub' value='Send to DB!'>");
    $("#result2").html("<input type='hidden' name='userid' value="+user+"><input type='hidden' name='studienid' value="+id+"><input id='sub1' type='submit' name='sub' value='Send to DB!'></form>");
   // alert("User hat nun Studiengang " + id + " gespeichert.");

}


function loadData(){
    $.ajax({
        url: "http://localhost:8000/settingsajax",
        success: function(result) {
            alert("in success");
            $("#result").html("TESTTESTTESTTTEST");
        },
        error: function(a, b, c){
            alert("in error");
        }
    });
}

function displayHS(){

    $('#divhs').show();
    $('#divfacher').hide();
    $('#result').show();
    $('#result2').show();
    $('#divAbmelden').hide();



}
function displayFacher(){

    $('#divfacher').show();
    $('#divhs').hide();
    $('#result').hide();
    $('#result2').hide();
    $('#divAbmelden').hide();



}

function displayAbmelden(){

    $('#divfacher').hide();
    $('#divhs').hide();
    $('#result').hide();
    $('#result2').hide();
    $('#divAbmelden').show();



}

function activateKalender(id){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('#result').load('http://localhost:8000/createKalender', {facher: $('#selection1').val(), user: id} ,function(result) {
        $('#result').html(result);
    });
    $('#activate').hide();
}

function saveRelation(id){

       // alert($('#selection1').val());
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        if(typeof($('#selection1').val()) !== "undefined" && $('#selection1').val() !== null && $('#selection1').val() !== "" && $('#selection1').val().length >= 1) {


            $('#result').load('http://localhost:8000/relationajax', {
                facher: $('#selection1').val(),
                user: id
            }, function (result) {
                alert("saved");
                //$('#divfacher').html(result);
            });
        }else{
            alert("fehlerhafte eingabe");
            return;
        }
        /*alert(($("#ergebnis").load("http://localhost:8000/kontoajax", {
         zeit: $("#zeitbuchen").val()
         })).value);*/




}

function abmeldenRelation(id){

    // alert($('#selection1').val());
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    if(typeof($('#selectionAb').val()) !== "undefined" && $('#selectionAb').val() !== null && $('#selectionAb').val() !== "" && $('#selectionAb').val().length >= 1 && $('#note').val().length >= 1) {


        $('#result').load('http://localhost:8000/deleterelationajax', {
            facher: $('#selectionAb').val(),
            note:$('#note').val(),
            user: id
        }, function (result) {
            alert("saved");
            //$('#divfacher').html(result);
        });
    }else{
        alert("fehlerhafte eingabe");
        return;
    }
    /*alert(($("#ergebnis").load("http://localhost:8000/kontoajax", {
     zeit: $("#zeitbuchen").val()
     })).value);*/




}

