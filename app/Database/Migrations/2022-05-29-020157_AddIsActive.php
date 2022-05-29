<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddIsActive extends Migration
{
    public function up()
    {
        $this->forge->addColumn('user', [
            'is_active' => [
                'type' => 'BOOLEAN',
                'null' => false,
                'default' => false,
            ],
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('user', 'is_active');
    }
}
