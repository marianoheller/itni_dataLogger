$(document).ready(function() {

    if (window.myConfig.flagEnsayoRunning == "True") {

        $('#modalEnsayoRunning').modal({
            backdrop: 'static',
            keyboard: false
        })
        $('#modalEnsayoRunning').modal('show');
        $('#alertFailedCancel').hide();
        document.getElementById("buttonComenzarEnsayo").disabled = true;
    }


    $( "#form" ).keypress(function(e) {
        if ( e.which == 13 ) {
            e.preventDefault();
        }
    });

    var next = 1;
    $(".add-more").click(function(e){
        e.preventDefault();
        var addto = "#field" + next;
        var addRemove = "#field" + (next);
        next = next + 1;
        var idNewIn = "field"+next;
        var newIn = '<div class="input-group p-b-1"><input autocomplete="off" class="input form-control canal-virtual-formula" id="' + idNewIn + '" name="field' + next + '" type="text" placeholder="Ingrese sensores a promediar"></div>';
        var newInput = $(newIn);
        var removeBtn = '<span class="input-group-btn"><button id="remove' + (next - 1) + '" class="btn btn-danger remove-me" >-</button></span>';
        var removeButton = $(removeBtn);

        //Agregar nuevo renglon abajo
        $(addto).parent().after(newInput);
        //Muevo boton DESPUES del nuevo renglon
        var buttonGroup = $(".add-more").parent();
        jQuery(buttonGroup).detach().insertAfter("#"+idNewIn+"");
        //Agrego el remove (esto queda como el original)
        $(addRemove).after(removeButton);


        $("#field" + next).attr('data-source',$(addto).attr('data-source'));
        $("#countCanalesVirtuales").val(next);

        $('.remove-me').click(function(e){
            e.preventDefault();
            var fieldNum = this.id.charAt(this.id.length-1);
            var fieldID = "#field" + fieldNum;
            var divInputGroup = $(fieldID).parent();
            $(this).remove();
            $(fieldID).remove();
            $(divInputGroup).remove();
        });
        //validarCanalesVirtuales();
        $('.canal-virtual-formula').bind('input', function() {
            $(this).parent().removeClass("has-danger");
            console.log(validarCanalesVirtuales());
        });
    });


    $('.canal-virtual-formula').bind('input', function() {
        $(this).parent().removeClass("has-danger");
        console.log(validarCanalesVirtuales());
    });
});


function validarEnsayoForm() {
    var bool = validarCanalesVirtuales();
    return bool;
}


function validarCanalesVirtuales() {
    var toReturn = true;
    $(".canal-virtual-formula").each(function() {
        var formula = $(this).val();
        var arrayCanales = formula.split(/[\s\\\/|:?;.,_*+-]+/);

        var index;
        for (index = 0; index < arrayCanales.length; ++index) {
            var sensorNum = arrayCanales[index];
            if (Math.floor(sensorNum) != sensorNum && !$.isNumeric(sensorNum)) {
                $(this).parent().addClass("has-danger");
                //alert("Canales no validos: "+this.id.charAt(this.id.length-1) );
                toReturn = false;
            }
            else if ( $.isNumeric(sensorNum) && (sensorNum > 32 || sensorNum<1) ) {
                $(this).parent().addClass("has-danger");
                toReturn = false;
            }
        }
    });
    return toReturn;
}



function goBack() {
    window.history.back();
}

function goHome() {
    window.location.replace("/");
}

function post(path, params, method) {
    method = method || "post"; // Set method to post by default if not specified.

    // The rest of this code assumes you are not using a library.
    // It can be made less wordy if you use one.
    var form = document.createElement("form");
    form.setAttribute("method", method);
    form.setAttribute("action", path);

    for(var key in params) {
        if(params.hasOwnProperty(key)) {
            var hiddenField = document.createElement("input");
            hiddenField.setAttribute("type", "hidden");
            hiddenField.setAttribute("name", key);
            hiddenField.setAttribute("value", params[key]);

            form.appendChild(hiddenField);
        }
    }

    document.body.appendChild(form);
    form.submit();
}


function hideFailedCancelAlert(){
    $('#alertFailedCancel').hide();
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
            $('#modalEnsayoRunning').modal('hide');
            document.getElementById("buttonComenzarEnsayo").disabled = false;
        })
        .fail(function (jqXHR, textStatus, errorThrown) {
            $('#alertFailedCancel').show();
        });
}

function resumirEnsayo() {
    //window.location.replace("/ensayo/2");
    post("/ensayo/2",{name: 'INTI-Construcciones'});
}

