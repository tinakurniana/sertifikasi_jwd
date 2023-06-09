<?php
include 'functions/functions.php';

if (isset($_POST['btn-tambah'])) {
    tambahData($_POST);
}
?>

<div class="container mt-4">
    <h1>Form Tambah Data</h1>
    <form method="POST" class="mt-4">
        <div class="form-group row">
            <label for="nama_pembiayaan" class="col-sm-2 col-form-label">Nama Pembiayaan</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="nama_pembiayaan" name="nama_pembiayaan" placeholder="Masukan nama pembiayaan" required>
            </div>
        </div>
        <div class="form-group row">
            <label for="jumlah_bulan" class="col-sm-2 col-form-label">Jumlah Bulan</label>
            <div class="col-sm-10">
                <input type="number" min="0" class="form-control" id="jumlah_bulan" name="jumlah_bulan" placeholder="Masukan jumlah bulan" required>
            </div>
        </div>
        <div class="form-group row">
            <label for="total_biaya" class="col-sm-2 col-form-label">Total Biaya</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="total_biaya" name="total_biaya" placeholder="Masukan total biaya" required>
            </div>
        </div>
        <div class="d-flex justify-content-end">
            <button type="submit" class="btn btn-primary" name="btn-tambah">Tambah Data</button>
        </div>
        <div class="d flex justify-content-start">
            <a href="index.php?p=kelola-pembiayaan" class="btn btn-warning">Kembali</a>
        </div>
    </form>
</div>