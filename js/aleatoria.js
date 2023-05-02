// Obtener todos los botones
let buttons = document.querySelectorAll('#buttons-container input[type="button"]');

// Crear una función para deshabilitar 3 botones aleatorios
function deshabilitarBotonesAleatorios() {
  // Obtener los botones habilitados (del 6 al 20)
  let botonesHabilitados = Array.from(buttons).slice(5);
  // Deshabilitar 3 botones aleatorios
  for (let i = 0; i < 3; i++) {
    let botonAleatorio = botonesHabilitados[Math.floor(Math.random() * botonesHabilitados.length)];
    botonAleatorio.disabled = true;
    // Quitar el botón aleatorio de la lista de botones habilitados
    botonesHabilitados = botonesHabilitados.filter(boton => boton !== botonAleatorio);
  }
}

// Llamar a la función para deshabilitar 3 botones aleatorios
deshabilitarBotonesAleatorios();