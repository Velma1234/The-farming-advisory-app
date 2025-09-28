
//function to handle form
async function handleCitySearch(event){
    event.preventDefault();// prevents the page from reloading after submission
    
    // getting user input
    let citySearchInput = document.getElementById("cityInput");
    let cityValue = citySearchInput.value;


    // targeting city name 
    let cityName = document.getElementById("cityName");
          
    if(!cityValue){
        alert("Please enter a city");// telling user to enter a value if empty form is submited
        return; //stops if input is empty
    }

            // clearing user input
   citySearchInput.value="";


    // targeting weather info 
    let weatherInfo = document.getElementById("WeatherInfo");
    let weatherTemp = document.getElementById("weatherTemp");
    let weatherIcon = document.getElementById("weatherTempIcon");

//API setup
let weatherAPIKey= "77829e423734c56cac2f97faf5dcc140"
let weatherAPIurl = `https://api.openweathermap.org/data/2.5/weather?q=${cityValue}&appid=${weatherAPIKey}&units=metric`;


try {
    let response = await fetch(weatherAPIurl);
    if(!response.ok) throw new Error("City not found");
    

    let cityData = await response.json();
    //updating city name
    cityName.innerHTML = cityData.name ;

    // update weather info
        weatherInfo.innerHTML = `
            ${new Date().toLocaleString()} <br>
            ${cityData.weather[0].description} <br><br>
            Humidity: <span>${cityData.main.humidity}%</span> 
            Wind: <span>${cityData.wind.speed} m/s</span>
        `;

        // update temperature
        weatherTemp.innerHTML = Math.round(cityData.main.temp);

        // update icon
        let iconCode = cityData.weather[0].icon;
        weatherIcon.innerHTML = `<img src="https://openweathermap.org/img/wn/${iconCode}@2x.png" alt="weather icon">`;

    


} catch (error) {
     cityName.innerHTML = "Error: " + error.message;
        weatherInfo.innerHTML = "";
        weatherTemp.innerHTML = "--";
        weatherIcon.innerHTML = "❌";
        forecastContainer.innerHTML ="";
    
}
// handling forecast section
let weatherForecast = document.getElementById("weatherForecast")

   // clear previos forecasts before adding new fore cast
   weatherForecast.innerHTML= "";

   // adding forecast API
   let forecastUrl= `https://api.openweathermap.org/data/2.5/forecast?q=${cityValue}&appid=${weatherAPIKey}&units=metric`;

   try {
    let forecastResponse = await fetch(forecastUrl);
    if(!forecastResponse.ok) throw new Error("Forecast not found");

    let forecastData = await forecastResponse.json();
    // API 
    let dailyForeCasts= forecastData.list.filter(item =>
        item.dt_txt.includes("12:00:00")
    );
    dailyForeCasts.forEach(day =>{
        //date
        let date = new Date(day.dt_txt);
        let options = {weekday: "short", month:"short", day:"numeric"};
        let dayName = date.toLocaleDateString(undefined, options);

        //icon
        let iconCode = day.weather[0].icon;
        let iconUrl =`https://openweathermap.org/img/wn/${iconCode}@2x.png`;
        
        //temperature
        let temperature = Math.round(day.main.temp);

        //creating forecast item and keeping html structure;

        let forecastItem = document.createElement("div");
        forecastItem.classList.add("weatherForecastDay");

        forecastItem.innerHTML =`
        <div class="weatherForecastDate">${dayName}</div>
         <div class="weatherForecastIcon"><img   src="${iconUrl}" alt=""></div>
         <div class="weatherForecastTemp"> <strong>${temperature}</strong>°C</div>
        `;
         
        weatherForecast.appendChild(forecastItem);

    });

    
   } catch (error) {
    console.error("forecast error", error.message);
   }
}

//adding event listener to the form when button is clicked, handleCitySearchfunction is called
let citySearch = document.getElementById("citySearchForm");
citySearch.addEventListener("submit", handleCitySearch)
