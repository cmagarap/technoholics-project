$(document).ready(function(){
    $.ajax({
        url: base_url + "forecasting/getForecasts",
        method: "POST",
        success: function(data) {
            var date_forecasted = [];
            var income = [];

            for(var i in data) {
                date_forecasted.push(data[i].df);
                income.push(data[i].forecasted_income);
            }

            var chartdata = {
                labels: date_forecasted,
                datasets : [{
                    label: 'TECHNOHOLICS',
                    data: income,
                    borderColor: '#31bbe0',
                    backgroundColor: 'rgba(243, 187, 69, 0.2)',
                    pointBorderColor: '#31bbe0',
                    pointHoverBackgroundColor: 'rgba(255,255,255, 1)',
                    pointHoverBorderWidth: 2,
                    pointHoverRadius: 10,
                    borderWidth: 6
                }
                ]};
            var ctx = document.getElementById("forecast");
            ctx.height = 150;
            var lineGraph = new Chart(ctx, {
                type: 'line',
                data: chartdata,
                options: {
                    legend: {
                        display: false
                    },
                    tooltips: {
                        callbacks: {
                            label: function (tooltipItem, chartData) {
                                return ' Forecasted income: ' + chartData.datasets[0].data[tooltipItem.index];
                            }
                        }
                    },
                    scales: {
                        xAxes: [{
                            gridLines: {
                                color: "rgba(0, 0, 0, 0)",
                            }
                        }],
                        yAxes: [{
                            gridLines: {
                                borderDash: [2, 2]
                            }
                        }]
                    },
                    elements: {
                        line: {
                            tension: 0,
                        }
                    }
                }
            });
        },
        error: function(data) {
            console.log(data);
        }
    });
})