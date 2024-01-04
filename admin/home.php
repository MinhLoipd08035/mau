<?php
$list_thongke = thongke();
?>
    <div class="form-container1">
        <h1 class="admin__list-title">THỐNG KÊ SẢN PHẨM</h1>
        <div class="admin__list-table">
            <table class="admin__table">
                <tr>
                    <th>MÃ LOẠI HÀNG</th>
                    <th>TÊN LOẠI HÀNG</th>
                    <th>SỐ LƯỢNG</th>
                    <th>GIÁ CAO NHẤT </th>
                    <th>GIÁ THẤP NHẤT</th>
                    <th>GIÁ TRUNG BÌNH</th>
                </tr>

                <?php foreach ($list_thongke as $thongke) {
                    extract($thongke);
                ?>
                    <tr>
                        <td><?php echo $ma_loaihang; ?></td>
                        <td><?php echo $ten_loaihang; ?></td>
                        <td><?php echo $so_luong_sp; ?></td>
                        <td><?php echo $gia_cao_nhat; ?></td>
                        <td><?php echo $gia_thap_nhat; ?></td>
                        <td><?php echo $gia_trung_binh; ?></td>
                    </tr>
                <?php } ?>
            </table>
        </div>
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
    </div>
