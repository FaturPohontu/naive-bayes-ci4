<?php namespace App\Models;
use CodeIgniter\Model;
class DatasetModel extends Model {
    protected $table = 'dataset';
    protected $allowedFields = ['cuaca', 'hari', 'pembeli', 'promosi', 'penjualan'];
}