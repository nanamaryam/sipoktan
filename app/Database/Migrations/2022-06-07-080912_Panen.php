<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Panen extends Migration
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
            'time_today'            => [
                'type'              => 'timestamp',
            ],
            'id_user'           => [
                'type'              => 'int',
                'constraint'        => 11,
                'unsigned'          => true,
            ],
            'id_satuan'           => [
                'type'              => 'int',
                'constraint'        => 11,
                'unsigned'          => true,
            ],
            'harga_perkilo'         => [
                'type'              => 'int',
                'constraint'        => 11,
            ],
            'berat'                 => [
                'type'              => 'int',
                'constraint'        => 11,

            ],
            'pendapatan'            => [
                'type'              => 'int',
                'constraint'        => 11,
            ],
            'ket_panen'             => [
                'type'              => 'varchar',
                'constraint'        => 255,
            ]
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('id_user', 'users', 'id');
        $this->forge->addForeignKey('id_satuan', 'satuan', 'id');
        $this->forge->createTable('panen');
    }

    public function down()
    {
        $this->forge->dropTable('panen');
    }
}
