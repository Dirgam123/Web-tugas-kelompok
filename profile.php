<?php
session_start();

if (!isset($_SESSION['username'])) {
    header('Location: index.php');
    exit();
}

if (isset($_POST['logout'])) {
    session_unset();
    session_destroy();
    header('Location: index.php');
    exit();
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $_SESSION["username"] ?>'s Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 text-gray-800">

    <?php include "layout/headerlogin.html" ?>

    <div class="container mx-auto py-12">
        <div class="bg-white p-8 rounded-lg shadow-lg max-w-md mx-auto">
            <div class="text-center mb-6">
                <div class="profile-picture mb-4">
                    <img src="defaultprofile.jpg" alt="Profile Picture" class="rounded-full w-32 h-32 mx-auto object-cover">
                </div>
                <div class="profile-info">
                    <h2 class="text-3xl font-bold text-blue-900">Hello, <?= htmlspecialchars($_SESSION["username"]) ?></h2>
                    <p class="text-gray-600 mt-2">Welcome to your profile page!</p>
                </div>
            </div>

            <?php if (isset($message)): ?>
                <div class="bg-green-100 text-green-700 p-4 rounded-lg mb-4">
                    <?= $message ?>
                </div>
            <?php endif; ?>

            <?php if (isset($error)): ?>
                <div class="bg-red-100 text-red-700 p-4 rounded-lg mb-4">
                    <?= $error ?>
                </div>
            <?php endif; ?>




            <form action="" method="POST" class="text-center mt-6">
                <button type="submit" name="logout" class="bg-red-500 text-white py-2 px-6 rounded-lg hover:bg-red-600 transition duration-300">
                    Logout
                </button>
            </form>
        </div>
    </div>

</body>
</html>
