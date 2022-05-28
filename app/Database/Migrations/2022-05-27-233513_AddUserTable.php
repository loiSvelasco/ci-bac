<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddUserTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],

            'name' => [
                'type' => 'VARCHAR',
                'constraint' => 128,
            ],

            'email' => [
                'type' => 'VARCHAR',
                'constraint' => 128,
            ],
            
            'password_hash' => [
                'type' => 'VARCHAR',
                'constraint' => 128,
            ],

            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],

            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);

        $this->forge->addPrimaryKey('id')
                    ->addUniqueKey('email');

        $this->forge->createTable('user');
    }

    public function down()
    {
        $this->forge->dropTable('user');
    }
}
