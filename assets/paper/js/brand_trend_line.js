$(document).ready(function(){
    $.ajax({
        url: "http://localhost/project/dashboard/getTrend",
        method: "POST",
        success: function(data) {
            var td = [];
            var bought1 = [];
            var brand = {
                Apple : [],
                HP : [],
                ASUS: []
            };
            //var len = data.length;
            for (i in data) {
                if (data[i].brand == "Apple") {
                    brand.Apple.push(data[i].bought);
                } else if (data[i].brand == "HP") {
                    brand.HP.push(data[i].bought);
                } else if (data[i].brand == "ASUS") {
                    brand.ASUS.push(data[i].bought);
                }
            }
            for(var i in data) {
                //if(i == 0) {
                td.push(data[i].td);
                // } else {
                //     var x = ((data[i].bought / data[0].bought) * data[i].bought) + Number(data[i].bought);
                //     td.push(data[i].td);
                // }
            }
            //     bought.push(x);
            console.log(brand);

            var chartdata = {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                datasets : [
                    {
                        label: 'Apple',
                        data: brand.Apple,
                        borderColor: '#31bbe0',
                        backgroundColor: 'rgba(49, 187, 224, 0.3)',
                        pointBorderColor: '#31bbe0',
                        pointHoverBackgroundColor: 'rgba(255,255,255, 1)',
                        pointHoverBorderWidth: 2,
                        pointHoverRadius: 10,
                        borderWidth: 5
                    },
                    {
                        label: 'HP',
                        data: brand.HP,
                        borderColor: '#dc2f54',
                        backgroundColor: 'rgba(220, 47, 84, 0.3)',
                        pointBorderColor: '#dc2f54',
                        pointHoverBackgroundColor: 'rgba(255,255,255, 1)',
                        pointHoverBorderWidth: 2,
                        pointHoverRadius: 10,
                        borderWidth: 5
                    },
                    {
                        label: 'ASUS',
                        data: brand.ASUS,
                        borderColor: '#F3BB45',
                        backgroundColor: 'rgba(243, 187, 69, 0.3)',
                        pointBorderColor: '#F3BB45',
                        pointHoverBackgroundColor: 'rgba(255,255,255, 1)',
                        pointHoverBorderWidth: 2,
                        pointHoverRadius: 10,
                        borderWidth: 5
                    },
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
                                stacked: true,
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