<?php
include "components/header.php";
include "components/sidebar.php";
?>

<div class="wrapper">
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-4">
                        <h1 class="m-0">Đơn hàng</h1>
                    </div>
                    <div class="col-sm-4">
                    </div>

                </div>
            </div>
        </div>
        <section class="content">
            <div class="container-fluid">
                <!-- viết code giao diện ở đây -->
                <!-- /.row -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Chi tiết đơn hàng</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0" style="height: 470px;">
                                <table class="table table-head-fixed text-nowrap">
                                    <thead>
                                    <tr class="text-center">
                                        <th>Hình ảnh</th>
                                        <th>Tên sản phẩm</th>
                                        <th>Size</th>
                                        <th>Đơn giá</th>
                                        <th>Số lượng</th>
                                        <th>Thành tiền</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $id = $_GET['id'];
                                    $db = new order();
                                    $result = $db->getById($id);
                                    foreach ($result as $item) {
                                        extract($item);
                                        // var_dump($list);
                                        echo '<tr class="text-center">
                                                <td> <img src="../upload/' .$image . '" alt="" style="width:80px"> </td>
                                                <td>' . $name_pro . '</td>
                                                <td>' . $size . '</td>
                                                <td>' . number_format($price) . ' đ</td>
                                                <td>' . $quantity . '</td>
                                                <td>' . number_format($quantity * $price) . ' đ</td>
                                            </tr>';
                                    }
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
                <!-- /.row -->
            </div>
        </section>
    </div>


    <aside class="control-sidebar control-sidebar-dark">

    </aside>


</div>
<?php include 'components/footer.php' ?>
