$(document).ready(function(){
    $.ajax({
        url: base_url + "accounts/getMaleAge",
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
                        '#A5CFFF',
                        '#546DCF',
                        '#1030C0',
                        '#19368F',
                        '#1D2C70',
                        '#1C2442'
                    ],
                    borderWidth: 1,
                    hoverBorderColor: 'rgba(0, 0, 0, 1)',
                    hoverBorderWidth: 4
                }]};

            var ctx = $("#gender_doughnut1");
            //Chart.defaults.global.defaultFontFamily = "Helvetica";
            //Chart.defaults.global.defaultFontSize = 12;
            var barGraph = new Chart(ctx, {
                type: 'doughnut',
                data: chartdata,
                options: {
                    legend: {
                        position: "right"
                    }
                }
            });
        },
        error: function(data) {
            console.log(data);
        }
    });
})