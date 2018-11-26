function validarForm() {
    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    if(!re.test(document.getElementById('input_mail').value.toLowerCase())){
        alert('El mail ingresado no es correcto')
        return false
    }
    return true
}

function chequearRoles() {
    if ($("[name='roles[]']:checked").length <= 0) {
        alert("Debe seleccionar al menos un rol")
        return false;
    }
}