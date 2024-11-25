<?php

namespace App\Controllers;

use App\Models\UserModel;

/**
 * Controlador de autenticación que controla el registro, login y logout de usuarios
 */
class AuthController extends BaseController {

    /**
     * Método para registrar un nuevo usuario en la aplicación. Se valida el 
     * formulario, se convierte la fecha y se inserta el usuario en la base de datos
     */
    public function registrar()
    {
        $validation = \Config\Services::validation();

        // Definimos en el validation nuestras reglas de validacion, pidiendo 
        // estos requisitos al usuario
        $validation->setRules([
            'nombre' => 'required|min_length[3]|max_length[30]',
            'apellidos' => 'required|min_length[3]|max_length[50]',
            'correo' => 'required|valid_email|is_unique[usuario.correo]',
            'fecha_nacimiento' => [
                'rules' => 'required|valid_date[d-m-Y]|date_greater_than_equal[01-01-1900]|date_less_than_equal[' . date('d-m-Y') . ']',
                'errors' => [
                    'date_greater_than_equal' => 'La fecha de nacimiento debe ser igual o mayor que 01-01-1900.',
                    'date_less_than_equal' => 'La fecha de nacimiento no puede ser en el futuro.',
                ],
            ],
            'contrasena' => 'required|min_length[6]|max_length[20]',
            'confirmar_contrasena' => 'required|matches[contrasena]'
        ]);

        // Validamos los datos, si validation nos devuelve false, el usuario 
        // metió algo fuera de los reqs minimos/maximos
        if (!$validation->withRequest($this->request)->run())
        {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        // Aqui estamos convirtiendo la fecha de nacimiento para que el usuario 
        // introduzca la fecha como dios manda, que es en formato dia, mes y año,
        // y no esa fumada de año, mes dia, que es ridiculo
        $fecha_nacimiento_input = $this->request->getPost('fecha_nacimiento');
        $fecha_nacimiento_obj = \DateTime::createFromFormat('d-m-Y', $fecha_nacimiento_input);

        if (!$fecha_nacimiento_obj)
        {
            return redirect()->back()->withInput()->with('error', 'Formato de fecha incorrecto.');
        }

        $fecha_nacimiento_formateada = $fecha_nacimiento_obj->format('Y-m-d');

        // Pasamos los datos de usuario en este array, que se utilizará para crear
        // su cuenta en el sistema
        $userData = [
            'nombre' => $this->request->getPost('nombre'),
            'apellidos' => $this->request->getPost('apellidos'),
            'correo' => $this->request->getPost('correo'),
            'fecha_nacimiento' => $fecha_nacimiento_formateada,
            'contrasena' => password_hash($this->request->getPost('contrasena'), PASSWORD_BCRYPT),
        ];

        // Insertamos los datos del usuario
        $userModel = new UserModel();
        if (!$userModel->insert($userData))
        {
            // Si por algun motivo esto peta, meti este json para que me diga que brujeria habrá pasao
            log_message('error', 'Error al insertar el usuario: ' . json_encode($userModel->errors()));
            return redirect()->back()->withInput()->with('errors', $userModel->errors());
        }

        // Aqui iniciamos sesion automaticamente
        $insertedId = $userModel->insertID();
        $session = session(); // Si la session actual ya existe, mantenemos la sesion activa del usuario
        $session->set([
            'id' => $insertedId,
            'nombre' => $userData['nombre'],
            'correo' => $userData['correo'],
            'id_rol' => 1,
            'isLoggedIn' => true
        ]);

        return redirect()->to('/perfil')->with('success', 'Cuenta creada y sesión iniciada con éxito.');
    }

    /**
     * Destruye y cierra la sesión actual del usuario
     * @return
     */
    public function logout()
    {
        // Destruimos la sesión actual y redirigimos al usuario a la página principal
        session()->destroy();
        return redirect()->to('/');
    }

    /**
     * Valida el formulario y si todo cumple con las condiciones loguea el usuario
     */
    public function login()
    {
        $validation = \Config\Services::validation();

        // Reglas de validación para el formulario de login
        $validation->setRules([
            'correo_acceder' => 'required|valid_email',
            'contrasena_acceder' => 'required|min_length[6]'
        ]);

        // Validación de los datos de login
        if (!$this->validate($validation->getRules()))
        {
            // Si falla la validación, redirigimos con los errores y datos
            session()->setFlashdata('form_error', 'login');
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        // Inicializamos el modelo de usuario para verificar los datos en la BD
        $userModel = new UserModel();
        $correo = $this->request->getPost('correo_acceder');
        $contrasena = $this->request->getPost('contrasena_acceder');

        // Buscamos el usuario en la BD por su correo
        $usuario = $userModel->where('correo', $correo)->first();

        // Verificamos si el usuario existe, la contraseña es correcta y la cuenta está activa
        if ($usuario && password_verify($contrasena, $usuario['contrasena']))
        {
            if ($usuario['estado'] == 1)
            { // Comprobar que la cuenta esté activa
                // Si las credenciales son correctas y la cuenta está activa, iniciamos sesión
                $session = session();
                $session->set([
                    'id' => $usuario['id'],
                    'nombre' => $usuario['nombre'],
                    'correo' => $usuario['correo'],
                    'id_rol' => $usuario['id_rol'], // Añadir esto a la sesión
                    'isLoggedIn' => true
                ]);

                log_message('info', 'Usuario autenticado con ID: ' . $usuario['id']);

                // Redirigimos al perfil tras iniciar sesión
                return redirect()->to('/perfil')->with('success', '¡Bienvenido de nuevo!');
            }
            else
            {
                // Si la cuenta está desactivada, mostramos un mensaje de error
                session()->setFlashdata('form_error', 'login');
                return redirect()->back()->withInput()->with('errors', [
                            'login' => 'Esta cuenta está desactivada.'
                ]);
            }
        }
        else
        {
            // Si las credenciales son incorrectas, mostramos un mensaje de error
            session()->setFlashdata('form_error', 'login');
            return redirect()->back()->withInput()->with('errors', [
                        'login' => 'Correo o contraseña incorrectos.'
            ]);
        }
    }

    /**
     * Método para mostrar la vista de acceso o redirigir al perfil si ya hay 
     * sesión iniciada
     */
    public function acceso()
    {
        $session = session();

        // Verificamos si el usuario ya está logueado
        if ($session->get('isLoggedIn'))
        {
            return redirect()->to('/perfil'); // Redirigimos al perfil si el usuario ya tiene sesión iniciada
        }

        // Si no está logueado, cargamos la vista de acceso
        return view('acceso');
    }
}
