<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddFechaRegistroToUsuario extends Migration
{
    public function up()
    {
        $this->forge->addColumn('usuario', [
            'fecha_registro' => [
                'type' => 'DATETIME',
                'null' => true,
                'after' => 'contrasena',
            ],
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('usuario', 'fecha_registro');
    }
}
