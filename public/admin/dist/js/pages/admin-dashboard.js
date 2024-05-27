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

    // ====================================================

    //     var dataPointsAll = [];
    //     var all = JSON.parse(paymentDailyAll)
    //     var all_data = all[0].dataPoints
    // console.log(all)
    //     addDataAll(all_data)

    var optionsFullAll = {
        animationEnabled: true,
        data: JSON.parse(paymentDailyAll)
    };

    // var optionsFull = {
    //     animationEnabled: true,

    //     axisX:{
    //         valueFormatString: "DD MMM",
    //         crosshair: {
    //             enabled: true,
    //             snapToDataPoint: true
    //         }
    //     },

    //     data: [{
    //         type: "spline",
    //         xValueFormatString: "DD MMM",
    //         yValueFormatString: "##0.00",
    //         dataPoints: dataPointsUsd
    //     }]
    // };

    // function addDataAll(all_data) {
    //     for (var i = 0; i < all_data.length; i++) {
    //         dataPointsAll.push({
    //             x: new Date(all_data[i].x),
    //             y: all_data[i].y
    //         });
    //     }

    // }

    $("#chartContainer-full").CanvasJSChart(optionsFullAll);


    // ==========================================================
    var dataPointsUsd = [];
    var usd = JSON.parse(paymentDailyUSD)
    var usd_data = usd[0].dataPoints

    addData(usd_data)
    var optionsFullUSD = {
        animationEnabled: true,

        axisX:{
            valueFormatString: "DD MMM",
            crosshair: {
                enabled: true,
                snapToDataPoint: true
            }
        },

        data: [{
            type: "spline",
            xValueFormatString: "DD MMM",
            yValueFormatString: "##0.00",
            dataPoints: dataPointsUsd
        }]
    };

    function addData(cur_data) {
        for (var i = 0; i < cur_data.length; i++) {
            dataPointsUsd.push({
                x: new Date(cur_data[i].x),
                y: cur_data[i].y
            });
        }

    }

    $("#chartContainer-full-rub").CanvasJSChart(optionsFullUSD);


}
