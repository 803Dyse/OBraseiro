// Configuramos un calendario con la libreria de flatpickr
    document.addEventListener("DOMContentLoaded", function () {
        flatpickr("#fecha_nacimiento", {
            dateFormat: "d-m-Y",
            maxDate: "today",
            altInput: true,
            altFormat: "d-m-Y"
        });
    });