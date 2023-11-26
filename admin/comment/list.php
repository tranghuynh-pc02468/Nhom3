<?php
include "./components/header.php";
include "./components/sidebar.php";
?>
<!-- viết code giao diện ở đây -->
<div class="wrapper">
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Bình Luận</h1>
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
                                <h3 class="card-title">Fixed Header Table</h3>

                                <div class="card-tools">
                                    <div class="input-group input-group-sm" style="width: 150px;">
                                        <div class="input-group-append">
                                            <!-- <a href="index.php?page=addcategory" class="btn btn-primary">
                                                Thêm Mới
                                            </a> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0" style="height: 300px;">
                                <table class="table table-head-fixed text-nowrap">
                                    <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Tên sản phẩm</th>
                                        <th>Số bình luận</th>
                                        <th>Mới nhất</th>
                                        <th>Cũ nhất</th>
                                        <th></th>
                                    </tr>
                                    </thead>

                                    <?php
                                    $pdo = new comments();
                                    $result = $pdo->commentList();
                                    $text = "";
                                    $i = 1;
                                    foreach ($result as $row) {
                                        echo $text = '
                                            <tbody>
                                        <tr>
                                            <td>' . $i . '</td>
                                            <td>' . $row['name_product'] . '</td>
                                            <td>' . $row['quantity'] . '</td>
                                            <td>' . date('d-m-Y', strtotime($row['max_date'])) . '</td>
                                            <td>' . date('d-m-Y', strtotime($row['min_date'])) . '</td>
                                            <td>
                                            <a href="index.php?page=cmt_detail&id=' . $row['product_id'] . '" type="button" class="btn btn-info">Chi tiết</a>
                                            </td>
                                        </tr>
                
                                    </tbody>';
                                        $i++;
                                    }

                                    ?>
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
</div>
</section>
</div>


<aside class="control-sidebar control-sidebar-dark">

</aside>

</div>
<?php include './components/footer.php' ?>