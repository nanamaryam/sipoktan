<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Cost extends Migration
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
            'cost_time'             => [
                'type'              => 'date',
            ],
            'berita_acara'          => [
                'type'              => 'varchar',
                'constraint'        => 255,
            ],
            'nominal_cost'          => [
                'type'              => 'int',
                'constraint'        => 11,
            ]
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('cost');
    }

    public function down()
    {
        $this->forge->dropTable('cost');
    }
}
