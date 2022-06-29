<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Karyawan extends Migration
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
            'nama_karyawan'         => [
                'type'              => 'varchar',
                'constraint'        => 255,
            ],
            'foto_karyawan'         => [
                'type'              => 'varchar',
                'constraint'        => 255,
            ],
            'id_kebun'              => [
                'type'              => 'int',
                'constraint'        => 11,
                'unsigned'          => true,
            ],
            'status'                => [
                'type'              => 'varchar',
                'constraint'        => 255,
            ],
            'alamat'                => [
                'type'              => 'varchar',
                'constraint'        => 255,
            ],
            'date_gabung'           => [
                'type'              => 'date',
            ],
            'pen_terakhir'          => [
                'type'              => 'varchar',
                'constraint'        => 255,
            ]
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('id_kebun', 'kebun', 'id');
        $this->forge->createTable('karyawan');
    }

    public function down()
    {
        $this->forge->dropTable('karyawan');
    }
}
