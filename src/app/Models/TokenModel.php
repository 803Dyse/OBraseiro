<?php

namespace App\Models;

use CodeIgniter\Model;

/**
 * Clase que guarda, crea, genera y consulta los tokens almacenados en la tabla
 * de tokens
 */
class TokenModel extends Model {

    protected $table = 'tokens_usuario';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'user_id',
        'token',
        'token_expiration',
        'ip_address',
        'tipo_token'
    ];
    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = '';

    /**
     * Crea un nuevo token para el usuario
     */
    public function createToken($userId, $token, $expiration, $ipAddress, $tipo_token)
    {
        log_message('info', "Creando token en la base de datos para user_id={$userId} con tipo_token={$tipo_token}");

        // Intento de insertar el token
        $result = $this->insert([
            'user_id' => $userId,
            'token' => $token,
            'token_expiration' => $expiration,
            'ip_address' => $ipAddress,
            'tipo_token' => $tipo_token
        ]);

        if (!$result)
        {
            // Obtener el error de la base de datos
            $db = \Config\Database::connect();
            $dbError = $db->error();

            log_message('error', 'Error al insertar el token en la base de datos: ' . json_encode($dbError));
            return false;
        }

        log_message('info', 'Token creado exitosamente en la base de datos');
        return true;
    }

    /**
     * Comprueba que el token es valido y si lo es, crea un token
     */
    public function findValidToken($token, $tipo_token)
    {
        return $this->where('token', $token)
                        ->where('tipo_token', $tipo_token)
                        ->where('token_expiration >=', date('Y-m-d H:i:s'))
                        ->first();
    }

    /**
     * Método que elimina un token
     */
    public function deleteToken($token)
    {
        return $this->where('token', $token)->delete();
    }

    /**
     * Método que elimina todos los tokens que UN UNICO usuario ha creado.
     */
    public function deleteTokensByUserId($userId)
    {
        return $this->where('user_id', $userId)->delete();
    }
}
