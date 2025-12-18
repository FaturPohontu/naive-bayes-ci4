<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<div class="container">
    <div class="card shadow-sm col-md-8 mx-auto">
        <div class="card-header bg-white">
            <h4>Prediksi Penjualan Baru</h4>
        </div>
        <div class="card-body">
            <form action="<?= base_url('prediction/process') ?>" method="post">
                
                <div class="mb-3">
                    <label>Cuaca</label>
                    <select name="cuaca" class="form-select">
                        <option value="Cerah">Cerah</option>
                        <option value="Berawan">Berawan</option>
                        <option value="Hujan">Hujan</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label>Hari</label>
                    <select name="hari" class="form-select">
                        <option value="Weekday">Weekday (Senin-Jumat)</option>
                        <option value="Weekend">Weekend (Sabtu-Minggu)</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label>Pembeli Dominan</label>
                    <select name="pembeli" class="form-select">
                        <option value="Mahasiswa">Mahasiswa</option>
                        <option value="Pekerja">Pekerja</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label>Sedang Ada Promosi?</label>
                    <select name="promosi" class="form-select">
                        <option value="Ya">Ya</option>
                        <option value="Tidak">Tidak</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary w-100">Analisis Sekarang</button>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>