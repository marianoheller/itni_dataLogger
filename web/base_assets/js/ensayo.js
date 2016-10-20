/*************************************************************************
 * Variables
 */

var set_delay = 10000;

var t_inicio_unix = moment(window.myConfig.t_inicio).unix();

var timeFormat = 'HH:mm:ss';

var gaugeMaxTemp = 1200;
var gaugeMinTemp = 0;

var options = {
    //Dimensions
    width: 1200,
    height: 500,

    //dygraphs
    labels: [ "Fecha", "Medicion", "Patrón" ],
    rollPeriod: 1,
    showRoller: false,
    fillGraph: true
};


/***************************************************
 * Funciones
 */

function randomInt() {
    return Math.round(Math.random() * 10);
}

function counterTimestamp() {
    if ( typeof counterTimestamp.counter == 'undefined' ) {
        // It has not... perform the initialization
        counterTimestamp.counter = randomInt();
    }
    else {
        counterTimestamp.counter += randomInt();
    }
    return counterTimestamp.counter;
}

function randomScalingFactor() {
    return Math.round(Math.random() * 100 * (Math.random() > 0.5 ? -1 : 1));
}

function randomColorFactor() {
    return Math.round(Math.random() * 255);
}

function randomColor(opacity) {
    return 'rgba(' + randomColorFactor() + ',' + randomColorFactor() + ',' + randomColorFactor() + ',' + (opacity || '.3') + ')';
}

function newDate(days) {
    return moment().add(days, 'd').toDate();
}

function newDateString(days) {
    return moment().add(days, 'd').format(timeFormat);
}

function newTimestamp(days) {
    return moment().add(days, 'd').unix();
}

function convertDate(inputFormat) {
    function pad(s) { return (s < 10) ? '0' + s : s; }
    var d = new Date(inputFormat);
    var date =  [d.getFullYear(), pad(d.getMonth()+1),pad(d.getDate()) ].join('-');
    var time = [pad(d.getHours()), pad(d.getMinutes()), pad(d.getSeconds())].join(':');
    return  [date,time].join(" ");
}

function toTimeString( secs ) {
    var days, hours, minutes, seconds;

    if( secs == null )
        return "";

    days = ( secs / 86400 ) >> 0;
    hours = ( secs % 86400 / 3600 ) >> 0;
    minutes = ( secs % 3600 / 60 ) >> 0;
    seconds = ( secs % 60 );
    seconds = seconds < 10 ? "0" + seconds : seconds;
    minutes = minutes < 10 ? "0" + minutes : minutes;
    hours = hours && hours < 10 ? "0" + hours : hours;

    return "" + ( days ? days+" - " : "" ) + ( hours ? hours+":" : "" ) + minutes + ":" + seconds;
}


function cancelarEnsayo() {
    $.ajax({
            //url: '/ensayo/cancel/all',
            url: window.myConfig.url_cancelEnsayo,
            type:'POST',
            contentType: "application/json; charset=utf-8",
            //data: jsonToSend,
            dataType: 'json'
        })
        .done(function (results) {
            window.location.replace("/");
        })
        .fail(function (jqXHR, textStatus, errorThrown) {
            $('#alert-finalize-fail').removeClass('hidden');
        });
}

function drawChart() {
    for ( var i=1 ; i<=32 ; i++) {

        //Canales originales
        window["dataTable_"+i] = [];
        window["chart_"+i] = new Dygraph(
            document.getElementById("chart_div_"+i),
            window["dataTable_"+i],
            options
        );
    }


    var auxSize = window.myConfig.canalesVirtuales["length"];
    for ( var i=1 ; i<=auxSize ; i++) {
        //Canales virtuales
        window["dataTable_v_"+i] = [];
        window["chart_v_"+i] = new Dygraph(
            document.getElementById("chart_div_v_"+i),
            window["dataTable_v_"+i],
            options
        );
    }

    /*console.log("Log canales virtuales:");
    console.log(window.myConfig.canalesVirtuales);*/


    getGraphData();
}


function getGraphData() {
    var lastTimeStampLocal = "";
    //var len = window.dataTable_1.getNumberOfRows();
    var len = window.dataTable_1.length;
    if ( len == 0 ) {
        lastTimeStampLocal = window.myConfig.t_inicio;
    }
    else {
        //lastTimeStampLocal = window.dataTable_1.getValue(len-1, 0); //get last fecha
        lastTimeStampLocal = window.dataTable_1[len-1][0];//get last fecha

        var momentAux = moment(lastTimeStampLocal);
        var momentAuxInicio = moment.unix(t_inicio_unix);
        momentAux.add(momentAuxInicio.seconds(),"seconds");
        momentAux.add(momentAuxInicio.minutes(),"minutes");
        momentAux.add(momentAuxInicio.hours(),"hours");
        lastTimeStampLocal = momentAux.format("YYYY-MM-DD HH:mm:ss");

        //lastTimeStampLocal = moment(lastTimeStampLocal).format("YYYY-MM-DD HH:mm:ss");
    }

    var timetampsToSend = '{ "graphData": { ' +
        '"lastTimeStamp": "'+ lastTimeStampLocal +
        '", "firstTimeStamp": "'+ t_inicio_unix +
        '", "curvaID": "'+ window.myConfig.patron_id +
        '", "cantCanalesVirtuales": "'+ window.myConfig.canalesVirtuales["length"] +
        '", "canalesVirtuales": [ ';
        for( var i=1 ; i<= window.myConfig.canalesVirtuales["length"] ; i++ ) {
            timetampsToSend += '{ "id": "' + i + '",  "sensores": [' ;


            window.myConfig.canalesVirtuales[String(i)]["sensores"].forEach(function(val, idx, array) {
                timetampsToSend += '"'+String(val)+'"';
                if (idx != array.length - 1){
                    timetampsToSend += ',';
                }
                else {
                    timetampsToSend += ']}';
                }
            });
            if ( i != window.myConfig.canalesVirtuales["length"]) {
                timetampsToSend += ',';
            }
            else {
                timetampsToSend += ']';
            }
        }
    timetampsToSend += '}}';

    var jsonToSend = JSON.stringify(JSON.parse(timetampsToSend));
    console.log("Sending data: ",jsonToSend);


    var jsonData = $.ajax({
            //url: '/getGraphData',
            url: window.myConfig.url_getGraphData,
            type:'POST',
            contentType: "application/json; charset=utf-8",
            data: jsonToSend,
            dataType: 'json'
        })
        .done(function (results) {
            console.log("RX: ",results);

            //Parse RX packets
            var rxObj = {};
            for ( var j=1 ; j<=32 ; j++) {
                // Split timestamp and data into separate arrays
                rxObj["labels_"+j] = [];
                rxObj["data_"+j] = [];
                rxObj["patron_"+j] = [];
                if ( ( ("packets_"+j) in results) ) {
                    Object.keys(results["packets_"+j]).forEach(function (key) {
                        var value = results["packets_"+j][key];
                        rxObj["labels_"+j].push(value.timestamp);
                        rxObj["data_"+j].push(parseFloat(value.payloadString));
                        rxObj["patron_"+j].push(parseFloat(value.curvaPatron));;
                    });
                }
            }
            //Parse RX packets de canales virtuales
            for ( var j=1 ; j<=window.myConfig.canalesVirtuales["length"] ; j++) {
                // Split timestamp and data into separate arrays
                rxObj["labels_v_"+j] = [];
                rxObj["data_v_"+j] = [];
                rxObj["patron_v_"+j] = [];
                if ( ( ("packets_v_"+j) in results) ) {
                    Object.keys(results["packets_v_"+j]).forEach(function (key) {
                        var value = results["packets_v_"+j][key];
                        rxObj["labels_v_"+j].push(value.timestamp);
                        rxObj["data_v_"+j].push(parseFloat(value.payloadString));
                        rxObj["patron_v_"+j].push(parseFloat(value.curvaPatron));;
                    });
                }
            }

            //Add data to datatable original
            for ( var j=1 ; j<=32 ; j++) {
                for (var i=0 ; i< rxObj["data_"+j].length ; i++) {

                    var momentAux = moment.unix(rxObj["labels_"+j][i]);
                    var momentAuxInicio = moment.unix(t_inicio_unix);
                    momentAux.subtract(momentAuxInicio.seconds(),"seconds");
                    momentAux.subtract(momentAuxInicio.minutes(),"minutes");
                    momentAux.subtract(momentAuxInicio.hours(),"hours");
                    var myDate = momentAux.toDate();

                    var arrayData = [ myDate,  rxObj["data_"+j][i], rxObj["patron_"+j][i]];
                    window["dataTable_"+j].push(arrayData);
                }
                //Refresh gauge
                var gaugeValue = rxObj["data_"+j][rxObj["data_"+j].length-1];
                window["gauge_"+j].refresh(gaugeValue);
                var gaugePatronValue = rxObj["patron_"+j][rxObj["patron_"+j].length-1];
                window["gauge_p_"+j].refresh(gaugePatronValue);
            }

            //Add data to datatable virtual
            for ( var j=1 ; j<=window.myConfig.canalesVirtuales["length"] ; j++) {
                for (var i=0 ; i< rxObj["data_v_"+j].length ; i++) {

                    var momentAux = moment.unix(rxObj["labels_v_"+j][i]);
                    var momentAuxInicio = moment.unix(t_inicio_unix);
                    momentAux.subtract(momentAuxInicio.seconds(),"seconds");
                    momentAux.subtract(momentAuxInicio.minutes(),"minutes");
                    momentAux.subtract(momentAuxInicio.hours(),"hours");
                    var myDate = momentAux.toDate();

                    var arrayData = [ myDate,  rxObj["data_v_"+j][i], rxObj["patron_v_"+j][i]];
                    window["dataTable_v_"+j].push(arrayData);
                }
                //Refresh gauge
                var gaugeValue = rxObj["data_v_"+j][rxObj["data_v_"+j].length-1];
                window["gauge_v_"+j].refresh(gaugeValue);
                var gaugePatronValue = rxObj["patron_v_"+j][rxObj["patron_v_"+j].length-1];
                window["gauge_v_p_"+j].refresh(gaugePatronValue);

            }


            //REDRAW
            for ( var j=1 ; j<=32 ; j++) {
                window["chart_"+j].updateOptions( { 'file': window["dataTable_"+j] } );
            }
            for ( var j=1 ; j<=window.myConfig.canalesVirtuales["length"] ; j++) {
                window["chart_v_"+j].updateOptions( { 'file': window["dataTable_v_"+j] } );
            }


            var lenAux = 0;
            for ( var j=1 ; j<=32 ; j++) {
                if (window["dataTable_"+j].length > lenAux) {
                    lenAux = window["dataTable_"+j].length;
                }
            }

            if ( lenAux > 0 ) {
                updateStatusInfo();
            }

        })
        .fail(function (jqXHR, textStatus, errorThrown) {
            //SI TIRA NOT FOUND PUEDE SER XQ NO HAY REGISTROS CON ESE TIMESTAMP
            if ( errorThrown == "Not Found") {
                console.log("Esperando datos...");
            }
            else {
                console.log(window.myConfig.url_getGraphData);
                console.log("Status: "+textStatus);
                console.log("Error thrown: "+errorThrown);
                console.log("--------------");
            }

        })
        .always(function () {
            setTimeout(getGraphData, set_delay);
        });
}



function updateStatusInfo(  )  {
    var trHTML = '';

    for ( var j=1 ; j<=32 ; j++) {
        var lenAux = window["dataTable_"+j].length;
        var lastLabel = window["dataTable_"+j][lenAux-1][0];
        var medicion = window["dataTable_"+j][lenAux-1][1];
        //get fecha
        trHTML += "<tr ";
        if (medicion < 30) {
            trHTML += "class='table-info'";
        }
        else if (medicion > 900) {
            trHTML += "class='table-danger'";
        }
        else if (medicion > 500) {
            trHTML += "class='table-warning'";
        }

        trHTML +=">";
        trHTML +="<td>";
        trHTML += j;
        trHTML +="</td>";
        trHTML +="<td>";
        trHTML += medicion;
        trHTML +="</td>";
        trHTML +="<td>";
        trHTML += moment(lastLabel).format("YYYY-MM-DD HH:mm:ss");
        trHTML +="</td>";
        trHTML +="</tr>";
    }
    var dataStatusSensores = $('#dataStatusSensores');
    dataStatusSensores.empty();
    dataStatusSensores.append(trHTML);
}




/**************************************************************
 * Do stuff
 */

/*google.load("visualization", "1", {packages:["corechart"]});
google.setOnLoadCallback(drawChart);*/



$('a[data-toggle="pill"]').on('shown.bs.tab', function (e) {
    /*var target = $(e.target).attr("id");
     var targetString = "Chart_"+target;*/
    $(window).trigger('resize');
    window.dispatchEvent(new Event('resize'));
    //console.log("resize Triggered");
    window.scrollTo(0, 0); //Scroll to top
});




$(document).ready(function(){

    $('.nav').on('show.bs.tab', function (e) {
        $('.nav li .active').removeClass('active');
    });

    document.getElementById('link-tab-status').click();

    for ( var i=1 ; i<=32 ; i++) {
        window["gauge_"+i] = new JustGage({
            id: "gauge_"+i,
            value: 0,
            min: gaugeMinTemp,
            max: gaugeMaxTemp,
            decimals: 1,
            title: "Temp. actual"
        });

        window["gauge_p_"+i] = new JustGage({
            id: "gauge_p_"+i,
            value: 0,
            min: gaugeMinTemp,
            max: gaugeMaxTemp,
            decimals: 1,
            title: "Patrón"
        });
    }

    var auxSize = window.myConfig.canalesVirtuales["length"];
    for ( var i=1 ; i<=auxSize ; i++) {
        window["gauge_v_"+i] = new JustGage({
            id: "gauge_v_"+i,
            value: 0,
            min: gaugeMinTemp,
            max: gaugeMaxTemp,
            decimals: 1,
            title: "Temp. actual"
        });

        window["gauge_v_p_"+i] = new JustGage({
            id: "gauge_v_p_"+i,
            value: 0,
            min: gaugeMinTemp,
            max: gaugeMaxTemp,
            decimals: 1,
            title: "Patrón"
        });
    }


    drawChart();


});


var dots = window.setInterval( function() {
    var wait = document.getElementById("wait");
    if (wait != null) {
        if ( wait.innerHTML.length > 3 )
            wait.innerHTML = "";
        else
            wait.innerHTML += ".";
    }
}, 1000);

