<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Masuk extends Migration
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
            'date_masuk'            => [
                'type'              => 'timestamp'
            ],
            'id_aset'               => [
                'type'              => 'int',
                'constraint'        => 11,
                'unsigned'          => true,
            ],
            'jumlah_masuk'          => [
                'type'              => 'int',
                'constraint'        => 11,
            ],
            'harga_masuk'           => [
                'type'              => 'int',
                'constraint'        => 11,
            ],
            'ket'                   => [
                'type'              => 'varchar',
                'constraint'        => 255,
            ]
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('id_aset', 'aset', 'id');
        $this->forge->createTable('masuk');
    }

    public function down()
    {
        $this->forge->dropTable('masuk');
    }
}
