<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container text-center mt-5">
    <div class="p-5 mb-4 bg-light rounded-3 shadow-sm">
        <div class="container-fluid py-5">
            <h1 class="display-5 fw-bold">Sistem Prediksi Cafe</h1>
            <p class="col-md-8 fs-4 mx-auto">Selamat datang! Sistem ini menggunakan algoritma Naive Bayes untuk memprediksi tingkat penjualan berdasarkan cuaca dan hari.</p>
            
            <a href="<?= base_url('prediction') ?>" class="btn btn-primary btn-lg" type="button">Mulai Prediksi</a>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>