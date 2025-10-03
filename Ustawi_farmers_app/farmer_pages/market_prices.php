<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Ustawi - Market Prices</title>
  <link rel="stylesheet" href="../css/style.css" />
  <link rel="stylesheet" href="../css/dashboard.css" />
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
  <header>
    <h1> Ustawi Market Dashboard</h1>
  </header>

  <!-- Search Section -->
  <section class="searchSection">
    <form id="searchForm">
     <input  type="text" name="cropName" id="cropName"  placeholder="Search for a crop..."  />
  <label for="region">Region:</label>
   <select name="region" id="region">
    <option value="Bungoma">Bungoma</option>

</select>

     
     
      <button type="submit">Search</button>
    </form><br><br>
  </section>

  <!-- Product Grid -->
  <section class="marketGrid" id="marketGrid">
    <!-- Example product card -->
    <div class="marketCard">
      <img src="../images/crops images/maizeImg.jpg" alt="Maize" />
      <h2>Maize</h2>
      <p><strong>Current Price:</strong> 45 KSh/kg</p>
      <button type="submit" class="historyBtn" data-crop="maize">View History</button>
    </div>

    <div class="marketCard">
      <img src="../images/crops images/beans.jpg"  alt="Beans" />
      <h2>Beans</h2>
      <p><strong>Current Price:</strong> 90 KSh/kg</p>
      <button type="submit" class="historyBtn" data-crop="beans">View History</button>
    </div>

    <div class="marketCard">
      <img src="../images/crops images/beans.jpg" alt="Beans" />
      <h2>Beans</h2>
      <p><strong>Current Price:</strong> 90 KSh/kg</p>
      <button type="submit" class="historyBtn" data-crop="beans">View History</button>
    </div>

    <div class="marketCard">
      <img src="../images/crops images/beans.jpg" alt="Beans" />
      <h2>Beans</h2>
      <p><strong>Current Price:</strong> 90 KSh/kg</p>
      <button type="submit" class="historyBtn" data-crop="beans">View History</button>
    </div>
    <!-- More products will be added dynamically -->
  </section>

  
  <div>
    <h2>Price Trend</h2>
    <canvas id="priceChart" width="500px" height="350px"> </canvas>
  </div>

  <!-- Scripts -->
  <script src="../JavaScript/market.js"></script>
</body>
</html>