// Al hacer clic en "Acceder aquí", ocultamos el formulario de registro y mostramos el otro formulario de login
document.getElementById("acceder-link").addEventListener("click", function () {
  document.getElementById("form-crear-cuenta").style.display = "none";
  document.getElementById("form-acceder").style.display = "block";
});

// Al hacer clic en "Regístrate aquí", ocultamos el formulario de login y mostramos el de registro
document
  .getElementById("registrar-form-link")
  .addEventListener("click", function () {
    document.getElementById("form-acceder").style.display = "none";
    document.getElementById("form-crear-cuenta").style.display = "block";
  });
