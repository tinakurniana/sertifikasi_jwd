<?php
include 'functions/auth-function.php';

// Untuk mengaktifkan session
session_start();

// Jika ada session login, maka masuk  ke halaman index
if (isset($_SESSION["username"])) {
    header("Location: index.php");
}

// Aksi button login akan diarahkan ke function login
if (isset($_POST['submit-login'])) {
    login($_POST);
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>Login Form | Aplikasi Pembiayaan</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="wrapper">
        <div class="title">
            <div class="row">
                <div class="col-12">
                    <img src="images/kominfo.png" alt="" width="150px" class="img-fluid">
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <span>Login Form</span>
                </div>
            </div>
        </div>
        <form action="" method="POST">
            <div class="field">
                <input type="text" name="username" required>
                <label>Username</label>
            </div>
            <div class="field">
                <input type="password" name="password" required>
                <label>Password</label>
            </div>
            <div class="field">
                <input type="submit" name="submit-login" value="Login">
            </div>
        </form>
    </div>
</body>

</html>