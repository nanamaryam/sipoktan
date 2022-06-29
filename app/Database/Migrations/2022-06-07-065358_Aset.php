<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

use function PHPSTORM_META\type;

class Aset extends Migration
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
            'nama_aset'             => [
                'type'              => 'varchar',
                'constraint'        => 255,
            ],
            'id_kategori'           => [
                'type'              => 'int',
                'constraint'        => 11,
                'unsigned'          => true,
            ],
            'jumlah'                => [
                'type'              => 'int',
                'constraint'        => 11,
            ],
            'id_satuan'             => [
                'type'              => 'int',
                'constraint'        => 11,
                'unsigned'          => true,
            ],
            'harga_satuan'          => [
                'type'              => 'int',
                'constraint'        => 11,
            ]
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('id_kategori', 'kategori', 'id');
        $this->forge->addForeignKey('id_satuan', 'satuan', 'id');
        $this->forge->createTable('aset');
    }

    public function down()
    {
        $this->forge->dropTable('aset');
    }
}
