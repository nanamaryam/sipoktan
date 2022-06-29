<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Absensi extends Migration
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
            'user_login'           => [
                'type'              => 'int',
                'constraint'        => 11,
                'unsigned'          => true,
            ],
            'time_sign'             => [
                'type'              => 'varchar',
                'constraint'        => 255,
            ],
            'date_time'             => [
                'type'              => 'varchar',
                'constraint'        => 255,
            ],
            'keterangan'            => [
                'type'              => 'varchar',
                'constraint'        => 255,
            ]
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('user_login', 'users', 'id');
        $this->forge->createTable('absensi');
    }

    public function down()
    {
        $this->forge->dropTable('absensi');
    }
}
