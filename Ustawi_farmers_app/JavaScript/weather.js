
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
let weatherAPIKey= "d57ccf751c843fd0e493f1c8c43d92d1"
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

}

//adding event listener to the form when button is clicked, handleCitySearchfunction is called
let citySearch = document.getElementById("citySearchForm");
citySearch.addEventListener("submit", handleCitySearch)
