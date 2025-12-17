<?php namespace App\Models;
use CodeIgniter\Model;
class HistoryModel extends Model {
    protected $table = 'history';
    protected $primaryKey = 'id_history';
    protected $allowedFields = ['input_data', 'hasil_prediksi', 'tanggal'];
}