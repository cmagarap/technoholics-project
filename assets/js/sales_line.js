$(document).ready(function(){
    $.ajax({
        url: "http://localhost/project/sales/getSalesData",
        method: "POST",
        success: function(data) {
            var dates = [];
            var income = [];

            for(var i in data) {
                var date = new Date(data[i].sales_date * 1000); // * 1000 to convert into milliseconds
                var month = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
                // var day = date.getDate();
                var year = date.getFullYear();
                var formattedMonth = month[date.getMonth()];

                dates.push(formattedMonth);
                income.push(data[i].income);
            }
            console.log(dates);
            var chartdata = {
                labels: dates,
                datasets : [{
                    label: 'Sales',
                    data: income,
                    borderColor: 'rgba(220, 47, 84, 1)',
                    pointBorderColor: 'rgba(220, 47, 84, 1)',
                    pointBackgroundColor: 'rgba(220, 47, 84, 1)',
                    fill: false
                }]};

            var ctx = $("#salesLine");
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
                    elements: {
                        line: {
                            tension: 0, // disables bezier curves
                        }
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
                                borderDash: [4, 4]
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