<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<div class="container text-center mt-5">
    <div class="card col-md-6 mx-auto shadow">
        <div class="card-body">
            <h3>Hasil Prediksi Penjualan:</h3>
            
            <?php if($hasil == 'Tinggi'): ?>
                <h1 class="text-success fw-bold">TINGGI</h1>
            <?php else: ?>
                <h1 class="text-danger fw-bold">RENDAH</h1>
            <?php endif; ?>

            <hr>
            <p>Berdasarkan data input: <?= json_encode($input) ?></p>
            
            <a href="<?= base_url('/') ?>" class="btn btn-secondary">Cek Lagi</a>
            <a href="<?= base_url('prediction/pdf/' . $id_history) ?>" class="btn btn-danger">Download PDF</a>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>