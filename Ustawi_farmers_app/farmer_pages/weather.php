<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ustawi</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <nav class="navbar">
        <ul>
            <li><a href="register.php">Register</a></li>
            <li><a href="weather.php">Weather</a></li>
            <li><a href="planting_seasons.php">Seasons</a></li>
             <li><a href="market_prices.php">Market</a></li>
        </ul> 
    </nav>
<br><br>
    <div class="weatherDashboard">

    <h1>Weather</h1>

    <form action="" class="searchForm" id="citySearchForm" >
        <input type="text" placeholder="Enter city" id="cityInput"> 
        <button type="submit" class="cityBtn" id="cityBtn">SUBMIT</button>
    </form>
    <div class="cityForecast">
       
        <div>
            <h2 id="cityName"></h2>
            <p id="WeatherInfo">
                 <br> <br><span> </span> <span></span> 
            </p>
            
        </div >

          <div class="weatherTempSection" >
            <div class="weatherTempIcon" id="weatherTempIcon"></div>
            <div class="weatherTemp" id="weatherTemp"></div>
            <div class="weatherTempSymbol" id="weatherTempSymbol"></div>
          </div>
          </div>
        
          <div class="weatherForecast" id="weatherForecast" >
            <div class="weatherForecastDay" id="weatherForecastDay">
                <div class="weatherForecastDate" id="weatherForecastDate">Mon</div>
                <div class="weatherForecastIcon" id="weatherForecastIcon">☁️</div>
                <div class="weatherForecastTemp" id="weatherForecastTemp"> <strong>12</strong>°C</div>
            </div>
          </div>
                
    </div>
    
    

    <script src="../JavaScript/weather.js"></script>
</body>
</html>