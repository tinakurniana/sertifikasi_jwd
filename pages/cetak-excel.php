<?php
include 'functions/functions.php';

// Untuk export Excel
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Data.xls");

$data = tampilData("SELECT * FROM pembiayaan");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <title>Cetak PDF</title>
</head>

<body>
    <table class="table table-bordered">
        <thead>
            <tr>
                <td>No.</td>
                <td>Nama Pembiayaan</td>
                <td>Jumlah Bulan</td>
                <td>Total Biaya</td>
                <td>Biaya Perbulan</td>
            </tr>
        </thead>
        <tbody>
            <h3 align='center' style="margin-bottom: 25px;">Data Pemesanan</h3>
            <?php
            $i = 1;
            foreach ($data as $row) :
            ?>
                <tr>
                    <td><?= $i; ?></td>
                    <td><?= $row['nama_pembiayaan']; ?></td>
                    <td><?= $row['jumlah_bulan']; ?></td>
                    <td><?= "Rp " . number_format($row['total_biaya'], 2, ",", "."); ?></td>
                    <td>
                        <?php
                        $biaya_per_bulan = ($row['total_biaya'] / $row['jumlah_bulan']) + 25000;
                        echo 'Rp ' . number_format($biaya_per_bulan, 2, ",", ".");
                        ?>
                    </td>
                </tr>
            <?php
                $i++;
            endforeach;
            ?>
        </tbody>
    </table>
</body>

</html>