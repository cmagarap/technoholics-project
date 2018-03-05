$(document).ready(function(){
    $.ajax({
        url: "http://localhost/project/dashboard/getTrend",
        method: "POST",
        success: function(data) {
            var td = [];
            var brand = [];

            for(var i in data) {
                if(i == 0) {
                    var x = ((data[i].price - data[i].price) / 1) * 100;
                    brand.push(x);
                } else {
                    var x = ((data[i].price - data[i - 1].price) / data[i - 1].price) * 100;
                    brand.push(x.toPrecision(6));
                }
            }
            for (var i in data) {
                td.push(data[i].td);
            }
            console.log(data);
            var chartdata = {
                labels: td,
                datasets : [{
                    label: 'TECHNOHOLICS',
                    data: brand,
                    borderColor: '#31bbe0',
                    backgroundColor: 'rgba(243, 187, 69, 0.2)',
                    pointBorderColor: '#31bbe0',
                    pointHoverBackgroundColor: 'rgba(255,255,255, 1)',
                    pointHoverBorderWidth: 2,
                    pointHoverRadius: 10,
                    borderWidth: 6
                }
                ]};
            var ctx = document.getElementById("trendLine");
            ctx.height = 150;
            var lineGraph = new Chart(ctx, {
                type: 'line',
                data: chartdata,
                options: {
                    legend: {
                        display: true,
                        position: "bottom"
                    },
                    tooltips: {
                        callbacks: {
                            label: function (tooltipItem, chartData) {
                                return ' Trend: ' + chartData.datasets[0].data[tooltipItem.index] + '%';
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
                            tension: 0, // disables bezier curves
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