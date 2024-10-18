<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Smart City - Energy Management</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 text-gray-800">

    <?php include "layout/headerlogin.html"; ?>

    <div class="container mx-auto py-12">
        <h1 class="text-4xl font-bold text-center text-blue-900 mb-10">Energy Management Dashboard</h1>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-10">
            <div class="bg-white shadow-lg p-6 rounded-lg text-center">
                <h2 class="text-2xl font-bold text-blue-600 mb-2">Energy Consumption</h2>
                <p class="text-5xl font-bold text-green-600 mb-4">1000 kWh</p>
                <p class="text-gray-500">Total Energy Consumption</p>
            </div>

            <div class="bg-white shadow-lg p-6 rounded-lg text-center">
                <h2 class="text-2xl font-bold text-blue-600 mb-2">Renewable Energy Source</h2>
                <p class="text-5xl font-bold text-green-600 mb-4">500 kWh</p>
                <p class="text-gray-500">Renewable Energy Source</p>
            </div>

            <div class="bg-white shadow-lg p-6 rounded-lg text-center">
                <h2 class="text-2xl font-bold text-blue-600 mb-2">Solar Energy Production</h2>
                <p class="text-5xl font-bold text-yellow-500 mb-4">200 kWh</p>
                <p class="text-gray-500">Solar Energy Production</p>
            </div>

            <div class="bg-white shadow-lg p-6 rounded-lg text-center">
                <h2 class="text-2xl font-bold text-blue-600 mb-2">Wind Energy Production</h2>
                <p class="text-5xl font-bold text-blue-400 mb-4">300 kWh</p>
                <p class="text-gray-500">Wind Energy Production</p>
            </div>
        </div>

        <div class="mt-12">
            <h2 class="text-3xl font-bold text-center text-blue-900 mb-6">Energy-Saving Tips & Recommendations</h2>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <a href="tip1.html" class="bg-white shadow-lg p-6 rounded-lg text-center hover:bg-blue-50 transition">
                    <img src="tip1.jpg" alt="Energy Efficient Appliances" class="mb-4 h-40 w-full object-cover rounded-lg">
                    <h3 class="text-xl font-bold text-blue-600 mb-2">Use Energy-Efficient Appliances</h3>
                    <p class="text-gray-700">Switching to energy-efficient appliances can reduce your energy consumption by up to 30%.</p>
                </a>

                <a href="tip2.html" class="bg-white shadow-lg p-6 rounded-lg text-center hover:bg-blue-50 transition">
                    <img src="tip2.jpg" alt="Install Solar Panels" class="mb-4 h-40 w-full object-cover rounded-lg">
                    <h3 class="text-xl font-bold text-blue-600 mb-2">Install Solar Panels</h3>
                    <p class="text-gray-700">Solar panels are a great way to generate renewable energy and cut down your electricity bill.</p>
                </a>

                <a href="tip3.html" class="bg-white shadow-lg p-6 rounded-lg text-center hover:bg-blue-50 transition">
                    <img src="tip3.jpg" alt="Unplug Devices" class="mb-4 h-40 w-full object-cover rounded-lg">
                    <h3 class="text-xl font-bold text-blue-600 mb-2">Unplug Devices When Not in Use</h3>
                    <p class="text-gray-700">Many devices still consume power even when turned off. Unplug them to save energy.</p>
                </a>

                <a href="tip4.html" class="bg-white shadow-lg p-6 rounded-lg text-center hover:bg-blue-50 transition">
                    <img src="tip4.jpg" alt="Optimize Heating & Cooling" class="mb-4 h-40 w-full object-cover rounded-lg">
                    <h3 class="text-xl font-bold text-blue-600 mb-2">Optimize Heating & Cooling</h3>
                    <p class="text-gray-700">Use programmable thermostats to reduce energy use when heating or cooling is not needed.</p>
                </a>

                <a href="tip5.html" class="bg-white shadow-lg p-6 rounded-lg text-center hover:bg-blue-50 transition">
                    <img src="tip5.png" alt="Maximize Natural Lighting" class="mb-4 h-40 w-full object-cover rounded-lg">
                    <h3 class="text-xl font-bold text-blue-600 mb-2">Maximize Natural Lighting</h3>
                    <p class="text-gray-700">Utilize natural light during the day to cut down on electricity usage for lighting.</p>
                </a>

                <a href="tip6.html" class="bg-white shadow-lg p-6 rounded-lg text-center hover:bg-blue-50 transition">
                    <img src="tip6.jpg" alt="Seal Air Leaks" class="mb-4 h-40 w-full object-cover rounded-lg">
                    <h3 class="text-xl font-bold text-blue-600 mb-2">Seal Air Leaks</h3>
                    <p class="text-gray-700">Ensure your windows and doors are properly sealed to prevent heat loss and save energy.</p>
                </a>
            </div>
        </div>
    </div>

    <?php include "layout/footer.html"; ?>

</body>
</html>
