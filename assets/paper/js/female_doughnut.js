$(document).ready(function(){
    $.ajax({
        url: base_url + "accounts/getFemaleAge",
        method: "POST",
        success: function(data) {
            var gender_count = [];
            var a_range = [];

            for (var i in data) {
                gender_count.push(data[i].no_of_customer);
                a_range.push(data[i].a_range);
            }

            var chartdata = {
                labels: a_range,
                datasets : [{
                    label: 'Age Range',
                    data: gender_count,
                    backgroundColor: [
                        '#FFC9F6',
                        '#F68BFF',
                        '#C855DB',
                        '#B5009A',
                        '#820081',
                        '#59294B'
                    ],
                    borderWidth: 1,
                    hoverBorderColor: 'rgba(0, 0, 0, 1)',
                    hoverBorderWidth: 4
                }]};

            var ctx = $("#gender_doughnut2");
            //Chart.defaults.global.defaultFontFamily = "Helvetica";
            //Chart.defaults.global.defaultFontSize = 12;
            var barGraph = new Chart(ctx, {
                type: 'doughnut',
                data: chartdata,
                options: {
                    legend: {
                        position: "right"
                    },
                    /*scales: {
                        yAxes: [{
                            gridLines: {
                                drawOnChartArea: false,
                                drawBorder: false,
                                color: "rgba(0, 0, 0, 0)",
                            },
                            ticks: {
                                display: false
                            }
                        }],
                        xAxes: [{
                            gridLines: {
                                drawOnChartArea: false,
                                drawBorder: false,
                                color: "rgba(0, 0, 0, 0)",
                            },
                            ticks: {
                                display: false
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