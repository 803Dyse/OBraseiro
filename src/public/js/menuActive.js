 /* Con esta constante y estas propriedades conseguimos el nombre del archivo, una vez con ese nombre 
      solo tenemos que disparar el script para meter el estilo que creamos para la pseudoclase "active"
      */
      const currentPage = window.location.pathname.split("/").pop();

      // Aqui estamos aplicando la clase active al elemento
      function setActiveLink() {
        switch (currentPage) {
          case "menu.html":
            document.getElementById("menu-link").classList.add("active");
            break;
          case "realizarPedido.html":
            document.getElementById("encargar-link").classList.add("active");
            break;
          case "quienesSomos.html":
            document
              .getElementById("quienesSomos-link")
              .classList.add("active");
            break;
          case "acceso.html":
            document.getElementById("registrar-link").classList.add("active");
            break;
        }
      }
      setActiveLink();