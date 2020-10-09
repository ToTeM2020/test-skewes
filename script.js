$(document).ready(function () {
    google.charts.load('current', {packages: ['corechart', 'bar']});
    // google.charts.setOnLoadCallback(drawColumnChart);

    $(document).on('click', '#submit', function (e) {
        e.preventDefault();

        let data = {};

        data['start'] = $('#start').val();
        data['end'] = $('#end').val();

        $.ajax({
            type: 'POST',
            url: 'ajax.php',
            data: data,
            dataType: 'json',
            success: function (data) {
                drawColumnChart(data);
                orderResult(data);
            }
        });
    });

    function drawColumnChart(data) {
        let arr = [
            ['Города', 'Число заявок', {role: "style"}],
        ];

        $.each(data.data, function (index, value) {
            let colorR = Math.floor((Math.random() * 256));
            let colorG = Math.floor((Math.random() * 256));
            let colorB = Math.floor((Math.random() * 256));
            let color = "rgb(" + colorR + "," + colorG + "," + colorB + ")";
            let title = value.name
                + '\nЗаявок: ' + value.orders.length
                + '\nДоля: ' + ((value.orders.length / data.count).toFixed(2) % 100) * 100 + '%';

            arr.push([title, value.orders.length, color]);
        });

        let bar = google.visualization.arrayToDataTable(arr);
        let columnview = new google.visualization.DataView(bar);
        columnview.setColumns([0, 1,
            {
                calc: "stringify",
                sourceColumn: 1,
                type: "string",
                role: "annotation"
            },
            2]);
        let header = {
            title: 'Какой-то график',
            bar: {groupWidth: "50%"}
        };
        let barchart = new google.visualization.ColumnChart(document.getElementById("columnchart"));
        barchart.draw(columnview, header);
    };

    function orderResult(data) {
        let result = data.count;
        $("#result").html('Итог заявок: ' + result);
    };
});