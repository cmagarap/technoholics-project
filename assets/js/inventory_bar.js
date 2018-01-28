$(document).ready(function(){
    $.ajax({
        url: "http://localhost/project/inventory/getProductData",
        method: "POST",
        success: function(data) {
            console.log(data);
            var brand = [];
            var stock = [];

            for(var i in data) {
                brand.push(data[i].product_brand);
                stock.push(data[i].product_quantity);
            }
            var brand_unique = [...new Set(brand)];
            console.log(brand_unique);

            var chartdata = {
                labels: brand,
                datasets : [{
                    label: 'Stock',
                    data: stock,
                    borderColor: 'rgba(220, 47, 84, 1)',
                    pointBorderColor: 'rgba(220, 47, 84, 1)',
                    pointBackgroundColor: 'rgba(220, 47, 84, 1)',
                    fill: false
                }]};

            var ctx = $("#inventoryBar");
            Chart.defaults.global.defaultFontFamily = "Arial";
            Chart.defaults.global.defaultFontSize = 12;
            var lineGraph = new Chart(ctx, {
                type: 'bar',
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
                        enabled: true
                    },
                    scales: {
                        xAxes: [{
                            gridLines: {
                                color: "rgba(0, 0, 0, 0)",
                            }
                        }],
                        yAxes: [{
                            gridLines: {
                                color: "rgba(0, 0, 0, 0)",
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