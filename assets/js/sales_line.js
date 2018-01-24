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
                    strokeColor: "rgba(220,220,220,1)",
                    pointColor: "rgba(220,220,220,1)",
                    pointStrokeColor: "#fff",
                    pointHighlightFill: "#fff",
                    pointHighlightStroke: "rgba(220,220,220,1)",
                }]};

            var ctx = $("#salesLine");
            Chart.defaults.global.defaultFontFamily = "Arial";
            Chart.defaults.global.defaultFontSize = 12;
            var lineGraph = new Chart(ctx, {
                type: 'line',
                data: chartdata,
                options: {
                    title: {
                        display: true,
                        text: "Sales",
                        fontSize: 25
                    },
                    legend: {
                        display: false,
                        position: "right"
                    },
                    //tooltips: {
                    //    enabled: true
                    //},
                    /*scales: {
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
                    }*/
                }
            });
        },
        error: function(data) {
            console.log(data);
        }
    });
})