
// INSETAR ESTE ESTA FUNCION ADENTRO DEL INPUT
// onkeypress="return soloNumeros(event)" 

function soloNumeros(e) {
    key = e.keyCode || e.which;
    teclado = String.fromCharCode(key);
    numeros = "0123456789";
    especiales = "8-37-38-46"; //ARRAY
    teclado_especial = false;
    
    for( var i in especiales){
        if(key==especiales[i]){
            teclado_especial=true;
        }
    }
    if(numeros.indexOf(teclado) ==-1 && !teclado_especial){
        return false;
    }
}
