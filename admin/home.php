<?php
include "./components/header.php";
include "./components/sidebar.php";
?>

    <div class="wrapper">
    <div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">CLOUD Store</h1>
                </div>

            </div>
        </div>
    </div>
    <section class="content">
    <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row">
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box">
                    <span class="info-box-icon bg-info elevation-1"><i class="fas fa-cog"></i></span>
                    <?php
                    $pdo = new statistical();
                    $result = $pdo->countComment();
                    ?>
                    <div class="info-box-content">
                        <span class="info-box-text">Bình Luận</span>
                        <span class="info-box-number">
                  <?php
                  echo $result;
                  ?>

                </span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-thumbs-up"></i></span>
                    <?php
                    $pdo = new statistical();
                    $result = $pdo->countProduct();
                    ?>
                    <div class="info-box-content">
                        <span class="info-box-text">Sản Phẩm</span>
                        <span class="info-box-number">
                  <?php
                  echo $result;
                  ?>
                </span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->

            <!-- fix for small devices only -->
            <div class="clearfix hidden-md-up"></div>

            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-success elevation-1"><i class="fas fa-shopping-cart"></i></span>
                    <?php
                    $pdo = new statistical();
                    $result = $pdo->countOrder();
                    ?>
                    <div class="info-box-content">
                        <span class="info-box-text">Đơn Hàng</span>
                        <span class="info-box-number">
                  <?php
                  echo $result;
                  ?>
                </span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>
                    <?php
                    $pdo = new statistical();
                    $result = $pdo->countUser();
                    ?>
                    <div class="info-box-content">
                        <span class="info-box-text">Khách Hàng</span>
                        <span class="info-box-number">
                  <?php
                  echo $result;
                  ?>
                </span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->


        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Thống kê</h5>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div id="piechart"></div>

                        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

                        <script type="text/javascript">
                            // Load google charts
                            google.charts.load('current', {'packages': ['corechart']});
                            google.charts.setOnLoadCallback(drawChart);

                            // Draw the chart and set the chart values
                            function drawChart() {
                                var data = google.visualization.arrayToDataTable([
                                    ['Loại', 'Số lượng'],
                                    <?php
                                    $db = new statistical();
                                    $result_chart = $db->thongKeSP();
                                    // foreach ($result_chart as $item) {
                                    //     echo '{ y: ' . $item['count_product'] . ',label: "' . $item['name_category'] . '" },';
                                    // }
                                    foreach ($result_chart as $item) {
                                        echo " ['$item[name_category]', $item[count_product] ], ";
                                    }
                                    ?>

                                ]);

                                // Optional; add a title and set the width and height of the chart
                                var options = {'title': 'Tỉ lệ hàng hóa', 'width': '100%', 'height': 400};

                                // Display the chart inside the <div> element with id="piechart"
                                var chart = new google.visualization.PieChart(document.getElementById('piechart'));
                                chart.draw(data, options);
                            }
                        </script>
                    </div>
                    <!-- ./card-body -->

                    <!-- /.card-footer -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header font-weight-bold text-center">
                        Bảng thống kê
                    </div>
                    <table class="table text-nowrap table-bordered">
                        <thead>
                        <tr class="text-center">
                            <th>Loại hàng</th>
                            <th>Số lượng</th>
                            <th>Giá cao nhất</th>
                            <th>Giá thấp nhất</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $db = new statistical();
                        $result = $db->thongKeSP();
                        $i = 1;
                        foreach ($result as $item) {
                            // var_dump($item);
                            extract($item);
                            ?>
                            <tr>
                                <td>
                                    <?= $name_category ?>
                                </td>
                                <td class="text-center">
                                    <?= $count_product ?>
                                </td>
                                <td class="text-center">
                                    <?= number_format($price_max) ?> đ
                                </td>
                                <td class="text-center">
                                    <?= number_format($price_min) ?> đ
                                </td>

                            </tr>
                            <?php
                            $i++;
                        } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->

        <!-- Main Footer -->

    </div>
<?php include './components/footer.php' ?>