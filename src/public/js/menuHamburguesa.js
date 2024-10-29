/* Script para manejar el menu hamburguesa */
const menuToggle = document.getElementById("menu-toggle");
const menuClose = document.getElementById("menu-close");
const fullscreenMenu = document.getElementById("fullscreen-menu");

// Abre el menú
menuToggle.addEventListener("click", () => {
  fullscreenMenu.classList.add("open");
});

// Cierra el menú
menuClose.addEventListener("click", () => {
  fullscreenMenu.classList.remove("open");
});