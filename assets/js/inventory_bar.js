$(document).ready(function(){
    $.ajax({
        url: "http://localhost/project/inventory/getProductData",
        method: "POST",
        success: function(data) {
            var brand = [];
            var stock = [];
            var color_chart = [
                'rgba(235, 94, 40, 1)',
                'rgba(49, 187, 224, 1)',
                'rgba(220, 47, 84, 1)',
                'rgba(122, 44, 201, 1)',
                'rgba(122, 194, 154, 1)',
                'rgba(243, 187, 69, 1)',
                'rgba(232, 153, 229, 1)',
                'rgba(102, 97, 91, 1)',
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
                    borderWidth: 1,
                    hoverBorderColor: 'rgba(0, 0, 0, 1)',
                    hoverBorderWidth: 4
                }]};

            var ctx = $("#inventoryBar");
            Chart.defaults.global.defaultFontFamily = "Arial";
            Chart.defaults.global.defaultFontSize = 12;
            var lineGraph = new Chart(ctx, {
                type: 'bar',
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