<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Laba extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'                    => [
                'type'              => 'int',
                'constraint'        => 11,
                'unsigned'          => true,
                'auto_increment'     => true,
            ],
            'laba_time'             => [
                'type'              => 'date',
            ],
            'acara_berita'          => [
                'type'              => 'varchar',
                'constraint'        => 255,
            ],
            'nominal'               => [
                'type'              => 'int',
                'constraint'        => 11,
            ]
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('laba');
    }

    public function down()
    {
        $this->forge->dropTable('laba');
    }
}
