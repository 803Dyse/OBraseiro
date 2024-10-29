const imagenes = document.querySelectorAll(".imgSlider");
let imgActual = 0;

// Vamos al siguiente slide
document.getElementById("next").addEventListener("click", () => {
  imagenes[imgActual].classList.remove("left-0");
  imagenes[imgActual].classList.add("left-full");
  imgActual = (imgActual + 1) % imagenes.length; // Avanzamos a la siguiente img
  imagenes[imgActual].classList.remove("left-full");
  imagenes[imgActual].classList.add("left-0");
});

// Retrocedemos al slide anterior
document.getElementById("prev").addEventListener("click", () => {
  imagenes[imgActual].classList.remove("left-0");
  imagenes[imgActual].classList.add("left-full");
  imgActual = (imgActual - 1 + imagenes.length) % imagenes.length; // Retrocedemos a la img anterior
  imagenes[imgActual].classList.remove("left-full");
  imagenes[imgActual].classList.add("left-0");
});