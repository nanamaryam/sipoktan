<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

use function PHPSTORM_META\type;

class Kebun extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'                    => [
                'type'              => 'int',
                'constraint'        => 11,
                'unsigned'          => true,
                'auto_increment'    => true
            ],
            'lokasi'                => [
                'type'              => 'varchar',
                'constraint'        => 255,
            ],
            'luas'                  => [
                'type'              => 'int',
                'constraint'        => 11,
            ],
            'id_satuan'             => [
                'type'              => 'int',
                'constraint'        => 11,
                'unsigned'          => true,
            ],
            'tahun'                 => [
                'type'              => 'date'
            ],
            'jenis_tanaman'         => [
                'type'              => 'varchar',
                'constraint'        => 255,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('id_satuan', 'satuan', 'id');
        $this->forge->createTable('kebun');
    }

    public function down()
    {
        $this->forge->dropTable('kebun');
    }
}
