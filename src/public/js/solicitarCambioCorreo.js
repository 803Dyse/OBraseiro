function solicitarCambioCorreo() {
    // Esto es el código de dialogo que nos genera el sweetAlert en su web
    Swal.fire({
        title: '¿Cambiar Correo Electrónico?',
        text: 'Te enviaremos un enlace para cambiar tu correo electrónico.',
        icon: 'info',
        showCancelButton: true,
        confirmButtonText: 'Enviar Correo',
        cancelButtonText: 'Cancelar'
                // Manejamos la respuesta del usuario, ya que el tio/tia puede confirmar
                // si realmente quiere que enviemos un correo de cambio de correo, o no.
    }).then((result) => {
        if (result.isConfirmed) {
            // Si el usuario pulsa en enviar, es decir.. Confirma el envio de 
            // correo, procederá a enviar una solicitud de cambio de correo
            // solicitarcambioCorreoUrl es una variable que tiene la dirección a
            //  la que se envia la solicitud
            fetch(solicitarCambioCorreoUrl, {
                method: 'POST',
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                    'Content-Type': 'application/json'
                }
            }).then(response => {
                // Si entra aqui, significa que todo salió bien, y el usuario puede seguir el proceso de cambio de correo
                if (response.ok) {
                    Swal.fire('Correo enviado', 'Revisa tu bandeja de entrada para cambiar el correo.', 'success');
                } else {
                    // Ahora, si llega aqui, significa que hubo algun error, normalmente estará relacionado con el servidor
                    Swal.fire('Error', 'No se pudo enviar el correo. Intenta de nuevo más tarde.', 'error');
                }
            }).catch(error => {
                // Este otro error es mas especifico ya que puede ocurrir si por ejemplo el 
                // usuario tiene problemas de red, y cuando envia la solicitud genera un error. 
                Swal.fire('Error', 'Ocurrió un problema al enviar la solicitud.', 'error');
            });
        }
    });
}
