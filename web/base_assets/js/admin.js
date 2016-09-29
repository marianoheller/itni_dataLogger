
function validateUserAvailability() {
    var username = document.forms["register_form"]["add-username"].value;
    if ( window.myConfig.usuarios.hasOwnProperty(username) ) {
        $('#alert-user-existente').show();
        return false;
    }
    return true;
}

function validateDeviceAvailability() {
    var devname = document.forms["register_device_form"]["add-username"].value;
    if ( window.myConfig.devices.hasOwnProperty(devname) ) {
        $('#alert-device-existente').show();
        return false;
    }
    return true;
}


$(document).ready(function() {
    $('#alert-user-existente').hide();
    $('#alert-device-existente').hide();

    $(".content-tab a").click(function(){
        $(this).tab('show');
    });
});

$('#delete-user-select').on('change', function() {
    var val = document.forms["delete-form"]["username-eliminar"].value;
    if (val == "-1") {
        $('#deleteUserButton').prop('disabled', true);
    }
    else{
        $('#deleteUserButton').prop('disabled', false);
    }
});

$('#delete-device-select').on('change', function() {
    var val = document.forms["delete-device-form"]["username-eliminar"].value;
    if (val == "-1") {
        $('#deleteDeviceButton').prop('disabled', true);
    }
    else{
        $('#deleteDeviceButton').prop('disabled', false);
    }
});