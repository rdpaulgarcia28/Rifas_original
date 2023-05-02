
const $Button_agregar = document.querySelector("#Button_agregar");
const $numeroIngresado = document.querySelector("#NumIngresado");
const $numPadre = document.querySelector("#numPadre");
const $numPadre2 = document.querySelector("#numPadre2");
const $numPadre3 = document.querySelector("#numPadre3");
const $textLabel = document.querySelector("#textLabel");
const $textLabel2 = document.querySelector("#textLabel2");
const $generateBtn = document.querySelector("#generateBtn");
const $countInput = document.querySelector("#countInput");
const $deleteBtn = document.querySelector("#deleteBtn");
const $deleteBtn2 = document.querySelector("#deleteBtn2");
// Seleccionamos todos los elementos div con la clase ".repeatNum"
const repeatNumbers = document.querySelectorAll(".repeatNum");
// Se ultilizara com elemento padre para guardar todos los bonones 
const botonesDiv = document.getElementById("#seccionBtns");



function alreadySelected(array) {
    var alreadySelected = []; // Creamos un array para almacenar los contenidos de los elementos seleccionados
    for (var i = 0; i < array.length; i++) { // Iteramos sobre los elementos seleccionados y agregamos su contenido al array
        alreadySelected.push(array[i].textContent);
    }
    return alreadySelected
}

function searchInArray(array, element) {
    // Iteramos sobre los elementos del array
    for (var i = 0; i < array.length; i++) {
      // Si encontramos el elemento, devolvemos true
      if (array[i] === element) {
        $textLabel2.classList.replace("textLabel--remove","textLabel");
        return true
      }
    }
    // Si no encontramos el elemento, devolvemos false
    return false
}

function findInArray(array, element) {
    // Iteramos sobre los elementos del array
    for (var i = 0; i < array.length; i++) {
      // Si encontramos el elemento, devolvemos true
      if (array[i] === element) {
        return true
      }
    }
    // Si no encontramos el elemento, devolvemos false
    return false
}
// Esta es la función que se activará cuando se desencadene un evento en un elemento
function addNumToLabel(number) {
    var $valor = number.textContent;
    number.disabled = true;
    createLabel($valor);
    randomHide()

}

function createLabel(element) {
    let $input = document.createElement("input");
    $input.value = element;
    $input.classList.add("input_class");
    $input.setAttribute("type", "text");
    $input.setAttribute("name", "dato[]");
    $numPadre.appendChild($input);
}
function createLabel2(element) {
    let $input = document.createElement("input");
    $input.value = element;
    $input.classList.add("input_class");
    $input.setAttribute("type", "text");
    $input.setAttribute("name", "dato[]");
    $numPadre3.appendChild($input);
}

function createButtons(array) {
    // Se ultilizara como elemento padre para guardar todos los bonones 
    const botonesDiv = document.getElementById("seccionBtns");
    // Creamos un bucle para generar 20 botones con números consecutivos
    for (var i = 1; i <= 100; i++) {
        // Creamos un nuevo botón
        var boton = document.createElement("button");
        // Variable en String
        $strNum = "";
        var $num = i.toString();
        // Agregamos los ceros para que sea un numero de 5 cifras
        switch ($num.length) {
            case 1:
                strNum = "0000" + $num;
                break;
            case 2:
                strNum = "000" + $num;
                break;
            case 3:
                strNum = "00" + $num;
                break;
            case 4:
                strNum = "0" + $num;
                break;
            default:
                strNum = $num;
        }
        // Le asignamos el valor de texto correspondiente al botón
        boton.textContent = strNum;
        boton.classList.add("btnOfNumber");
        // Agregar el evento click al botón
        boton.setAttribute("onclick","addNumToLabel(this)");
        boton.setAttribute("type","button");
        boton.setAttribute("id",strNum);

        findElement = findInArray(array,strNum);

        //Desabilitamos el boton si ya se encuentra Elegido
        if (findElement) {
            boton.disabled = true;
            boton.setAttribute("onclick","");
        }
         // Añadimos el botón al elemento <section> (padre)
        botonesDiv.appendChild(boton);
    }
}

function displayInputValue(){
    var $valor = $numeroIngresado.value;
    var $input = document.createElement("input");
    var $valorNumerico = +$valor;

    if ($valor === '') {
        console.log("valor vacio")
    }
    else{
        if ($valorNumerico > 100) {
            $textLabel.classList.replace("textLabel--remove","textLabel");
        }
        else{
            $textLabel.classList.replace("textLabel","textLabel--remove");
            $textLabel2.classList.replace("textLabel","textLabel--remove");
            let $valorLongitud = $valor.length;
            let $valorFinal="";
            switch ($valorLongitud) {
                case 1:
                  $valorFinal = "0000" + $valor;
                  break;
                case 2:
                  $valorFinal = "000" + $valor;
                  break;
                case 3:
                  $valorFinal = "00" + $valor;
                  break;
                case 4:
                  $valorFinal = "0" + $valor;
                  break;
                default:
                  $valorFinal = $valor;
              }
            $input.value = $valorFinal;
            disabledBtn = document.getElementById($input.value);
            disabledBtn.disabled = true;
    
            var Repeat = searchInArray(listNum,$valorFinal);
    
            if (Repeat === false) {
                createLabel($valorFinal);
                $numeroIngresado.value = "";
            }
            if ($textLabel.hidden === false && $textLabel2.hidden === false) {
                randomHide();
            }
        }
        $numeroIngresado.value = "";
    }
}
 


function Random() {
    let $input = document.createElement("input");
    let $valor = Math.floor(Math.random() * 100);
    let $valorStg = String($valor);
    let $valorLongitud = $valorStg.length;
    let $valorFinal="";
    switch ($valorLongitud){
        case 1:
        $valorFinal = "0000" + $valorStg;
        break;
        case 2:
        $valorFinal = "000" + $valorStg;
        break;
        case 3:
        $valorFinal = "00" + $valorStg;
        break;
        case 4:
        $valorFinal = "0" + $valorStg;
        break;
        default:
        $valorFinal = $valorStg;
    }

    $input.value = $valorFinal;
    disabledBtn = document.getElementById($input.value);
    disabledBtn.disabled = true;
    var Repeat = searchInArray(listNum,$valorFinal);

    if (Repeat === false) {
        createLabel($valorFinal);
    }
} 

function randomHide() {
    let $input = document.createElement("input");
    let $valor = Math.floor(Math.random() * (45000 - 22500 + 1)) + 22500;
    let $valorStg = String($valor);
    let $valorLongitud = $valorStg.length;
    let $valorFinal="";
    switch ($valorLongitud){
        case 1:
        $valorFinal = "0000" + $valorStg;
        break;
        case 2:
        $valorFinal = "000" + $valorStg;
        break;
        case 3:
        $valorFinal = "00" + $valorStg;
        break;
        case 4:
        $valorFinal = "0" + $valorStg;
        break;
        default:
        $valorFinal = $valorStg;
    }

    $input.value = $valorFinal;
    var Repeat = searchInArray(listNum,$valorFinal);

    if (Repeat === false) {
        createLabel2($valorFinal);
    }
} 

function deleteNumber() { //borra los elementos ya elegidos y regresa a tu estado normal el boton.
    const parentElement = document.getElementById("numPadre");
    let lastChild = parentElement.lastChild;
    parentElement.removeChild(lastChild);
    lastChildNumber = lastChild.value; //extraigo el valor del ultimo hijo del padre
    disabledLastChild = document.getElementById(lastChildNumber); 
    disabledLastChild.disabled = false;
    
}
function deleteNumber2() {
    const parentElement = document.getElementById("numPadre3");
    let lastChild = parentElement.lastChild;
    parentElement.removeChild(lastChild);
    lastChildNumber = lastChild.value; //extraigo el valor del ultimo hijo del padre
    disabledLastChild = document.getElementById(lastChildNumber); 
    disabledLastChild.disabled = false;
}


$deleteBtn.onclick = function() {
    deleteNumber();
    deleteNumber2();
}
/*$deleteBtn2.onclick = function() {
    deleteNumber();
    deleteNumber2();
}*/
$generateBtn.onclick = function creatListRandom() {
    count = Number($countInput.value);
    for (let i = 0; i < count; i++) {
        Random();
        randomHide();
    }
    $countInput.value = "";
} 

//Almacenamos en una variable el resultado para usarlo en otras funciones
var listNum = alreadySelected(repeatNumbers);
createButtons(listNum);