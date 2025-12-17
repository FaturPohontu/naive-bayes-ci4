<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class InitSistem extends Migration
{
    public function up()
    {
        // 1. TABEL DATASET (Untuk Training Naive Bayes)
        $this->forge->addField([
            'id_dataset' => ['type' => 'INT', 'auto_increment' => true],
            'cuaca'      => ['type' => 'VARCHAR', 'constraint' => 50],
            'hari'       => ['type' => 'VARCHAR', 'constraint' => 50],
            'pembeli'    => ['type' => 'VARCHAR', 'constraint' => 50],
            'promosi'    => ['type' => 'VARCHAR', 'constraint' => 50],
            'penjualan'  => ['type' => 'VARCHAR', 'constraint' => 50], // Target (Tinggi/Rendah)
        ]);
        $this->forge->addPrimaryKey('id_dataset');
        $this->forge->createTable('dataset');

        // 2. TABEL HISTORY (Untuk Menyimpan Hasil Prediksi User)
        $this->forge->addField([
            'id_history'    => ['type' => 'INT', 'auto_increment' => true],
            'input_data'    => ['type' => 'TEXT'], // Pilihan user disimpan disini (JSON)
            'hasil_prediksi'=> ['type' => 'VARCHAR', 'constraint' => 50],
            'tanggal'       => ['type' => 'DATETIME'],
        ]);
        $this->forge->addPrimaryKey('id_history');
        $this->forge->createTable('history');

        // 3. TABEL USERS (Untuk Login)
        $this->forge->addField([
            'id'       => ['type' => 'INT', 'auto_increment' => true],
            'username' => ['type' => 'VARCHAR', 'constraint' => 100],
            'password' => ['type' => 'VARCHAR', 'constraint' => 255],
            'nama'     => ['type' => 'VARCHAR', 'constraint' => 100],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('users');
    }

    public function down()
    {
        $this->forge->dropTable('users');
        $this->forge->dropTable('history');
        $this->forge->dropTable('dataset');
    }
}