<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Keluar extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'                    => [
                'type'              => 'int',
                'constraint'        => 11,
                'unsigned'          => true,
                'auto_increment'    => true,
            ],
            'date_keluar'           => [
                'type'              => 'timestamp'
            ],
            'id_aset'               => [
                'type'              => 'int',
                'constraint'        => 11,
                'unsigned'          => true,
            ],
            'jumlah_keluar'         => [
                'type'              => 'int',
                'constraint'        => 11,
            ],
            'ket_keluar'            => [
                'type'              => 'varchar',
                'constraint'        => 255,
            ]
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('id_aset', 'aset', 'id');
        $this->forge->createTable('keluar');
    }

    public function down()
    {
        $this->forge->dropTable('keluar');
    }
}
