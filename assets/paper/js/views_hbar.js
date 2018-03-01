$(document).ready(function(){
    $.ajax({
        url: "http://localhost/project/inventory/getProductViews",
        method: "POST",
        success: function(data) {
            var product = [];
            var views = [];
            var color_chart = [];

            for(var i in data) {
                product.push(data[i].product_name);
                views.push(data[i].no_of_views);
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
                    label: 'Times viewed',
                    data: views,
                    backgroundColor: color_chart,
                    borderWidth: 1,
                    hoverBorderColor: 'rgba(0, 0, 0, 1)',
                    hoverBorderWidth: 4
                }]};

            var ctx = $("#productViews");
            //Chart.defaults.global.defaultFontFamily = "Helvetica";
            //Chart.defaults.global.defaultFontSize = 12;
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