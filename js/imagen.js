

const $generarBoleto = document.querySelector("#generarBoleto");

const $generaTuBoleto = document.querySelector("#generaTuBoleto");


function extractParentToImage(element) {
    // Extrae el elemento padre
    const parent = element.parentNode;
  
    // Crea un canvas para dibujar el elemento padre
    const canvas = document.createElement("canvas");
    canvas.width = parent.offsetWidth;
    canvas.height = parent.offsetHeight;
    const ctx = canvas.getContext("2d");
  
    // Dibuja el elemento padre en el canvas
    ctx.drawImage(parent, 0, 0, parent.offsetWidth, parent.offsetHeight);
  
    // Convierte el canvas en una imagen
    const img = new Image();
    img.src = canvas.toDataURL();
  
    // Reemplaza el elemento padre con la imagen
    parent.parentNode.replaceChild(img, parent);
  
    // Agrega la imagen a un contenedor en el DOM
    const container = document.getElementById("image-container");
    container.appendChild(img);
  
    return img;
  }

  $generarBoleto.click = extractParentToImage($generaTuBoleto);