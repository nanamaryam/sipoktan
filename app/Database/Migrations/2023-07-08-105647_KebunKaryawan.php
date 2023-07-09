<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class KebunKaryawan extends Migration
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
            'kebun_id'           => [
                'type'              => 'int',
                'constraint'        => 11,
                'unsigned'          => true,
            ],
            'karyawan_id'             => [
                'type'              => 'int',
                'constraint'        => 11,
                'unsigned'          => true,
            ],
            
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('kebun_id', 'kebun', 'id');
        $this->forge->addForeignKey('karyawan_id', 'karyawan', 'id');
        $this->forge->createTable('kebun_karyawan');
    }

    public function down()
    {
        $this->forge->dropTable('kebun_karyawan');
    }
}