<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use phpDocumentor\Reflection\Types\This;

class Salary extends Migration
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
            'id_karyawan'           => [
                'type'              => 'int',
                'constraint'        => 11,
                'unsigned'          => true,
            ],
            'price_salary'          => [
                'type'              => 'int',
                'constraint'        => 11,
            ],
            'status'                => [
                'type'              => 'varchar',
                'constraint'        => 255,
            ]
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('id_karyawan', 'karyawan', 'id');
        $this->forge->createTable('salary');
    }

    public function down()
    {
        $this->forge->dropTable('salary');
    }
}
