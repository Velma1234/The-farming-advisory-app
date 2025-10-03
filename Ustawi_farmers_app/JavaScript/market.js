async function handleMarketPriceSearch(event){
    event.preventDefault();

    //sample chart

    let sampleChart = document.getElementById('priceChart');

    priceTrendChart = new Chart(sampleChart,{
        type:'line',
        data:{
            labels:['Jan','Feb','Mar','Apr','May','June','Jul','Aug','Sep','Oct','Nov','Dec'],
            datasets:[{
                label:['Maize Price (Ksh/kg)']
                
            }]
        }

    })
}