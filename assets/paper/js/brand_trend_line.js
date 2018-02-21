$(document).ready(function(){
    $.ajax({
        url: "http://localhost/project/dashboard/getTrend",
        method: "POST",
        success: function(data) {
            var td = [];
            var bought = [];
            for(var i in data) {
                if(i == 0) {
                    td.push(data[i].td);
                    bought.push(data[i].bought);
                } else {
                    var x = ((data[i].bought / data[0].bought) * data[i].bought) + Number(data[i].bought);
                    td.push(data[i].td);
                    bought.push(x);
                }
            }

            var chartdata = {
                labels: td,
                datasets : [{
                    label: 'Brand Trend',
                    data: bought,
                    borderColor: '#31bbe0',
                    backgroundColor: 'rgba(49, 187, 224, 0.1)',
                    pointBorderColor: '#31bbe0',
                    pointBackgroundColor: 'rgba(220, 47, 84, 1)',
                    pointHoverBackgroundColor: 'rgba(255,255,255, 1)',
                    pointHoverBorderWidth: 2,
                    pointHoverRadius: 10,
                    borderWidth: 5
                }]};

            var ctx = document.getElementById("trendLine");
            ctx.height = 150;
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
                                return ' Trend: ' + chartData.datasets[0].data[tooltipItem.index];
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