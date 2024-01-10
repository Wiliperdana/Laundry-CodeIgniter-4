<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Member extends Migration
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
                'type' => 'TEXT',
            ],
            'jenis_kelamin' => [
                'type' => 'ENUM("L","P")',
            ],
            'tlp' => [
                'type' => 'VARCHAR',
                'constraint' => '15'
            ]
        ]);

        // primary key
        $this->forge->addKey('id', true);

        // create table
        $this->forge->createTable('tb_member');
    }

    public function down()
    {
        // drop table
        $this->forge->dropTable('tb_member');
    }
}
