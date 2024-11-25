function solicitarCambioPassword() {
    Swal.fire({
        title: '¿Cambiar Contraseña?',
        text: 'Te enviaremos un enlace para cambiar tu contraseña a tu correo.',
        icon: 'info',
        showCancelButton: true,
        confirmButtonText: 'Enviar Correo',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.isConfirmed) {
            fetch(solicitarCambioPasswordUrl, {
                method: 'POST',
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                    'Content-Type': 'application/json'
                }
            }).then(response => {
                if (response.ok) {
                    Swal.fire('Correo enviado', 'Revisa tu bandeja de entrada para cambiar la contraseña.', 'success');
                } else {
                    Swal.fire('Error', 'No se pudo enviar el correo. Intenta de nuevo más tarde.', 'error');
                }
            }).catch(error => {
                Swal.fire('Error', 'Ocurrió un problema al enviar la solicitud.', 'error');
            });
        }
    });
}