function validarISBN(elemento){
    var telefono = elemento.value
        if(telefono.length > 0){
            var miAscii = telefono.charCodeAt(telefono.length-1)
            if(miAscii >= 48 && miAscii <= 57){
                elemento.style.border = '2px red solid'
                document.getElementById("mensajeISBN").style.color = "red";
                document.getElementById("mensajeISBN").innerHTML = "<br>ISBN Inválido"
            }else {
                elemento.value = elemento.value.substring(0, elemento.value.length-1)
                elemento.style.border = '2px red solid'
                document.getElementById("mensajeISBN").style.color = "red";
                document.getElementById("mensajeISBN").innerHTML = "<br>ISBN Inválido"
                //return false 
            }
            if(telefono.length == 10){
                elemento.style.border = '2px green solid'
                document.getElementById("mensajeISBN").style.color = "green";
                document.getElementById("mensajeISBN").innerHTML = "<br>ISBN Válido"
            }else{
                elemento.value = elemento.value.substring(0, 10)
            }
        }    
}

function validarNumero(elemento){
    var telefono = elemento.value
        if(telefono.length > 0){
            var miAscii = telefono.charCodeAt(telefono.length-1)
            if(miAscii >= 48 && miAscii <= 57){
                elemento.style.border = '2px green solid'
            }else {
                elemento.value = elemento.value.substring(0, elemento.value.length-1)
                //return false 
            }

        }    
}