$(document).ready(function(){
    $.ajax({
        url: base_url + "accounts/getCustomerBrands/",
        method: "POST",
        success: function(data) {
            var brand = [];
            var stock = [];
            var color_chart = [
                'rgba(235, 94, 40, 0.5)',
            ];

            for(var i in data) {
                brand.push(data[i].product_brand);
                stock.push(data[i].quan);
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
                labels: brand,
                datasets : [{
                    label: 'Stock',
                    data: stock,
                    backgroundColor: color_chart,
                    borderColor: "#000",
                    borderWidth: 1,
                    hoverBorderColor: 'rgba(0, 0, 0, 1)',
                    hoverBorderWidth: 4
                }]};

            var ctx = $("#customer_radar");
            Chart.defaults.global.defaultFontFamily = "Arial";
            Chart.defaults.global.defaultFontSize = 12;
            var lineGraph = new Chart(ctx, {
                type: 'radar',
                data: chartdata,
                options: {
                    legend: {
                        display: false
                    },

                    scales: {
                        xAxes: [{
                            gridLines: {
                                drawOnChartArea: false
                            }
                        }],
                        yAxes: [{
                            gridLines: {
                                drawBorder: false,
                                borderDash: [2, 2]
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