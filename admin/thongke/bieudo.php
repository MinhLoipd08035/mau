<!DOCTYPE html>
<html lang="en-US">

<body>
    <div id="piechart"></div>

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

    <script type="text/javascript">
        // Load google charts
        google.charts.load('current', {
            'packages': ['corechart']
        });
        google.charts.setOnLoadCallback(drawChart);

        // Draw the chart and set the chart values
        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ['Loại sản phẩm', 'Số lượng sản phẩm'],
                <?php
                $tong_loaihang = count($list_thongke);
                $i = 1;
                if ($i == $tong_loaihang) {
                    $dau_phay = "";
                } else {
                    $dau_phay = ",";
                }
                foreach ($list_thongke as $bieudo) {
                    extract($bieudo);
                    echo "['" . $bieudo['ten_loaihang'] . "', " . $bieudo['so_luong_sp'] . "]" . $dau_phay;
                    $i++;
                }
                ?>
            ]);

            // Optional; add a title and set the width and height of the chart
            var options = {
                'title': 'BIỂU ĐỒ THỐNG KÊ',
                'width': 600,
                'height': 400
            };

            // Display the chart inside the <div> element with id="piechart"
            var chart = new google.visualization.PieChart(document.getElementById('piechart'));
            chart.draw(data, options);
        }
    </script>

</body>

</html>