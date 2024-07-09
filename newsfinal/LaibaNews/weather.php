<?php 


// Your OpenWeatherMap API key
$apiKey = "d544d807edec339d4e4eac4e2be9004f";

// City IDs for multiple cities
$cityIds = ["524901", "5128581", "2643743", "1850147"]; // Add more city IDs as needed
$weatherData = [];

foreach ($cityIds as $cityId) {
    $apiUrl = "http://api.openweathermap.org/data/2.5/forecast?id=$cityId&appid=$apiKey&units=metric";
    $data = file_get_contents($apiUrl);
    $weatherArray = json_decode($data, true);
    
    if ($weatherArray['cod'] == 200) {
        $cityName = $weatherArray['city']['name'];
        $forecastData = [];
        $counter = 0;
        foreach ($weatherArray['list'] as $forecast) {
            if ($counter == 3) break;
            $timestamp = $forecast['dt'];
            $date = date("F j, l", $timestamp);
            $condition = $forecast['weather'][0]['main'];
            $icon = $forecast['weather'][0]['icon'];
            $temp = $forecast['main']['temp'];
            $forecastData[] = [
                'date' => $date,
                'condition' => $condition,
                'icon' => $icon,
                'temp' => $temp
            ];
            $counter++;
        }
        $weatherData[] = [
            'city' => $cityName,
            'forecast' => $forecastData
        ];
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weather Forecast</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        .weather {
            font-family: Arial, sans-serif;
        }
        .weather-head h3 {
            text-align: center;
        }
        .weather-forecast {
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
        }
        .forecast {
            border: 1px solid #ccc;
            padding: 4px;
            border-radius: 3px;
            text-align: center;
            margin: 10px;
            width: 22%;
        }
        .icon img {
            font-size: 2rem;
            width: 38px;
            height: 38px;
        }
        .temp {
            font-size: 1.5rem;
        }
        .day {
            margin-top: 5px;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="weather">
        <div class="weather-head"><h3>Weather in <span id="city-name"></span></h3></div>
        <div class="weather-forecast" id="weather-forecast">
            <!-- Weather forecast data will be injected here by JavaScript -->
        </div>
    </div>

    <script>
        const weatherData = <?php echo json_encode($weatherData); ?>;
        let currentIndex = 0;

        function updateWeather() {
            const cityData = weatherData[currentIndex];
            document.getElementById('city-name').innerText = cityData.city;
            const forecastContainer = document.getElementById('weather-forecast');
            forecastContainer.innerHTML = '';

            cityData.forecast.forEach((forecast, index) => {
                const classNames = ['first', 'second', 'third', 'fourth'];
                const forecastDiv = document.createElement('div');
                forecastDiv.className = `forecast ${classNames[index]}`;
                forecastDiv.innerHTML = `
                    <div class="condition"><span>${forecast.condition}</span></div>
                    <div class="icon"><img src="http://openweathermap.org/img/wn/${forecast.icon}@2x.png" alt=""></div>
                    <div class="temp"><span>${forecast.temp}°C</span></div>
                    <div class="day"><span>${forecast.date}</span></div>
                `;
                forecastContainer.appendChild(forecastDiv);
            });

            currentIndex = (currentIndex + 1) % weatherData.length;
        }

        updateWeather();
        setInterval(updateWeather, 10000);
    </script>
</body>
</html>
