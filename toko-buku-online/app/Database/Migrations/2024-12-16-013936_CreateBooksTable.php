<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateBooksTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_buku' => [
                'type' => 'INT',
                'constraint' => 11,
                'auto_increment' => true,
            ],
            'judul' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'pengarang' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'penerbit' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'tahun' => [
                'type' => 'INT',
                'constraint' => 5,
            ],
            'cover' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'harga' => [
                'type' => 'INT',
                'constraint' => 16,
            ]
        ]);

        $this->forge->addKey('id_buku', true);
        $this->forge->createTable('books');
    }

    public function down()
    {
        $this->forge->dropTable('books');
    }
}
