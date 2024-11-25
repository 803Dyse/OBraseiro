<?php

namespace App\Controllers;

use App\Models\UserModel;

/**
 * Clase que controla la vista de admin y de editar usuarios
 */
class AdminController extends BaseController {

    /**
     * Carga todos los usuarios de la tabla usuarios y los muestra en admin.php
     * @return type
     */
    public function cargarUsuarios()
    {
        // Comprobamos que el usuario ya está logueado
        if (!session()->get('isLoggedIn'))
        {
            return redirect()->to('/acceso')->with('error', 'Debes iniciar sesión primero.');
        }

        // Comprobamos que el usuario sea usuario comun, de id rol 1, (usuario)
        if (session()->get('id_rol') != 2)
        {
            return view('sin_privilegios'); // Lo redireccionamos a esta vista
        }

        // Creamos un objeto de model para poder coger los datos y pasarlos a la vista
        $userModel = new UserModel();

        // Odenamos la tabla de datos que vamos a ver pasando parametros en la URL
        $order_by = $this->request->getGet('order_by') ?? 'id';
        $direction = $this->request->getGet('direction') ?? 'asc';

        // Validamos estos parámetros de ordenación para evitar SQL injection
        $valid_columns = ['id', 'id_rol', 'estado', 'nombre', 'apellidos', 'correo', 'fecha_nacimiento', 'fecha_registro'];
        if (!in_array($order_by, $valid_columns))
        {
            $order_by = 'id';
        }
        if (!in_array($direction, ['asc', 'desc']))
        {
            $direction = 'asc';
        }

        // Cogemos los datos del campo de escribir y del select, estos campos 
        // trabajan en conjunto para poder filtrar datos y buscar a medida en la 
        // tabla de usuarios.
        $search = $this->request->getGet('search');
        $filter = $this->request->getGet('filter') ?? 'all';

        // Iniciamos la consulta
        $query = $userModel;

        // Si hay una búsqueda, aplicamos los filtros
        if ($search)
        {
            switch ($filter)
            {
                case 'id':
                    // Buscamos por ID
                    $query = $query->where('id', $search);
                    break;
                case 'correo':
                    // Buscamos por correo
                    $query = $query->like('correo', $search);
                    break;
                case 'nombre':
                    // Buscamos por nombre o apellidos
                    $query = $query->groupStart()
                            ->like('nombre', $search)
                            ->orLike('apellidos', $search)
                            ->groupEnd();
                    break;
                case 'all':
                default:
                    // Buscamos en todos los campos relevantes
                    // GroupEnd Y GroupStart nos permite agrupar varios LIKE, y 
                    // para que haga este tipo de consulta, debemos indicar la query
                    // diciendo donde empieza y donde acaba esta parte de LIKE
                    $query = $query->groupStart()
                            ->like('id', $search)
                            ->orLike('correo', $search)
                            ->orLike('nombre', $search)
                            ->orLike('apellidos', $search)
                            ->groupEnd();
                    break;
            }
        }

        // Ordenamos y paginamos
        $usuarios = $query->orderBy($order_by, $direction)->paginate(25);

        // Obtenemos el paginador y configuramos reuseQueryString
        $pager = $userModel->pager;
        $pager->setPath('/admin');
        $pager->reuseQueryString = true; // Reutilizamos los parámetros de consulta en los enlaces de paginación

        $data = [
            'usuarios' => $usuarios,
            'pager' => $pager,
            'order_by' => $order_by,
            'direction' => $direction,
            'search' => $search,
            'filter' => $filter
        ];

        // Una vez está todo filtrado, recargamos la vista admin con los nuevos datos a filtrar
        return view('admin', $data);
    }

    /**
     * Actualiza los datos de un usuario. Busca el usuario por id y reasigna 
     * valores editando sus datos.
     * @param type $id
     * @return type
     * @throws \CodeIgniter\Exceptions\PageNotFoundException
     */
    public function editar($id)
    {
        // Creamos un objeto de model, con los campos que vamos a consultar a seguir
        $userModel = new UserModel();

        // Buscamos el id de un usuario que corresponda con ese id
        $usuario = $userModel->find($id);

        // Si la variable usuario es false, es decir, que está vacía, el usuario
        // no existe, portanto lanzamos un error avisando al usuario que ese 
        // usuario con id tal no se ha encontrado
        if (!$usuario)
        {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Usuario con ID $id no encontrado");
        }

        // Formateamos la fecha para el formato de gente normal, que es dd-mm-aaaa 
        $usuario['fecha_nacimiento'] = date('d-m-Y', strtotime($usuario['fecha_nacimiento']));

        // En caso contrario asumimos que se encontró un usuario con dicho id, 
        // portanto pasamos a retornar a $data todo lo que tenemos de ese $usuario
        $data = [
            'usuario' => $usuario
        ];

        // Por fin, recargamos la vista de editar_usuario y actualizamos los datos
        return view('editar_usuario', $data);
    }

    /**
     * Recoge los cambios realizados en el formulario de editar usuario, y los 
     * procesa, actualizando a los nuevos datos
     * @return type
     */
    public function guardar()
    {
        $validation = \Config\Services::validation();

        // Obtén el ID del usuario desde el formulario
        $id = $this->request->getPost('id');

        // Agregar 'id' al array de datos de validación
        $data = [
            'id' => $id,
            'nombre' => $this->request->getPost('nombre'),
            'apellidos' => $this->request->getPost('apellidos'),
            'correo' => $this->request->getPost('correo'),
            'fecha_nacimiento' => $this->request->getPost('fecha_nacimiento'),
            'estado' => $this->request->getPost('estado'),
            'id_rol' => $this->request->getPost('id_rol'),
        ];

        // Validamos los datos que se pasan al formulario, para respetar los 
        // minimos requeridos iguales a los de creacion de cuenta
        $validationRules = [
            'id' => 'required|integer',
            'nombre' => 'required|min_length[3]|max_length[30]',
            'apellidos' => 'required|min_length[3]|max_length[50]',
            'correo' => 'required|valid_email|is_unique[usuario.correo,id,{id}]',
            'fecha_nacimiento' => [
                'rules' => 'required|valid_date[d-m-Y]|date_greater_than_equal[01-01-1900]|date_less_than_equal[' . date('d-m-Y') . ']',
                'errors' => [
                    'date_greater_than_equal' => 'La fecha de nacimiento debe ser igual o mayor que 01-01-1900.',
                    'date_less_than_equal' => 'La fecha de nacimiento no puede ser en el futuro.',
                ],
            ],
            'estado' => 'required|in_list[0,1]',
            'id_rol' => 'required|in_list[1,2]',
        ];
        
        // comprobamlos que la validacion que definimos se ejecuta y comprobamos
        // que está cumpliendo con los minimos exigidos.
        if (!$validation->setRules($validationRules)->run($data))
        {
            // Si no cumple con los minimos exigidos en la validacion, 
            // redireccionamos el usuario
            return redirect()->back()->withInput()->with('validation', $validation);
        }

        // Convertimos la fecha de nacimiento
        $fecha_nacimiento_input = $data['fecha_nacimiento'];
        $fecha_nacimiento_obj = \DateTime::createFromFormat('d-m-Y', $fecha_nacimiento_input);

        // Validamos que la fecha introducida es correcta
        if (!$fecha_nacimiento_obj)
        {
            return redirect()->back()->withInput()->with('error', 'Formato de fecha incorrecto.');
        }

        $fecha_nacimiento_formateada = $fecha_nacimiento_obj->format('Y-m-d');

        // Procesamos los datos y los actualizamos finalmente
        $updateData = [
            'nombre' => $data['nombre'],
            'apellidos' => $data['apellidos'],
            'correo' => $data['correo'],
            'fecha_nacimiento' => $fecha_nacimiento_formateada,
            'estado' => $data['estado'],
            'id_rol' => $data['id_rol'],
        ];

        // Creamos un nuevo objeto de usermodel, para meter los nuevos datos
        $userModel = new UserModel();
        if ($userModel->update($id, $updateData))
        {
            // Si sale todo bien, redireccionamos el usuario a /admin con los datos actualizados
            return redirect()->to('/admin')->with('success', 'Usuario actualizado correctamente.');
        }
        else
        {
            // Si sale algo mal, recargamos y decimos que hubo un error
            return redirect()->back()->withInput()->with('error', 'No se pudo actualizar el usuario.');
        }
    }
}
