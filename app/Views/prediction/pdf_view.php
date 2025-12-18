<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Laporan Hasil Prediksi</title>
    <style>
        body { font-family: sans-serif; }
        h2, h3 { text-align: center; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #333; padding: 8px; text-align: left; }
        .hasil-box { 
            background-color: #f8f9fa; 
            padding: 20px; 
            text-align: center; 
            margin-top: 30px; 
            border: 2px dashed #333; 
        }
        .text-danger { color: #dc3545; }
        .text-success { color: #198754; }
    </style>
</head>
<body>
    
    <h2>LAPORAN PREDIKSI CAFE</h2>
    <hr>
    <p><strong>Tanggal Cetak:</strong> <?= $data['tanggal'] ?></p>

    <h3>Detail Input:</h3>
    <?php $input = json_decode($data['input_data'], true); ?>
    
    <table>
        <thead>
            <tr style="background-color: #ddd;">
                <th>Parameter</th>
                <th>Nilai Input</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Cuaca</td>
                <td><?= $input[0] ?></td>
            </tr>
            <tr>
                <td>Hari</td>
                <td><?= $input[1] ?></td>
            </tr>
            <tr>
                <td>Jenis Pembeli</td>
                <td><?= $input[2] ?></td>
            </tr>
            <tr>
                <td>Status Promosi</td>
                <td><?= $input[3] ?></td>
            </tr>
        </tbody>
    </table>

    <div class="hasil-box">
        <h3>Hasil Prediksi Penjualan:</h3>
        <?php if($data['hasil_prediksi'] == 'Tinggi'): ?>
            <h1 class="text-success"><?= $data['hasil_prediksi'] ?></h1>
        <?php else: ?>
            <h1 class="text-danger"><?= $data['hasil_prediksi'] ?></h1>
        <?php endif; ?>
    </div>

</body>
</html>