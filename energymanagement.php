<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Smart City - Energy Management</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 90%;
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }

        .section {
            margin-bottom: 30px;
        }

        .section-title {
            font-size: 20px;
            font-weight: bold;
            margin-bottom: 10px;
            color: #333;
        }

        .data-card {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px;
            background-color: #f9f9f9;
            border-radius: 5px;
            margin-bottom: 10px;
        }

        .data-icon {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background-color: #eee;
            color: #333;
            margin-right: 10px;
        }

        .data-value {
            font-size: 24px;
            font- Weight: bold;
            color: #333;
        }

        .data-label {
            font-size: 16px;
            color: #666;
        }

        .chart {
            width: 100%;
            height: 300px;
            margin-bottom: 20px;
        }
    </style>
</head>
<body class="container">
    <?php include "layout/headerlogin.html" ?>
    <div class="container">
        <h1>Energy Management</h1>
        <div class="section">
            <h2 class="section-title">Energy Consumption</h2>
            <div class="data-card">
                <div class="data-icon">
                    <i class="fas fa-bolt"></i>
                </div>
                <div class="data-value">1000 kWh</div>
                <div class="data-label">Total Energy Consumption</div>
            </div>
            <div class="data-card">
                <div class="data-icon">
                    <i class="fas fa-solar-panel"></i>
                </div>
                <div class="data-value">500 kWh</div>
                <div class="data-label">Renewable Energy Source</div>
            </div>
            <div class="chart">
            </div>
        </div>
        <div class="section">
            <h2 class="section-title">Energy Production</h2>
            <div class="data-card">
                <div class="data-icon">
                    <i class="fas fa-solar-panel"></i>
                </div>
                <div class="data-value">200 kWh</div>
                <div class="data-label">Solar Energy Production</div>
            </div>
            <div class="data-card">
                <div class="data-icon">
                    <i class="fas fa-wind-turbine"></i>
                </div>
                <div class="data-value">300 kWh</div>
                <div class="data-label">Wind Energy Production</div>
            </div>
            <div class="chart">
            </div>
        </div>
    </div>
    <script src="https://kit.fontawesome.com/your-font-awesome-kit-id.js"></script>
</body>
</html>