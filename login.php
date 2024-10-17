<?php

$login_message = "";

include "service/database.php";
session_start();

if(isset($_SESSION["is_login"])){
    header("location: dashboard.php");
}

if(isset($_POST['login'])) {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    
    // Check if username and password are provided
    if (empty($username) || empty($password)) {
        $login_message = "Username dan password harus diisi.";
    } else {
        // Hash the password
        $hash_password = hash('sha256', $password);

        // Use a prepared statement to prevent SQL injection
        $stmt = $db->prepare("SELECT * FROM users WHERE username=? AND password=?");
        $stmt->bind_param("ss", $username, $hash_password);
        $stmt->execute();
        $result = $stmt->get_result();

        // Check if the user exists
        if($result->num_rows > 0){
            $data = $result->fetch_assoc();
            $_SESSION["username"] = $data["username"];
            $_SESSION["is_login"] = true;
            
            // Redirect to the dashboard page
            header("location: dashboard.php");
        } else {
            $login_message = "Akun tidak ada, cek username dan password.";
        }

        // Close the statement and database connection
        $stmt->close();
        $db->close();
    }
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
    <h3>masuk</h3>
    <i><?= $login_message ?></i>
    <form action="login.php" method="POST">
        <input type="text" placeholder="username" name="username"/>
        <input type="password" placeholder="password" name="password"/>
        <button type="submit" name="login">masuk sekarang</button>
    </form>

             <?php include "layout/footer.html" ?>
             </div>
</body>
</html>