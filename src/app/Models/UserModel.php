<?php

namespace App\Models;

use CodeIgniter\Model;

/*
 * Clase que instancia los datos del usuario en la tabla de usuarios
 */

class UserModel extends Model {

    protected $table = 'usuario';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'id_rol',
        'estado',
        'nombre',
        'apellidos',
        'correo',
        'fecha_nacimiento',
        'contrasena',
        'fecha_registro',
        'foto_perfil',
        'created_at',
        'updated_at'
    ];
    protected $useTimestamps = true;
    protected $createdField = 'fecha_registro';
    protected $updatedField = 'updated_at';
    protected $dateFormat = 'datetime';

    /**
     * Método que obtiene todos los datos de un usuario por id
     * @param type $id
     * @return type
     */
    public function getUserById($id)
    {
        return $this->where('id', $id)->first();
    }

    /*
     * Método que desactiva un usuario, cambiando su estado
     */

    public function desactivarCuenta($user_id)
    {
        return $this->update($user_id, ['estado' => 0]);
    }
}
