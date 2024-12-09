<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\TokenModel;
use App\Models\PedidoModel;

/**
 * Clase que permite al usuario cambiar: foto de perfil, contraseña, correo 
 * electronico y tambien permite desactivar su propia cuenta, asi como ver su 
 * historial de pedido realizados
 */
class ProfileController extends BaseController {

    protected $userModel;
    protected $pedidoModel;
    protected $tokenModel;
    protected $session;

    /**
     * Este es el constructor de perfil, aqui centralizamos todo una vez el 
     * usuario tiene su sesion iniciada, para no tener que estar creando 
     * instancia de clase todo el rato
     */
    public function __construct() {
        $this->userModel = new UserModel();
        $this->pedidoModel = new PedidoModel();
        $this->tokenModel = new TokenModel();
        $this->session = session();
    }

    /**
     * Verifica si el usuario está logueado
     */
    private function isLoggedIn() {
        return $this->session->has('id') && $this->session->get('isLoggedIn');
    }

    /**
     * Muestra la página de perfil del usuario
     */
    public function mostrarPerfilUsuario() {
        // Verificamos si el usuario está logueado, si no está, se manda otra 
        // vez al formulario de login
        if (!$this->isLoggedIn()) {
            return redirect()->to('/acceso');
        }

        $userId = $this->session->get('id');
        $user = $this->userModel->getUserById($userId);

        // Comprobamos que el usuario que instanciamos existe
        if (!$user) {
            return redirect()->to('/acceso');
        }

        // Comprobamos si el usuario tiene una foto personalizada o usamos Gravatar
        $fotoPerfil = !empty($user['foto_perfil']) ? base_url($user['foto_perfil']) : $this->getGravatarUrl($user['correo']);

        // Obtenemos todos los pedidos finalizados que este usuario tiene
        $pedidos = $this->pedidoModel->where('id_usuario', $userId)
                ->where('estado', 'Finalizado')
                ->orderBy('fecha_pedido', 'DESC')
                ->findAll();

        // Luego al final, solo pasamos los datos.. Que datos? la foto de perfil,
        // el usuario, sus pedidos y la vista de perfil en si
        return view('perfil', [
            'user' => $user,
            'fotoPerfil' => $fotoPerfil,
            'pedidos' => $pedidos
        ]);
    }

    /**
     * Método que obtiene la foto de perfil del usuario por Gravatar, en el caso
     * de que tenga
     */
    private function getGravatarUrl($email, $size = 200) {
        $hash = md5(strtolower(trim($email)));
        return "https://www.gravatar.com/avatar/$hash?s=$size&d=identicon";
    }

    /**
     * Desactiva la cuenta del usuario
     */
    public function eliminar_cuenta() {
        // Verificamos si el usuario está logueado
        if (!$this->isLoggedIn()) {
            return redirect()->to('/acceso');
        }

        $userId = $this->session->get('id');
        log_message('info', 'ProfileController@eliminar_cuenta - userId obtenido de la sesión: ' . $userId);

        $resultado = $this->userModel->desactivarCuenta($userId);

        if ($resultado) {
            // Si se desactiva correctamente, destruimos la sesión y redirigimos al inicio
            $this->session->destroy();
            return redirect()->to('/')->with('success', 'Tu cuenta ha sido eliminada exitosamente.');
        } else {
            // Si ocurre un error, mostramos un mensaje al usuario
            return redirect()->to('/perfil')->with('error', 'No se pudo eliminar la cuenta. Inténtalo de nuevo.');
        }
    }

    /**
     * Método que cambia la foto de perfil del usuario
     */
    public function cambiarFotoPerfil() {
        // Verificamos si el usuario está logueado
        if (!$this->isLoggedIn()) {
            return redirect()->to('/acceso');
        }

        $userId = $this->session->get('id');
        $file = $this->request->getFile('foto_perfil');

        // Verificamos si el archivo es válido
        if (!$file->isValid()) {
            log_message('error', 'Error en la carga del archivo: ' . $file->getErrorString());
            return redirect()->to('/perfil')->with('error', 'No se pudo subir el archivo. Error: ' . $file->getErrorString());
        }

        // Validamos el formato y tamaño del archivo
        $allowedTypes = ['image/jpeg', 'image/png', 'image/gif', 'image/webp'];
        if (!in_array($file->getMimeType(), $allowedTypes)) {
            return redirect()->to('/perfil')->with('error', 'Solo se permiten archivos en formato JPEG, PNG, GIF o WEBP.');
        }

        $maxSize = 5 * 1024 * 1024; // Tamaño máximo: 5MB
        if ($file->getSize() > $maxSize) {
            return redirect()->to('/perfil')->with('error', 'El tamaño de la imagen no debe exceder los 5MB.');
        }

        // Ruta de subida (dentro de `public`)
        $uploadPath = FCPATH . 'uploads/profile_pics/';

        // Verificamos si el directorio existe
        if (!is_dir($uploadPath)) {
            if (!mkdir($uploadPath, 0755, true)) {
                log_message('error', 'No se pudo crear el directorio: ' . $uploadPath);
                return redirect()->to('/perfil')->with('error', 'No se pudo crear el directorio para guardar la imagen.');
            }
        }

        // Generamos un nombre único para el archivo
        $newFileName = $userId . '_' . uniqid() . '.' . $file->guessExtension();

        // Movemos el archivo al directorio de destino
        if (!$file->move($uploadPath, $newFileName)) {
            log_message('error', 'Error al mover el archivo al directorio: ' . $uploadPath);
            return redirect()->to('/perfil')->with('error', 'No se pudo guardar la imagen en el servidor.');
        }

        // Guardamos la ruta relativa en la base de datos
        $filePath = 'uploads/profile_pics/' . $newFileName;
        if (!$this->userModel->update($userId, ['foto_perfil' => $filePath])) {
            log_message('error', 'Error al actualizar la base de datos con la ruta de la imagen.');
            return redirect()->to('/perfil')->with('error', 'No se pudo actualizar la foto de perfil en la base de datos.');
        }

        // Redirigimos con un mensaje de éxito
        return redirect()->to('/perfil')->with('success', 'Foto de perfil actualizada correctamente.');
    }

    /**
     * Método que solicita el cambio de contraseña del usuario, si este lo pide
     */
    public function solicitarCambioContrasena() {
        // Verificamos si el usuario está logueado y tiene los datos necesarios en sesión
        if (!$this->isLoggedIn() || !$this->session->has('correo')) {
            log_message('error', 'El usuario no está logueado o faltan datos en la sesión.');
            return redirect()->to('/acceso');
        }

        $userId = $this->session->get('id');
        $userEmail = $this->session->get('correo');

        // Verificamos que userId es válido y existe en la base de datos
        $user = $this->userModel->find($userId);
        if (!$user) {
            return redirect()->to('/acceso')->with('error', 'Hubo un problema con tu sesión. Por favor, inicia sesión nuevamente.');
        }

        // Generamos un token único para el cambio de contraseña
        $token = bin2hex(random_bytes(16)); // Este es el metodo que nos permite crear un token, para tener enlaces unicos de cambio de pw/email
        $expiration = date('Y-m-d H:i:s', strtotime('+30 minutes')); // Damos un márgen de 30 minutos para utilizar el enlace con el token generado
        $ipAddress = $this->request->getIPAddress(); // Cogemos la IP por seguridad
        // Creamos token para cambio de contraseña (Esto es igual que en cambio de correo electronico)
        $created = $this->tokenModel->createToken($userId, $token, $expiration, $ipAddress, 'cambio_contrasena');

        if (!$created) {
            return redirect()->back()->with('error', 'No se pudo enviar el correo de cambio de contraseña.');
        }

        // Este será el formato de la url que nos va a crear con el token generado
        $link = base_url("perfil/cambiar_contrasena/{$token}");

        // Configuramos y enviamos el correo electrónico al usuario
        $email = \Config\Services::email();
        $email->setFrom('noreply@OBraseiro', 'Tu Aplicación');
        $email->setTo($userEmail);
        $email->setSubject('Solicitud de cambio de contraseña');
        $email->setMessage("Haz clic en el siguiente enlace para cambiar tu contraseña: <a href='" . esc($link) . "'>" . esc($link) . "</a>");

        if ($email->send()) {
            log_message('info', 'Correo enviado para cambio de contraseña');
            return redirect()->back()->with('success', 'Se ha enviado un correo para cambiar tu contraseña.');
        } else {
            log_message('error', 'Error al enviar el correo de cambio de contraseña');
            return redirect()->back()->with('error', 'No se pudo enviar el correo de cambio de contraseña.');
        }
    }

    /**
     * Método que comprueba la disponibilidad de un token y crea un enlace de 
     * cambio de contraseña con dicho token
     */
    public function cambiarContrasena($token) {
        $userToken = $this->tokenModel->findValidToken($token, 'cambio_contrasena');

        // Verificamos si el token es válido y no ha expirado
        if (!$userToken) {
            log_message('error', "Token no encontrado o expirado: $token");
            return redirect()->to('/')->with('error', 'El enlace para cambiar la contraseña ha expirado o no es válido.');
        }

        return view('cambiar_contrasena', ['token' => $token]);
    }

    /**
     * Método que actualiza la contraseña del usuario en la BD, so todo está validado
     */
    public function actualizarContrasena() {
        $rules = [
            'new_password' => 'required|min_length[6]|max_length[20]',
            'confirm_password' => 'required|matches[new_password]',
        ];

        // Validamos los datos del formulario
        if (!$this->validate($rules)) {
            log_message('error', 'Errores de validación: ' . json_encode($this->validator->getErrors()));
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $token = $this->request->getPost('token');
        $newPassword = $this->request->getPost('new_password');

        log_message('info', "Token recibido: {$token}");

        $userToken = $this->tokenModel->findValidToken($token, 'cambio_contrasena');

        // Verificamos si el token es válido y no ha expirado
        if (!$userToken) {
            log_message('error', "Token no válido o expirado: {$token}");
            return redirect()->to('/')->with('error', 'El enlace para cambiar la contraseña ha expirado o no es válido.');
        }

        // Encriptamos la nueva contraseña
        $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
        // Actualizamos la contraseña en la base de datos
        $this->userModel->update($userToken['user_id'], ['contrasena' => $hashedPassword]);

        // Eliminamos el token una vez utilizado
        $this->tokenModel->deleteToken($token);

        $this->session->destroy();

        log_message('info', 'Contraseña actualizada exitosamente para user_id: ' . $userToken['user_id']);

        return redirect()->to('/')->with('success', 'Tu contraseña ha sido cambiada con éxito. Inicia sesión de nuevo.');
    }

    /**
     * Método que solicita el cambio de correo electronico del usuario
     */
    public function solicitarCambioCorreo() {
        // Verificamos si el usuario está logueado y tiene los datos necesarios en sesión
        if (!$this->isLoggedIn() || !$this->session->has('correo')) {
            return redirect()->to('/acceso');
        }

        $userId = $this->session->get('id');
        $userEmail = $this->session->get('correo');

        // Generamos un token único para el cambio de correo
        $token = bin2hex(random_bytes(16));
        $expiration = date('Y-m-d H:i:s', strtotime('+30 minutes'));
        $ipAddress = $this->request->getIPAddress();

        // Creamos token para cambio de correo electrónico
        $created = $this->tokenModel->createToken($userId, $token, $expiration, $ipAddress, 'cambio_correo');

        if (!$created) {
            return redirect()->back()->with('error', 'No se pudo enviar el correo de cambio de correo electrónico.');
        }

        $link = base_url("perfil/cambiar_correo/{$token}");

        // Configuramos y enviamos el correo electrónico al usuario
        $email = \Config\Services::email();
        $email->setFrom('noreply@OBraseiro', 'Tu Aplicación');
        $email->setTo($userEmail);
        $email->setSubject('Solicitud de cambio de correo electrónico');
        $email->setMessage("Haz clic en el siguiente enlace para cambiar tu correo electrónico: <a href='" . esc($link) . "'>" . esc($link) . "</a>");

        if ($email->send()) {
            log_message('info', 'Correo enviado para cambio de correo electrónico');
            return redirect()->back()->with('success', 'Se ha enviado un correo para cambiar tu correo electrónico.');
        } else {
            log_message('error', 'Error al enviar el correo de cambio de correo electrónico');
            return redirect()->back()->with('error', 'No se pudo enviar el correo de cambio de correo electrónico.');
        }
    }

    /**
     * Método que genera la url con el token que pasamos previamente
     */
    public function cambiarCorreo($token) {
        $userToken = $this->tokenModel->findValidToken($token, 'cambio_correo');

        // Verificamos si el token es válido y no ha expirado
        if (!$userToken) {
            return redirect()->to('/')->with('error', 'El enlace para cambiar el correo ha expirado o no es válido.');
        }

        log_message('info', "Token válido para cambiar correo: $token");
        return view('cambiar_correo', ['token' => $token]);
    }

    /**
     * Método que actualiza el correo electronico del usuario, cambiando el 
     * actual correo por el nuevo que introduce el usuario, y lo guarda en la 
     * base de datos
     */
    public function actualizarCorreo() {
        $rules = [
            'new_email' => 'required|valid_email|is_unique[usuario.correo]',
            'confirm_email' => 'required|matches[new_email]'
        ];

        // Validamos los datos del formulario
        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $token = $this->request->getPost('token');
        $newEmail = $this->request->getPost('new_email');

        $userToken = $this->tokenModel->findValidToken($token, 'cambio_correo');

        // Verificamos si el token es válido y no ha expirado
        if (!$userToken) {
            return redirect()->to('/')->with('error', 'El enlace para cambiar el correo ha expirado o no es válido.');
        }

        // Actualizamos el correo electrónico del usuario
        $this->userModel->update($userToken['user_id'], ['correo' => $newEmail]);

        // Eliminamos el token después de actualizar el correo electrónico
        $this->tokenModel->deleteToken($token);

        // Cerramos la sesión del usuario después del cambio de correo
        $this->session->destroy();

        // Redirigimos al usuario a la página de inicio
        return redirect()->to('/')->with('success', 'Tu correo electrónico ha sido cambiado con éxito. Inicia sesión de nuevo.');
    }
}
