<?php
session_start();
if (isset($_POST['logout'])) {
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
    <title>Zero Carbon & Renewable Energy</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body class="bg-white text-gray-800">

    <?php include "layout/headerlogin.html"; ?>

    <section class="bg-green-600 text-white text-center py-20">
        <div class="container mx-auto">
            <h1 class="text-5xl font-bold mb-4">
                Towards Zero Carbon Future
            </h1>
            <p class="mb-8 text-lg">
                Committed to reducing carbon emissions and promoting renewable energy for a cleaner, greener planet.
            </p>

        </div>
    </section>

<section class="py-20 bg-gray-50">
    <div class="container mx-auto text-center">
        <h2 class="text-4xl font-bold mb-8">Our Contributions to a Sustainable Future</h2>
        <p class="text-lg mb-12 text-gray-700">
            We believe that education and awareness are key to achieving a sustainable future. By empowering individuals and businesses with the knowledge and tools they need to make greener choices, we aim to drive global change.
        </p>
        <div class="flex flex-col md:flex-row justify-center space-y-8 md:space-y-0 md:space-x-8">

            <div class="w-full md:w-1/3 bg-white p-6 rounded-lg shadow-lg hover:shadow-2xl transition duration-300">
                <i class="fas fa-leaf text-green-500 text-4xl mb-4"></i>
                <h3 class="text-2xl font-bold mb-2">
                    Reducing Carbon Footprint
                </h3>
                <p class="text-gray-700">
                    We educate the public on how to minimize their carbon footprint through energy-efficient solutions and lifestyle changes that reduce emissions.
                </p>
            </div>

            <div class="w-full md:w-1/3 bg-white p-6 rounded-lg shadow-lg hover:shadow-2xl transition duration-300">
                <i class="fas fa-solar-panel text-yellow-500 text-4xl mb-4"></i>
                <h3 class="text-2xl font-bold mb-2">
                    Renewable Energy Solutions
                </h3>
                <p class="text-gray-700">
                    Our mission is not only to offer renewable energy sources like solar and wind but also to educate society on how these solutions contribute to long-term sustainability.
                </p>
            </div>

            <div class="w-full md:w-1/3 bg-white p-6 rounded-lg shadow-lg hover:shadow-2xl transition duration-300">
                <i class="fas fa-recycle text-blue-500 text-4xl mb-4"></i>
                <h3 class="text-2xl font-bold mb-2">
                    Green Initiatives
                </h3>
                <p class="text-gray-700">
                    Through our green initiatives, we promote community engagement and educate individuals on the importance of reducing waste, conserving resources, and adopting sustainable habits.
                </p>
            </div>
        </div>
    </div>
</section>

<section class="py-20 bg-green-100">
    <div class="container mx-auto text-center">
        <h2 class="text-4xl font-bold mb-8">Join Our Community for a Greener Future</h2>
        <p class="text-lg mb-12 text-gray-700">
            We believe that collective action is essential in the fight against climate change. Our community of environmentally conscious individuals and businesses comes together to discuss, share ideas, and work on solutions to create a sustainable future.
        </p>
        <div class="text-center">
            <h3 class="text-2xl font-bold mb-4">Why Join Our Community?</h3>
            <ul class="list-disc list-inside text-left inline-block">
                <li class="mb-2 text-gray-700">Participate in discussions about renewable energy and carbon reduction strategies.</li>
                <li class="mb-2 text-gray-700">Collaborate on green initiatives and community projects to make a local and global impact.</li>
                <li class="mb-2 text-gray-700">Stay informed with the latest developments in sustainability practices and technologies.</li>
                <li class="mb-2 text-gray-700">Engage with experts and leaders in the field of renewable energy and climate change.</li>
            </ul>
            <p class="mt-6 text-gray-700">Together, we can make a difference. Join us today and be part of the solution!</p>
            <a href="community.php" class="mt-8 inline-block bg-green-600 text-white py-2 px-6 rounded-lg hover:bg-green-700 transition duration-300">Join Our Community</a>
        </div>
    </div>
</section>

            </div>
        </div>
    </section>



    <?php include "layout/footer.html"; ?>

</body>
</html>
