<?php
include 'functions/auth-function.php';

// Untuk mengaktifkan session
session_start();

// Jika tidak ada session login, maka otomatis kembali ke halaman form login
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
}

// Aksi button logout akan diarahkan ke function logout
if (isset($_POST['btn-logout'])) {
    logout();
}
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <!-- DataTable -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    <script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" class="init">
        $(document).ready(function() {
            var table = $('#tabel1').DataTable({
                pageLength: 5,
                lengthMenu: [
                    [5, 10, 20, -1],
                    [5, 10, 20, 'All']
                ]
            })
        });
    </script>
    <title>Aplikasi Pembiayaan | Tina Kurniana</title>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Aplikasi Pembiayaan</a>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="index.php?p=home">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?p=kelola-pembiayaan">Kelola Data Pembiayaan</a>
                </li>
                <form action="" method="POST">
                    <button type="submit" name="btn-logout" class="btn btn-secondary" onclick="return confirm('Yakin keluar?')">Logout</button>
                </form>
            </ul>
        </div>
    </nav>
    <!-- End Navbar -->

    <!-- Untuk mengatur url pages -->
    <?php
    $pages_dir = 'pages';
    if (!empty($_GET['p'])) {
        $pages = scandir($pages_dir, 0);
        unset($pages[0], $pages[1]);
        $p = $_GET['p'];
        if (in_array($p . '.php', $pages)) {
            include($pages_dir . '/' . $p . '.php');
        } else {
            echo 'Halaman Tidak Ditemukan';
        }
    } else {
        include($pages_dir . '/home.php');
    }
    ?>
</body>

</html>