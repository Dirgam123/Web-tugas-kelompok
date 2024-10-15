<?php
    session_start();
    if(isset($_POST['logout'])){
        session_unset();
        session_destroy();
        header('location: index.php');
    }
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
        $username['username'] = $username;
        $_SESSION['username'] = $username;
            header("Location: profile.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $_SESSION["username"] ?> profile</title>
    <link rel="stylesheet" href="style/style.css">

</head>
<body>
    <?php include "layout/headerlogin.html" ?>
<div class="profile-container">
    <div class="profile-picture">
        <img src="defaultprofile.jpg" alt="defaultprofile.jpg">
    </div>
    <div class="profile-info">
        <h2><?= $_SESSION["username"] ?></h2>
    </div>
        <form action="dashboard.php" method="POST">
        <button type="submit" name="logout">logout</button>
    </form>

</div>
</div>

</body>
</html>