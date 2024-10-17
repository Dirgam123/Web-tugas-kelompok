<?php

include "service/database.php";
session_start();

$register_message = "";

if (isset($_SESSION["is_login"])) {
    header("location: dashboard.php");
    exit();
}

if (isset($_POST['register'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $hash_password = hash('sha256', $password);

    try {
        $stmt = $db->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
        $stmt->bind_param("ss", $username, $hash_password);

        if ($stmt->execute()) {
            $register_message = "Daftar akun berhasil, silahkan login!";
        } else {
            $register_message = "Daftar akun gagal, silahkan coba lagi!";
        }

        $stmt->close();

    } catch (mysqli_sql_exception $e) {
        $register_message = "Username sudah digunakan: " . $e->getMessage();
    }

    $db->close();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="login-container">
        <?php include "layout/header.html" ?>
    <h3>daftar</h3>
    <i><?= $register_message ?></i>
    <form action="register.php" method="POST">
        <input type="text" placeholder="username" name="username"/>
        <input type="text" placeholder="password" name="password"/>
        <button type="submit" name="register">daftar sekarang</button>
    </form>

             <?php include "layout/footer.html" ?>
</div>
            </body>
</html>