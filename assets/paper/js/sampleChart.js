$(document).ready(function(){
    $.ajax({
        url: base_url + "random/getProductdata",
        method: "POST",
        success: function(data) {
            console.log(data);
            var product = [];
            var quantity = [];

            for(var i in data) {
                product.push(data[i].product_name);
                quantity.push(data[i].product_quantity);
            }

            var chartdata = {
                labels: product,
                datasets : [{
                        label: 'Product Quantity',
                        data: quantity,
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.5)',
                            'rgba(54, 162, 235, 0.5)',
                            'rgba(255, 206, 86, 0.5)',
                            'rgba(75, 192, 192, 0.5)',
                            'rgba(153, 102, 255, 0.5)',
                            'rgba(255, 159, 64, 0.5)'
                        ],
                        borderColor: [
                            'rgba(255,99,132,1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)'
                        ],
                        borderWidth: 1,
                        // hoverBackgroundColor: 'rgba(200, 200, 200, 1)',
                        hoverBorderColor: '#31bbe0',
                        hoverBorderWidth: 4
                }]};

            var ctx = $("#mycanvas");
            Chart.defaults.global.defaultFontFamily = "Arial";
            Chart.defaults.global.defaultFontSize = 12;
            var barGraph = new Chart(ctx, {
                type: 'horizontalBar',
                data: chartdata,
                options: {
                    title: {
                        display: true,
                        text: "Inventory",
                        fontSize: 25
                    },
                    legend: {
                        display: false,
                        position: "right"
                    },
                    //tooltips: {
                    //    enabled: true
                    //},
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }],
                        xAxes: [{
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