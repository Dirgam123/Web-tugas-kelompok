<?php

include "service/database.php";
session_start();

$register_message = "";

if (isset($_SESSION["is_login"])) {
    header("location: dashboard.php");
    exit();
}

if (isset($_POST['register'])) {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    
    if (empty($username) || empty($password)) {
        $register_message = "Username dan password harus diisi.";
    } else {
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
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Smart City</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">



    <div class="flex items-center justify-center min-h-screen bg-cover bg-center" style="background-image: url('assets/register-bg.jpg');">
        <div class="bg-white bg-opacity-90 p-8 rounded-lg shadow-lg max-w-md w-full">
            <h2 class="text-3xl font-bold text-blue-800 mb-6 text-center">Daftar Akun</h2>
            
            <?php if ($register_message): ?>
                <div class="bg-<?php echo strpos($register_message, 'berhasil') !== false ? 'green' : 'red'; ?>-500 text-white p-4 mb-6 rounded-lg">
                    <?= htmlspecialchars($register_message); ?>
                </div>
            <?php endif; ?>

            <form action="register.php" method="POST" class="space-y-6">
                <div>
                    <label for="username" class="block text-gray-700 font-medium mb-2">Username</label>
                    <input type="text" id="username" name="username" placeholder="Masukkan username" class="w-full p-3 border border-gray-300 rounded-lg" required>
                </div>
                
                <div>
                    <label for="password" class="block text-gray-700 font-medium mb-2">Password</label>
                    <input type="password" id="password" name="password" placeholder="Masukkan password" class="w-full p-3 border border-gray-300 rounded-lg" required>
                </div>
                
                <button type="submit" name="register" class="w-full bg-blue-500 text-white py-3 rounded-lg hover:bg-blue-600 transition duration-300">
                    Daftar Sekarang
                </button>
            </form>

            <p class="mt-6 text-center text-gray-600">
                Sudah punya akun? <a href="login.php" class="text-blue-600 hover:underline">Masuk disini</a>
            </p>
        </div>
    </div>



</body>
</html>
