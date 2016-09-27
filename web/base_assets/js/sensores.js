/***
 *
 * Variables
 */

var set_delay = 60000;


/**
 * Funciones
 *
 */


function toggleTimerById( myId ) {
    var element = document.getElementById(myId);
    if ( element.disabled == true ) {
        element.disabled = false;
    }
    else {
        element.disabled = true;
    }
}

function refreshButtonClicked() {
    toggleTimerById("refreshButton");

    $.ajax({
            //url : '/getSensoresStatus',
            url : window.myConfig.url_getSensoresStatus,
            type: 'POST'
        })
        .done(function (response) {
            console.log("RX: ",response);
            var result = [];
            for(var i in response) {
                result.push([i, response [i]]);
            }
            var dataObject = $.parseJSON(result[0][1]);
            var dataArraytoDraw = [];
            var trHTML = '';
            $.each(dataObject, function (i,v) {
                dataArraytoDraw.push(v);    //Obsolete
                trHTML += "<tr>";
                trHTML +="<td>";
                trHTML += v["sensor_id"];
                trHTML +="</td>";
                trHTML +="<td>";
                trHTML += v["medicion"];
                trHTML +="</td>";
                trHTML +="<td>";
                trHTML += v["fecha"];
                trHTML +="</td>";
                /*trHTML +="<td>";
                 trHTML += "NO ALIAS";
                 trHTML +="</td>";*/
                trHTML +="</tr>";
            });
            $('#dataStatusSensores').empty();
            $('#dataStatusSensores').append(trHTML);
            toggleTimerById("refreshButton");
        })
        .fail(function (jqXHR, textStatus, errorThrown) {
            console.log("Failed AJAX request.");
            console.log("Status: "+textStatus);
            console.log("Error thrown: "+errorThrown);
        });
}


getDataFromServer = function () {
    $.ajax({
            //url : '/getSensoresStatus',
            url : window.myConfig.url_getSensoresStatus,
            type: 'POST'
        })
        .done(function (response) {
            console.log("RX: ",response);
            var result = [];
            for(var i in response) {
                result.push([i, response [i]]);
            }
            var dataObject = $.parseJSON(result[0][1]);
            var dataArraytoDraw = [];
            var trHTML = '';
            $.each(dataObject, function (i,v) {
                dataArraytoDraw.push(v);    //Obsolete
                trHTML += "<tr>";
                trHTML +="<td>";
                trHTML += v["sensor_id"];
                trHTML +="</td>";
                trHTML +="<td>";
                trHTML += v["medicion"];
                trHTML +="</td>";
                trHTML +="<td>";
                trHTML += v["fecha"];
                trHTML +="</td>";
                /*trHTML +="<td>";
                 trHTML += "NO ALIAS";
                 trHTML +="</td>";*/
                trHTML +="</tr>";
            });
            $('#dataStatusSensores').empty();
            $('#dataStatusSensores').append(trHTML);
        })
        .fail(function (jqXHR, textStatus, errorThrown) {
            console.log("Failed AJAX request.");
            console.log("Status: "+textStatus);
            console.log("Error thrown: "+errorThrown);
        })
        .always(function () {
            setTimeout(getDataFromServer, set_delay);
        });
};

/*******
 * DO STUFF
 */

$(document).ready(function() {
    getDataFromServer();
});


