$(document).ready(function(){
    $.ajax({
        url: base_url + "orders/getGender",
        method: "POST",
        success: function(data) {
            var gender_count = [];
            var gender = [];

            for (var i in data) {
                gender_count.push(data[i].gender_count);
                gender.push(data[i].gender);
            }

            var chartdata = {
                labels: gender,
                datasets : [{
                    label: 'Gender',
                    data: gender_count,
                    backgroundColor: [
                        '#FFC9F6',
                        '#546DC9'
                    ],
                    borderWidth: 1,
                    hoverBorderColor: 'rgba(0, 0, 0, 1)',
                    hoverBorderWidth: 4
                }]};

            var ctx = $("#gender_doughnut");
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