function validateEnsayoAvailability() {
    var val = document.forms["exportarEnsayo"]["ensayoID"].value;
    if (val == "-1") {
        return false;
    }
    else{
        return true;
    }
}

$(document).ready(function() {
    $('#ensayoDetails').hide();
    $('#exportButton').prop('disabled', true);
});

$('#selectEnsayo').on('change', function() {
    var val = document.forms["exportarEnsayo"]["ensayoID"].value;
    if (val == "-1") {
        $('#ensayoDetails').hide();
        $('#exportButton').prop('disabled', true);
    }
    else{
        $('#ensayoDetails').show();
        $('#ensayoDetails').html("");
        $('#exportButton').prop('disabled', false);

        if (window.myConfig.ensayo.hasOwnProperty(String(val))) {
            var htmlDetalles = "";
            htmlDetalles  += '<ul class="list-group">';
            htmlDetalles  += '<li class="list-group-item list-group-item-info">Iniciado: '+window.myConfig.ensayo[String(val)].t_inicio+'</li>';
            htmlDetalles  +=  '<li class="list-group-item list-group-item-info">Finalizado: '+window.myConfig.ensayo[String(val)].t_fin+'</li>';
            htmlDetalles  +=  '<li class="list-group-item list-group-item-info">Titulo: '+window.myConfig.ensayo[String(val)].titulo+'</li>';
            htmlDetalles  +=  '<li class="list-group-item list-group-item-info">Responsable: '+window.myConfig.ensayo[String(val)].responsable+'</li>';
            htmlDetalles  +=  '<li class="list-group-item list-group-item-info">Cliente: '+window.myConfig.ensayo[String(val)].cliente+'</li>';
            htmlDetalles  +=  '<li class="list-group-item list-group-item-info">OT: '+window.myConfig.ensayo[String(val)].OT+'</li>';
            htmlDetalles  +=  '<li class="list-group-item list-group-item-info">SOT: '+window.myConfig.ensayo[String(val)].SOT+'</li>';
            htmlDetalles  +=  '<li class="list-group-item list-group-item-info">Descripción: '+window.myConfig.ensayo[String(val)].descripcion+'</li>';
            htmlDetalles  +=  '</ul>';
            $('#ensayoDetails').html(htmlDetalles);
        }
    }
});