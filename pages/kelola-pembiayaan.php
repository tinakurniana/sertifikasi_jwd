<?php 
include 'functions/functions.php';

$query_tampil = "SELECT * FROM pembiayaan";
$data_pembiayaan = tampilData($query_tampil);

if(isset($_POST['btn-hapus'])) {
    hapusData($_POST);
}
?>


<div class="container mt-4">
    <h2 class="mb-3">Kelola Data Pembiayaan</h2>
    <div class="d-flex bd-highlight mb-3">
        <div class="p-2 bd-highlight">
            <a href="index.php?p=cetak-pdf" target="_blank" class="btn btn-success">Cetak PDF (.pdf)</a>
        </div>
        <div class="p-2 bd-highlight">
            <a href="index.php?p=cetak-excel" class="btn btn-success">Cetak Excel (.xls)</a>
        </div>
        <div class="ml-auto p-2 bd-highlight">
            <a href="index.php?p=form-tambah" class="btn btn-primary">Tambah Data</a>
        </div>
    </div>
    <div class="table-responsive">
        <table id="tabel1" class="display" style="width:100%">
            <thead>
                <tr>
                    <th scope="col">No.</th>
                    <th scope="col">Nama Pembiayaan</th>
                    <th scope="col">Jumlah Bulan</th>
                    <th scope="col">Total Biaya</th>
                    <th scope="col">Biaya per Bulan</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    $i = 1;
                    foreach($data_pembiayaan as $row) :
                 ?> 
                <tr>
                    <td scope="row"><?= $i++; ?></td>
                    <td><?= $row['nama_pembiayaan']; ?></td>
                    <td><?= $row['jumlah_bulan']; ?></td>
                    <td><?= "Rp " . number_format($row['total_biaya'], 2, ",", "."); ?></td>
                    <td>
                        <?php
                            $biaya_per_bulan = ($row['total_biaya'] / $row['jumlah_bulan']) + 25000;
                            echo 'Rp '. number_format($biaya_per_bulan, 2, ",", ".");
                        ?>
                    </td>
                    <td>
                        <div class="btn-group">
                            <a href="index.php?p=form-edit&id=<?= $row['id']; ?>" class="btn btn-warning" name="btn-edit">Edit</a>
                            <form action="" method="POST" enctype="multipart/form-data">
                                <button type="submit" class="btn btn-danger" name="btn-hapus" value="<?= $row['id']; ?>" onclick="return confirm('Yakin Hapus Data?');">Hapus</button>
                            </form>
                        </div>
                    </td>
                </tr>
               <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>