<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class User extends Migration
{
    public function up()
    {
        // structure
        $this->forge->addField([
            'id' => [
                'type'=> 'INT',
                'constraint' => 11,
                'auto_increment' => true
            ],
            'nama' => [
                'type' => 'VARCHAR',
                'constraint' => '100'
            ],
            'username' => [
                'type' => 'VARCHAR',
                'constraint' => '30'
            ],
            'password' => [
                'type' => 'TEXT',
            ],
            'id_outlet' => [
                'type' => 'INT',
                'constraint' => 11
            ],
            'role' => [
                'type' => 'ENUM("admin","kasir","owner")'
            ]
        ]);

        // primary key
        $this->forge->addKey('id', true);

        // create table
        $this->forge->createTable('tb_user');
    }

    public function down()
    {
        // drop table
        $this->forge->dropTable('tb_user');
    }
}
