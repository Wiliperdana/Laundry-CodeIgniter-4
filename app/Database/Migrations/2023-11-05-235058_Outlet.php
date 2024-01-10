<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Outlet extends Migration
{
    public function up()
    {
        // structure
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'auto_increment' => true
            ],
            'nama' => [
                'type' => 'VARCHAR',
                'constraint' => '100'
            ],
            'alamat' => [
                'type' => 'VARCHAR',
                'constraint' => '100'
            ],
            'tlp' => [
                'type' => 'VARCHAR',
                'constraint' => '15'
            ]
        ]);

        // primary key
        $this->forge->addKey('id', true);

        // create table
        $this->forge->createTable('tb_outlet');
    }

    public function down()
    {
        // drop table
        $this->forge->dropTable('tb_outlet');
    }
}
