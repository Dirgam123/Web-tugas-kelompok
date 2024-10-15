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

</head>
<body>
      <?php include "layout/headerlogin.html" ?>
</body>

<body class="bg-white text-gray-800">
  <header class="bg-blue-900 text-white">
  </header>
  <section class="bg-blue-900 text-white text-center py-20">
   <div class="container mx-auto">
    <h1 class="text-4xl font-bold mb-4">
     Energize Society Reliable Energy
    </h1>
    <p class="mb-8">
     Reliable and affordable energy solutions for a sustainable future.
    </p>

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