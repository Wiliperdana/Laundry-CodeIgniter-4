<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Transaksi extends Migration
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
                'constraint' => 11
            ],
            'kode_invoice' => [
                'type' => 'VARCHAR',
                'constraint' => '100'
            ],
            'id_member' => [
                'type' => 'INT',
                'constraint' => 11
            ],
            'tgl' => [
                'type' => 'DATETIME'
            ],
            'batas_waktu' => [
                'type' => 'DATETIME'
            ],
            'tgl_bayar' => [
                'type' => 'DATETIME'
            ],
            'biaya_tambahan' => [
                'type' => 'INT',
                'constraint' => 11
            ],
            'diskon' => [
                'type' => 'DOUBLE',
            ],
            'pajak' => [
                'type' => 'INT',
                'constraint' => 11
            ],
            'status' => [
                'type' => 'ENUM("baru","proses","selesai","diambil")'
            ],
            'dibayar' => [
                'type'=> 'ENUM("dibayar","belum_dibayar")'
            ],
            'id_user' => [
                'type' => 'INT',
                'constraint' => 11
            ]
        ]);

        // primary key
        $this->forge->addKey('id', true);

        // create table
        $this->forge->createTable('tb_transaksi');
    }

    public function down()
    {
        // drop table
        $this->forge->dropTable('tb_transaksi');
    }
}
