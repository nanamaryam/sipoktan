<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Comodity extends Migration
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
            'comodity'                => [
                'type'              => 'varchar',
                'constraint'        => 255,
            ],
            'status'                => [
                'type'              => 'varchar',
                'constraint'        => 255,
            ]
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('comodity');
    }

    public function down()
    {
        $this->forge->dropTable('comodity');
    }
}