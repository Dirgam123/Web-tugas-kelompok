<?php
    session_start();
    if(isset($_POST['logout'])){
        session_unset();
        session_destroy();
        header('location: index.php');
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>
   Energix
  </title>
  <script src="https://cdn.tailwindcss.com">
  </script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&amp;display=swap" rel="stylesheet"/>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <style>
   body {
            font-family: 'Roboto', sans-serif;
        }
  </style>
</head>
<body class="container">
    <h3>Selamat Datang di Smart City, <?= $_SESSION["username"] ?></h3>
    
    <form action="dashboard.php" method="POST">
        <button type="submit" name="logout">logout</button>
    </form>

</body>
<body class="bg-white text-gray-800">
  <header class="bg-blue-900 text-white">
   <div class="container mx-auto flex justify-between items-center py-4 px-6">
    <div class="flex items-center">
     <img alt="Energix Logo" class="mr-3" height="50" src="https://storage.googleapis.com/a1aa/image/0t2oYi0pu3KXOFA4rhIIL2xesp51RO1sOdjip1l8PCiEN3yJA.jpg" width="50"/>
     <span class="text-xl font-bold">
      ENERGIX
     </span>
    </div>
    <nav class="flex space-x-4">
     <a class="hover:text-green-500" href="dashboard.php">
      Home
     </a>
     <a class="hover:text-green-500" href="energymanagement.php">
      Energy Management
     </a>
     <a class="hover:text-green-500" href="community.php">
      Community
     </a>
     <a class="hover:text-green-500" href="profile.php">
      Profile
     </a>

    </nav>
    <div class="flex items-center space-x-4">

     <a class="bg-red-500 text-white px-4 py-2 rounded" href="register.php">
      Register
     </a>
          </a>
     <a class="bg-green-500 text-white px-4 py-2 rounded" href="login.php">
      Login
     </a>
    </div>
   </div>
  </header>
  <section class="bg-blue-900 text-white text-center py-20">
   <div class="container mx-auto">
    <h1 class="text-4xl font-bold mb-4">
     Energize Society Reliable Energy
    </h1>
    <p class="mb-8">
     Reliable and affordable energy solutions for a sustainable future.
    </p>
    <a class="bg-orange-500 text-white px-6 py-3 rounded" href="#">
     Learn More
    </a>
   </div>
  </section>
  <section class="py-20">
   <div class="container mx-auto text-center">
    <div class="flex justify-center space-x-8">
     <div class="w-1/3">
      <i class="fas fa-solar-panel text-green-500 text-4xl mb-4">
      </i>
      <h3 class="text-xl font-bold mb-2">
       Renewable Energy Specialists
      </h3>
      <p>
       Providing top-notch renewable energy solutions.
      </p>
     </div>
     <div class="w-1/3">
      <i class="fas fa-bolt text-green-500 text-4xl mb-4">
      </i>
      <h3 class="text-xl font-bold mb-2">
       Affordable Electrical Services
      </h3>
      <p>
       High-quality electrical services at affordable prices.
      </p>
     </div>
     <div class="w-1/3">
      <i class="fas fa-certificate text-green-500 text-4xl mb-4">
      </i>
      <h3 class="text-xl font-bold mb-2">
       Approved Partner &amp; Installer
      </h3>
      <p>
       Certified and approved installation services.
      </p>
     </div>
    </div>
   </div>
  </section>
    <?php include "layout/footer.html" ?>
</html>