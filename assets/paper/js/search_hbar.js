$(document).ready(function(){
    $.ajax({
        url: base_url + "inventory/getSearches",
        method: "POST",
        success: function(data) {
            var product = [];
            var searches = [];
            var color_chart = [];
            var msg = '';

            for (var i in data) {
                if(i == 0) {
                    var msg = data[0].msg;
                    continue;
                } else {
                    product.push(data[i].item_name);
                    searches.push(data[i].at_count);
                }
            }
            console.log(searches);

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
                    label: 'Times Searched',
                    data: searches,
                    backgroundColor: color_chart,
                    borderWidth: 1,
                    hoverBorderColor: 'rgba(0, 0, 0, 1)',
                    hoverBorderWidth: 4
                }
                ]};

            var ctx = $("#productSearch");
            Chart.defaults.global.defaultFontFamily = "Arial";

            var barGraph = new Chart(ctx, {
                type: 'horizontalBar',
                data: chartdata,
                options: {
                    title: {
                        display: true,
                        text: msg,
                        fontFamily: 'Helvetica',
                        fontStyle: 'italic',
                        fontSize: 15

                    },
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