
function validarFormConfiguracion() {
    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    if(!re.test(document.getElementById('input_mail').value.toLowerCase())){
        alert('El mail ingresado no es correcto')
        return false
    }
    if(document.getElementById('input_titulo').value != "") {
        alert('Campo titulo esta vacio')
        return false
    }
    if(document.getElementById('input_cant').value != "") {
        alert('Campo titulo esta vacio')
        return false
    }
    return true
}