<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Tablemahasiswa extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'nim'   => ['type' => 'char', 'constraint' => 9],
            'nama'  => ['type' => 'varchar', 'constraint' => 100],
            'prodi' => ['type' => 'varchar', 'constraint' => 100],
            'email' => ['type' => 'varchar', 'constraint' => 100],
            'gambar' => ['type' => 'varchar', 'constraint' => 100, 'default' => 'default.png'],
        ]);

        $this->forge->addKey('nim', TRUE);
        $this->forge->createTable('tbl_mahasiswa', TRUE);
    }

    public function down()
    {
        $this->forge->dropTable('tbl_mahasiswa');
    }
}
