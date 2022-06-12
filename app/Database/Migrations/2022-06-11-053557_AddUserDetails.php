<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddUserDetails extends Migration
{
    public function up()
    {
        /**
         * Address,
         * Phone,
         * Date of Birth,
         * Website,
         * Facebook,
         * Twitter,
         * Instagram,
         */
        
        $this->forge->addField([
            'user_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'null' => false,
            ],

            'address' => [
                'type' => 'VARCHAR',
                'constraint' => 128,
                'null' => true,
            ],

            'phone' => [
                'type' => 'VARCHAR',
                'constraint' => 128,
                'null' => true,
            ],

            'date_of_birth' => [
                'type' => 'DATE',
                'null' => true,
            ],

            'website' => [
                'type' => 'VARCHAR',
                'constraint' => 128,
                'null' => true,
            ],

            'facebook' => [
                'type' => 'VARCHAR',
                'constraint' => 128,
                'null' => true,
            ],

            'twitter' => [
                'type' => 'VARCHAR',
                'constraint' => 128,
                'null' => true,
            ],
            

            'instagram' => [
                'type' => 'VARCHAR',
                'constraint' => 128,
                'null' => true,
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
        
        $this->forge->createTable('user_details');
        
        $sql = "ALTER TABLE user_details
                ADD CONSTRAINT user_id_fk
                FOREIGN KEY (user_id) REFERENCES user(id)
                ON DELETE CASCADE ON UPDATE CASCADE";

        $this->db->simpleQuery($sql);
    }

    public function down()
    {
        $this->forge->dropForeignKey('user_details', 'user_id_fk');
        $this->forge->dropTable('user_details');
    }
}
