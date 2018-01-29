$(document).ready(function(){
    $.ajax({
        url: "http://localhost/project/sales/getSalesData",
        method: "POST",
        success: function(data) {
            console.log(data);
            var dates = [];
            var income = [];

            for(var i in data) {
                dates.push(data[i].sales_date);
                income.push(data[i].income);
            }

            var chartdata = {
                labels: dates,
                datasets : [{
                    label: 'Sales',
                    data: income,
                    borderColor: 'rgba(220, 47, 84, 1)',
                    pointBorderColor: 'rgba(220, 47, 84, 1)',
                    pointBackgroundColor: 'rgba(220, 47, 84, 1)',
                    fill: false
                }]};

            var ctx = $("#salesLine");
            Chart.defaults.global.defaultFontFamily = "Arial";
            Chart.defaults.global.defaultFontSize = 12;
            var lineGraph = new Chart(ctx, {
                type: 'line',
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