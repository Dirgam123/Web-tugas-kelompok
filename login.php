<?php

$login_message = "";

include "service/database.php";
session_start();

if (isset($_SESSION["is_login"])) {
    header("location: dashboard.php");
}

if (isset($_POST['login'])) {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    
    if (empty($username) || empty($password)) {
        $login_message = "Username dan password harus diisi.";
    } else {
        $hash_password = hash('sha256', $password);
        $stmt = $db->prepare("SELECT * FROM users WHERE username=? AND password=?");
        $stmt->bind_param("ss", $username, $hash_password);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $data = $result->fetch_assoc();
            $_SESSION["username"] = $data["username"];
            $_SESSION["is_login"] = true;
            header("location: dashboard.php");
        } else {
            $login_message = "Akun tidak ada, cek username dan password.";
        }

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
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="min-h-screen flex items-center justify-center">
        <div class="bg-white p-8 rounded-lg shadow-lg max-w-md w-full">
            <h2 class="text-3xl font-bold text-center text-blue-700 mb-6">Login</h2>

            <?php if (!empty($login_message)): ?>
                <div class="bg-red-100 text-red-700 p-4 rounded-lg mb-6">
                    <?= htmlspecialchars($login_message) ?>
                </div>
            <?php endif; ?>

            <form action="login.php" method="POST">
                <div class="mb-4">
                    <label for="username" class="block text-gray-700 font-bold mb-2">Username:</label>
                    <input type="text" id="username" name="username" placeholder="Enter your username" required
                        class="w-full p-4 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500">
                </div>

                <div class="mb-6">
                    <label for="password" class="block text-gray-700 font-bold mb-2">Password:</label>
                    <input type="password" id="password" name="password" placeholder="Enter your password" required
                        class="w-full p-4 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500">
                </div>

                <div class="mb-6">
                    <button type="submit" name="login"
                        class="w-full bg-blue-500 text-white py-3 px-4 rounded-lg hover:bg-blue-600 transition duration-300">
                        Masuk Sekarang
                    </button>
                </div>
            </form>

            <p class="text-gray-500 text-center">Belum punya akun? 
                <a href="register.php" class="text-blue-500 hover:underline">Daftar disini</a>.
            </p>
        </div>
    </div>

    <?php include "layout/footer.html"; ?>
</body>
</html>
