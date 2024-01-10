<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class DetailTransaksi extends Migration
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
            'id_transaksi' => [
                'type' => 'INT',
                'constraint' => 11
            ],
            'id_paket' => [
                'type' => 'INT',
                'constraint' => 11
            ],
            'qty'=> [
                'type'=> 'DOUBLE',
            ],
            'keterangan' => [
                'type' => 'TEXT'
            ]
        ]);

        // primary key
        $this->forge->addKey('id', true);

        // create table
        $this->forge->createTable('tb_detail_transaksi');
    }

    public function down()
    {
        // drop table
        $this->forge->dropTable('tb_detail_transaksi');
    }
}
