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
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f0f0;
        }
        .profile-container {
            max-width: 800px;
            margin: 50px auto;
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .profile-picture {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            overflow: hidden;
        }
        .profile-picture img {
            width: 100%;
            height: auto;
        }
        .profile-info {
            margin-top: 20px;
        }
        .profile-info h2 {
            margin: 0;
            font-size: 28px;
            color: #333;
        }
        .profile-info p {
            margin: 10px 0;
            color: #666;
        }
        .edit-container {
            max-width: 800px;
            margin: 50px auto;
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .edit-container h2 {
            text-align: center;
            margin-bottom: 20px;
            font-size: 28px;
            color: #333;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            font-weight: bold;
        }
        .form-group input, .form-group textarea {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }
        .form-group textarea {
            resize: vertical;
        }
        .form-actions {
            text-align: center;
            margin-top: 20px;
        }
        .form-actions input[type="submit"] {
            padding: 10px 20px;
            border: none;
            background-color: #28a745;
            color: white;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
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