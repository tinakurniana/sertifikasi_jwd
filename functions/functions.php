<?php
$host = 'localhost';
$username = 'root';
$password = '';
$dbname = 'sertifikasi-jwd';

$conn = mysqli_connect($host, $username, $password, $dbname);

function tampilData($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function tambahData($data)
{
    global $conn;
    $nama_pembiayaan = htmlspecialchars($data['nama_pembiayaan']);
    $jumlah_bulan = htmlspecialchars($data['jumlah_bulan']);
    $total_biaya = htmlspecialchars($data['total_biaya']);

    $query = "INSERT INTO pembiayaan VALUES ('', '$nama_pembiayaan', '$jumlah_bulan', '$total_biaya')";
    if (mysqli_query($conn, $query)) {
        echo '<script>alert("Data Berhasil Disimpan"); location.href = "index.php?p=kelola-pembiayaan";</script>';
    } else {
        echo '<script>alert("Data Gagal Disimpan"); location.href = "index.php?p=kelola-pembiayaan";</script>';
    }
    mysqli_close($conn);
}

function editData($data)
{
    global $conn;
    $id = htmlspecialchars($data['btn-edit']);
    $nama_pembiayaan = htmlspecialchars($data['nama_pembiayaan']);
    $jumlah_bulan = htmlspecialchars($data['jumlah_bulan']);
    $total_biaya = htmlspecialchars($data['total_biaya']);

    $query = "UPDATE pembiayaan SET nama_pembiayaan = '$nama_pembiayaan', jumlah_bulan = '$jumlah_bulan', total_biaya = '$total_biaya' WHERE id = '$id'";

    if (mysqli_query($conn, $query)) {
        echo '<script>alert("Data Berhasil Diedit"); location.href = "index.php?p=kelola-pembiayaan";</script>';
    } else {
        echo '<script>alert("Data Gagal Diedit"); location.href = "index.php?p=kelola-pembiayaan";</script>';
    }
    mysqli_close($conn);
}

function hapusData($data)
{
    global $conn;
    $id = htmlspecialchars($data['btn-hapus']);

    $query = "DELETE FROM pembiayaan WHERE pembiayaan.id = '$id'";

    if (mysqli_query($conn, $query)) {
        echo '<script>alert("Data Berhasil Dihapus"); location.href = "index.php?p=kelola-pembiayaan";</script>';
    } else {
        echo '<script>alert("Data Berhasil Dihapus"); location.href = "index.php?p=kelola-pembiayaan";</script>';
    }
    mysqli_close($conn);
}



?>