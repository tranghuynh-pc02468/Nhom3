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
                                <h3 class="card-title">Danh sách đơn hàng</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0" style="height: 470px;">
                                <table class="table table-head-fixed text-nowrap">
                                    <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Người đặt</th>
                                        <th>Ngày đặt hàng</th>
                                        <th>Tồng tiền</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $db = new order();
                                    $result = $db->getAll();
                                    $i = 1;
                                    foreach($result as $item) {
                                        extract($item);
                                        // var_dump($list);
                                        echo '<tr>
                                                <td>'.$i.'</td>
                                                <td>'.$name_user.'</td>
                                                <td>'.date("d-m-Y", strtotime($date)).' </td>
                                                <td>'.number_format($total).' đ</td>
                                                <td>
                                                    <a href="index.php?page=detail-order&id=' . $id . '" class="btn btn-primary">Chi tiết</a>
                                                </td>
                                            </tr>';
                                        $i++;
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
