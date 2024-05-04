window.onload = function () {
console.log(585555555);
    var options = {
        animationEnabled: true,

        data: [{
            type: "doughnut",
            innerRadius: "40%",
            showInLegend: true,
            legendText: "{label}",
            indexLabel: "{label}: #percent%",
            dataPoints: JSON.parse(res)
        }]
    };
    $("#chartContainer").CanvasJSChart(options);


    var optionsFull = {
        animationEnabled: true,
        data: JSON.parse(paymentDaily)
    };

    $("#chartContainer-full").CanvasJSChart(optionsFull);

    var optionsFullRUB = {
        animationEnabled: true,
        data: JSON.parse(paymentDailyRUB)
    };

    $("#chartContainer-full-rub").CanvasJSChart(optionsFullRUB);



}
