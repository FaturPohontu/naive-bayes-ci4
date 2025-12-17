<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class DatasetSeeder extends Seeder
{
    public function run()
    {
        // Data Latih dari Excel Anda
        $data = [
            ['cuaca' => 'Cerah',   'hari' => 'Weekend', 'pembeli' => 'Mahasiswa', 'promosi' => 'Ya',    'penjualan' => 'Tinggi'],
            ['cuaca' => 'Berawan', 'hari' => 'Weekday', 'pembeli' => 'Pekerja',   'promosi' => 'Tidak', 'penjualan' => 'Rendah'],
            ['cuaca' => 'Hujan',   'hari' => 'Weekday', 'pembeli' => 'Mahasiswa', 'promosi' => 'Tidak', 'penjualan' => 'Rendah'],
            ['cuaca' => 'Cerah',   'hari' => 'Weekend', 'pembeli' => 'Pekerja',   'promosi' => 'Ya',    'penjualan' => 'Tinggi'],
            ['cuaca' => 'Berawan', 'hari' => 'Weekend', 'pembeli' => 'Mahasiswa', 'promosi' => 'Ya',    'penjualan' => 'Tinggi'],
            ['cuaca' => 'Cerah',   'hari' => 'Weekday', 'pembeli' => 'Pekerja',   'promosi' => 'Tidak', 'penjualan' => 'Rendah'],
            ['cuaca' => 'Hujan',   'hari' => 'Weekend', 'pembeli' => 'Mahasiswa', 'promosi' => 'Tidak', 'penjualan' => 'Rendah'],
            ['cuaca' => 'Cerah',   'hari' => 'Weekday', 'pembeli' => 'Mahasiswa', 'promosi' => 'Ya',    'penjualan' => 'Tinggi'],
            ['cuaca' => 'Berawan', 'hari' => 'Weekday', 'pembeli' => 'Pekerja',   'promosi' => 'Ya',    'penjualan' => 'Tinggi'],
            ['cuaca' => 'Hujan',   'hari' => 'Weekday', 'pembeli' => 'Pekerja',   'promosi' => 'Tidak', 'penjualan' => 'Rendah'],
            ['cuaca' => 'Cerah',   'hari' => 'Weekend', 'pembeli' => 'Pekerja',   'promosi' => 'Tidak', 'penjualan' => 'Tinggi'],
            ['cuaca' => 'Berawan', 'hari' => 'Weekday', 'pembeli' => 'Mahasiswa', 'promosi' => 'Ya',    'penjualan' => 'Tinggi'],
            ['cuaca' => 'Hujan',   'hari' => 'Weekend', 'pembeli' => 'Pekerja',   'promosi' => 'Ya',    'penjualan' => 'Tinggi'],
            ['cuaca' => 'Cerah',   'hari' => 'Weekend', 'pembeli' => 'Mahasiswa', 'promosi' => 'Tidak', 'penjualan' => 'Tinggi'],
            ['cuaca' => 'Berawan', 'hari' => 'Weekday', 'pembeli' => 'Pekerja',   'promosi' => 'Tidak', 'penjualan' => 'Rendah'],
        ];

        $this->db->table('dataset')->insertBatch($data);

        // Buat Akun Admin (Password: admin123)
        $this->db->table('users')->insert([
            'username' => 'admin',
            'password' => password_hash('admin123', PASSWORD_DEFAULT),
            'nama'     => 'Administrator'
        ]);
    }
}