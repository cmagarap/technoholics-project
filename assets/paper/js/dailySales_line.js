$(document).ready(function(){
    $.ajax({
        url: "http://localhost/project/sales/getDailySales",
        method: "POST",
        success: function(data) {
            var dates = [];
            var income = [];

            for(var i in data) {
                var month = ["", "Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
                var formattedMonth = month[data[i].sales_m];
                dates.push(data[i].sales_d);
                income.push(data[i].income);
            }
            console.log(dates);
            var chartdata = {
                labels: dates,
                datasets : [{
                    label: 'Sales',
                    data: income,
                    borderColor: 'rgba(220, 47, 84, 1)',
                    //backgroundColor: 'rgba(220, 47, 84, 1)',
                    pointBorderColor: 'rgba(220, 47, 84, 1)',
                    pointBackgroundColor: 'rgba(220, 47, 84, 1)',
                    pointHoverBackgroundColor: 'rgb(255,255,255, 1)',
                    pointHoverBorderWidth: 2,
                    pointHoverRadius: 10,
                    borderWidth: 3,
                    fill: false
                }]};

            var ctx = $("#dailySales");
            Chart.defaults.global.defaultFontFamily = "Arial";
            Chart.defaults.global.defaultFontSize = 12;
            var lineGraph = new Chart(ctx, {
                type: 'line',
                data: chartdata,
                options: {
                    legend: {
                        display: false,
                        position: "right"
                    },
                    tooltips: {
                        callbacks: {
                            label: function (tooltipItem, chartData) {
                                return 'Sales: ' + chartData.datasets[0].data[tooltipItem.index];
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
                                drawBorder: false,
                                borderDash: [2, 2]
                            }
                        }]
                    }
                }
            });
        },
        error: function(data) {
            console.log(data);
        }
    });
})