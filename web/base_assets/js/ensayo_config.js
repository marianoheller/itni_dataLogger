$(document).ready(function() {

    if (window.myConfig.flagEnsayoRunning = "True") {

        $('#modalEnsayoRunning').modal({
            backdrop: 'static',
            keyboard: false
        })
        $('#modalEnsayoRunning').modal('show');
        $('#alertFailedCancel').hide();
        document.getElementById("buttonComenzarEnsayo").disabled = true;
    }
});



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