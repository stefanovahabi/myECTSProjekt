/**
 * Created by Stefano on 12.01.2017.
 */
var wirdAngezeigt = false;
var globalECTS;
function ajaxKonto() {
    if (typeof($('#selection').val()) !== "undefined" && $('#selection').val() !== null && $('#selection').val() !== "" && $('#selection').val().length >= 1 && $('#zeitbuchen').val().length >= 1) {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('#ergebnis').load('http://localhost:8000/kontoajax', {
            zeit: $("#zeitbuchen").val(),
            user: $("#user").val(),
            fach: $("#selection").val()
        }, function (result) {
            $('#ergebnis').html(result + " [min] " + Math.round((result / 60) * 100) / 100 + " [h]");
        });
        /*alert(($("#ergebnis").load("http://localhost:8000/kontoajax", {
         zeit: $("#zeitbuchen").val()
         })).value);*/
        gibWert(globalECTS);

    }else{
        alert("Fach wurde nicht ausgewählt oder es befindet sich kein gültiger Wert im Inputfeld!");
        return;
    }
}

function gibWert(ects){
    globalECTS=ects;
    //$('#chart').remove();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    if(!wirdAngezeigt) {


        $('#ergebnis').load('http://localhost:8000/kontoajaxwert', {
            user: $("#user").val(),
            fach: $("#selection").val()
        }, function (result) {
            $('#ergebnis').html(result+" [min] " + Math.round((result/60) * 100) / 100 + " [h]");
            $('#wertDrinnen').attr('value', result);

            Morris.Bar({

                element: 'chart',
                data: [
                    {date: 'mein Aufwand', value: Math.round(($('#wertDrinnen').attr('value')/60)*100)/100},
                    {date: 'Aufwand laut ECTS', value: ects*30}
                ],
                xkey: 'date',
                ykeys: ['value'],
                labels: ['Stunden [h]']
            });
        });
        //var wert = $('#wertDrinnen').attr('value');


        wirdAngezeigt = true;
    }else{
        $('#chart').remove();
        $('#superchart').append("<div id='chart' style='height: 250px;'></div>");
        //$('#chart').remove();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('#ergebnis').load('http://localhost:8000/kontoajaxwert', {
            user: $("#user").val(),
            fach: $("#selection").val()
        }, function (result) {
            $('#ergebnis').html(result+" [min] " + Math.round((result/60) * 100) / 100 + " [h]");
            $('#wertDrinnen').attr('value', result);

            Morris.Bar({

                element: 'chart',
                data: [
                    {date: 'mein Aufwand', value: Math.round(($('#wertDrinnen').attr('value')/60)*100)/100},
                    {date: 'Aufwand laut ECTS', value: ects*30}
                ],
                xkey: 'date',
                ykeys: ['value'],
                labels: ['Stunden [h]']
            });
        });
        //var wert = $('#wertDrinnen').attr('value');


    }

}





