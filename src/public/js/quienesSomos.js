  const firstSliderImages = document.querySelectorAll(".first-slider");
      const secondSliderImages = document.querySelectorAll(".second-slider");

      let current = 0;

      // Ponemos un delay para las imagenes, jugando con la clase "opacity-0" de tailwind
      setInterval(() => {
        // Escondemos la imagen de los dos sliders
        firstSliderImages[current].classList.add("opacity-0");
        secondSliderImages[current].classList.add("opacity-0");

        // Actualiza actualizamos el contador de las imagenes
        current = (current + 1) % firstSliderImages.length;

        // Mostramos las nuevas imagenes
        firstSliderImages[current].classList.remove("opacity-0");
        secondSliderImages[current].classList.remove("opacity-0");
      }, 2750);