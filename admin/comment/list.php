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
                                            <th>' . $i . '</th>
                                            <th>' . $row['name_product'] . '</th>
                                            <th>' . $row['quantity'] . '</th>
                                            <th>' . $row['max_date'] . '</th>
                                            <th>' . $row['min_date'] . '</th>
                                            <th>
                                            <a href="index.php?page=cmt_detail&id=' . $row['product_id'] . '" type="button" class="btn btn-info">Chi tiết</a>
                                            </th>
                                        </tr>
                
                                    </tbody>';
                                        $i++;
                                    }

                                    ?>
                                    <!-- <tbody>
                                        <tr>
                                            <td>183</td>
                                            <td>John Doe</td>
                                            <td>11-7-2014</td>
                                            <td><span class="tag tag-success">Approved</span></td>
                                            <td>sdfghjkl;ẻtyuio</td>
                                            <td>
                                                <a href="" class="btn btn-danger">Xóa</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>219</td>
                                            <td>Alexander Pierce</td>
                                            <td>11-7-2014</td>
                                            <td><span class="tag tag-warning">Pending</span></td>
                                            <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                                            <td>
                                                <a href="" class="btn btn-danger">Xóa</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>657</td>
                                            <td>Bob Doe</td>
                                            <td>11-7-2014</td>
                                            <td><span class="tag tag-primary">Approved</span></td>
                                            <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                                            <td>
                                                <a href="" class="btn btn-danger">Xóa</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>175</td>
                                            <td>Mike Doe</td>
                                            <td>11-7-2014</td>
                                            <td><span class="tag tag-danger">Denied</span></td>
                                            <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                                            <td>
                                                <a href="" class="btn btn-danger">Xóa</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>134</td>
                                            <td>Jim Doe</td>
                                            <td>11-7-2014</td>
                                            <td><span class="tag tag-success">Approved</span></td>
                                            <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                                            <td>
                                                <a href="" class="btn btn-danger">Xóa</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>494</td>
                                            <td>Victoria Doe</td>
                                            <td>11-7-2014</td>
                                            <td><span class="tag tag-warning">Pending</span></td>
                                            <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                                            <td>
                                                <a href="" class="btn btn-danger">Xóa</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>832</td>
                                            <td>Michael Doe</td>
                                            <td>11-7-2014</td>
                                            <td><span class="tag tag-primary">Approved</span></td>
                                            <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                                            <td>
                                                <a href="" class="btn btn-danger">Xóa</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>982</td>
                                            <td>Rocky Doe</td>
                                            <td>11-7-2014</td>
                                            <td><span class="tag tag-danger">Denied</span></td>
                                            <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                                            <td>
                                                <a href="" class="btn btn-danger">Xóa</a>
                                            </td>
                                        </tr>
                                    </tbody> -->
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