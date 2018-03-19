$(document).ready(function(){
    $.ajax({
        url: base_url + "inventory/getTimesBought",
        method: "POST",
        success: function(data) {
            var product = [];
            var purchase = [];
            var color_chart = [];

            for(var i in data) {
                product.push(data[i].product_name);
                purchase.push(data[i].times_bought);
            }

            var dynamicColors = function() {
                var r = Math.floor(Math.random() * 255);
                var g = Math.floor(Math.random() * 255);
                var b = Math.floor(Math.random() * 255);
                return "rgb(" + r + "," + g + "," + b + ")";
            };

            for (var i in data) {
                color_chart.push(dynamicColors());
            }

            var chartdata = {
                labels: product,
                datasets : [{
                    label: 'Male',
                    data: purchase,
                    backgroundColor: color_chart,
                    borderWidth: 1,
                    hoverBorderColor: 'rgba(0, 0, 0, 1)',
                    hoverBorderWidth: 4
                },
                    {
                        label: 'Female',
                        data: [2, 5, 9, 11, 2],
                        backgroundColor: [
                            'rgba(235, 94, 40, 1)',
                            'rgba(49, 187, 224, 1)',
                            'rgba(220, 47, 84, 1)',
                            'rgba(122, 44, 201, 1)',
                            'rgba(122, 194, 154, 1)'
                        ],
                        borderWidth: 1,
                        hoverBorderColor: 'rgba(0, 0, 0, 1)',
                        hoverBorderWidth: 4
                    }]};

            var ctx = $("#mostPurchased");
            var barGraph = new Chart(ctx, {
                type: 'horizontalBar',
                data: chartdata,
                options: {
                    legend: {
                        display: false,
                        position: "right"
                    },
                    scales: {
                        yAxes: [{
                            gridLines: {
                                drawOnChartArea: false
                            }
                        }],
                        xAxes: [{
                            gridLines: {
                                drawOnChartArea: false
                            },
                            ticks: {
                                beginAtZero: true
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