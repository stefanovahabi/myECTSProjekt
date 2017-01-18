/**
 * Created by Stefano on 13.01.2017.
 */
var lauf=0;
var string="x"+lauf;
/*
$(document).ready(function(){
    $('td').click(function(){
        alert($(this).attr('id'));
    });
    $('div').click(function(){
        alert($(this).attr('id'));
    });
});*/

function deleteClick(x){
    //alert($(x).parent().attr('id'));
    if($(x).parent().attr('id') != "div2"){

        $(x).remove();
    }
    return;
}



function allowDrop(ev) {
    ev.preventDefault();
}

function drag(ev) {
    ev.dataTransfer.setData("text", ev.target.id);

}

function drop(ev) {
    ev.preventDefault();
    var data = ev.dataTransfer.getData("text");

    var parentTag = $("#"+data).parent().get( 0 ).tagName;
    //alert("PARENTTAG="+parentTag);
    //alert("Childsize von evtarget ist="+$("#"+ev.target.id).children().size())

    if(ev.target.tagName == "DIV"){ //wenn schon eins drinnen ist
        //alert("ZielID="+ev.target.parent().id+ "meineID="+ev.id);
        return;
    }
    $('#'+ev.target.id).children().remove();
    ev.target.appendChild(document.getElementById(data));
    var newparentTag = $("#"+data).parent().get( 0 ).tagName;
   // alert(ev.target.id+ " hat nun " + data + " bekommen.");

    /*if(newparentTag == "DIV"){
     $("#"+data).remove();
     }*/
    //alert("PARENTTAG="+newparentTag);
    //  alert("Chilsize vom parent von evtargetist ="+$("#"+ev.target.id).parent().children().size());

    //alert(parentTag);
    var vaterid = $("#"+data).parent().attr('id');
    var ichid = $("#"+data).attr('id');

    //alert("vaterid="+vaterid +" sohnid = "+ichid);
    //$("#"+vaterid).data('anzahl',1);
    //alert("VATER id="+vaterid+" DATA="+data);
    //alert("EVTARGET="+ev.target.id);
    //alert("VATERID CHILDEN SIZE="+$("#"+vaterid).children().size());

    if(parentTag != "TD"){ //wenns vom auswahlfenster in die tabelle kommt
        //	alert("IS UNGLEICH");

        $("#div2").prepend("<div id='" + string + "' draggable='true' ondragstart='drag(event)' ondblclick='deleteClick(this)'>" +  document.getElementById(data).innerHTML  + "</div>")
        //alert("Objekt "+document.getElementById(data).id+" wurde platziert.");
        lauf++;
        string="x"+lauf;
    }


}

function hallo(x){
    alert(x.value);
}

function ajaxStundenplan(){

    /*$.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('#result').load('http://localhost:8000/stundenplanajax', {facher: $('#selection1').val(), user: id} ,function(result) {
        //$('#divfacher').html(result);
    });*/
    var nutzerid = $('#versteckt').val();
    var ausgabe = "";
    var felder = new Array();
    for(var i = 0; i < 48; i++){
        //if($('#td'+(i+1)).children("div").html())

        felder[i] = $('#td'+(i+1)).children("div").html();
       // alert("felder["+i+"] = "+ felder[i])
        //alert(felder[i]);
       // var nameValue = $('#td'+i+' > div').attr('name');
        ausgabe = ausgabe+felder[i]+", ";
    }
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('#result').load('http://localhost:8000/stundenplanajax', {felder: felder, user: nutzerid} ,function(result) {
        $('#result').html(result);
    });
    //$('#result').html(ausgabe);

}