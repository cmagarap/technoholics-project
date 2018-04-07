$(document).ready(function(){
    $.ajax({
        url: base_url + "orders/getProcessStatus",
        method: "POST",
        success: function(data) {
            var orders = [];
            var status = [];

            for(var i in data) {
                var process = ["", "Processing", "Shipping", "Delivered", "Pending"];
                var formattedStatus = process[data[i].process_status];
                status.push(formattedStatus);
                orders.push(data[i].no_of_orders);
            }

            var chartdata = {
                labels: status,
                datasets : [{
                    label: 'Age Range',
                    data: orders,
                    backgroundColor: [
                        '#31bbe0',
                        '#dc2f54',
                        '#F3BB45',
                        'green'
                    ],
                    borderWidth: 1,
                    hoverBorderColor: 'rgba(0, 0, 0, 1)',
                    hoverBorderWidth: 4
                }]};

            var ctx = $("#order_doughnut");
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