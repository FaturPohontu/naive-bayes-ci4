<?php

namespace App\Controllers;

use App\Models\DatasetModel;
use App\Models\HistoryModel;
use Phpml\Classification\NaiveBayes;
use Dompdf\Dompdf;

class PredictionController extends BaseController
{
    // 1. Tampilkan Halaman Form
    public function index()
    {
        // 
        return view('prediction/form');
    }

    // 2. Proses Hitung (Inti Sistem)
    public function process()
    {
        // A. Ambil Input User dari Form
        $input = [
            $this->request->getPost('cuaca'),
            $this->request->getPost('hari'),
            $this->request->getPost('pembeli'),
            $this->request->getPost('promosi')
        ];

        // B. Ambil Data Latih dari Database (Dataset Excel)
        $model = new DatasetModel();
        $trainingData = $model->findAll();

        $samples = [];
        $targets = [];

        // Pisahkan Fitur (X) dan Target (Y)
        foreach ($trainingData as $row) {
            $samples[] = [$row['cuaca'], $row['hari'], $row['pembeli'], $row['promosi']];
            $targets[] = $row['penjualan'];
        }

        // C. TRAINING: Suruh PHP-ML belajar dari data tersebut
        $classifier = new NaiveBayes();
        $classifier->train($samples, $targets);

        // D. PREDIKSI: Tebak input user berdasarkan hasil belajar tadi
        $hasil = $classifier->predict($input);

        // E. SIMPAN: Masukkan ke history agar bisa dicetak
        $historyModel = new HistoryModel();
        $historyModel->save([
            'input_data'     => json_encode($input),
            'hasil_prediksi' => $hasil,
            'tanggal'        => date('Y-m-d H:i:s')
        ]);
        
        $id_history = $historyModel->getInsertID(); // Ambil ID data barusan

        // F. TAMPILKAN HASIL
        return view('prediction/result', [
            'input' => $input,
            'hasil' => $hasil,
            'id_history'    => $id_history
        ]);
    }

    // 3. Fitur Cetak PDF
    public function printPdf($id)
    {
        $model = new HistoryModel();
        $data = $model->find($id);

        // Panggil library Dompdf
        $dompdf = new Dompdf();
        
        // Load tampilan HTML khusus PDF
        $html = view('prediction/pdf_view', ['data' => $data]);
        
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
        
        // Download file
        $dompdf->stream("Hasil_Prediksi.pdf", ["Attachment" => true]);
    }
}