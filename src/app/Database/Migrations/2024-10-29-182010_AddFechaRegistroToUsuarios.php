<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddFechaRegistroToUsuarios extends Migration {

    public function up() {
        $this->forge->addColumn('usuarios', [
            'fecha_registro' => [
                'type' => 'DATETIME',
                'null' => false,
                'default' => 'CURRENT_TIMESTAMP',
            ],
        ]);
    }

    public function down() {
        $this->forge->dropColumn('usuarios', 'fecha_registro');
    }
}
