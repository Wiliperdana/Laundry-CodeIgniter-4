<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Paket extends Migration
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
            'id_outlet' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
            'jenis' => [
                'type' => 'ENUM("kiloan","selimut","bed_cover","kaos","lainnya")',
            ],
            'nama_paket' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'harga' => [
                'type' => 'INT',
                'constraint' => 11,
            ]
        ]);

        // primary key
        $this->forge->addKey('id', true);

        // create table
        $this->forge->createTable('tb_paket');
    }

    public function down()
    {
        // drop table
        $this->forge->dropTable('tb_paket');
    }
}
