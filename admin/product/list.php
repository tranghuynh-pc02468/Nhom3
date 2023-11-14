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
                        <h1 class="m-0">Sản Phẩm</h1>
                    </div>
                    <div class="col-sm-4">
                        <?php
                            if(isset($mgs)) {
                                echo $mgs;
                            }
                        ?>
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
                                <h3 class="card-title">Danh Sách Sản Phẩm</h3>

                                <div class="card-tools">
                                    <div class="input-group input-group-sm" style="width: 150px;">
                                        <div class="input-group-append">
                                            <a href="index.php?page=addpro" class="btn btn-primary">
                                                Thêm Mới
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0" style="height: 470px;">
                                <table class="table table-head-fixed text-nowrap">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Tên Sản Phẩm</th>
                                            <th>Giá Sản Phẩm</th>
                                            <th>Hình Ảnh</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $db = new product();
                                            $add = $db->getList();
                                            $i = 1;
                                            foreach($add as $list) {
                                                extract($list);
                                                // var_dump($list);
                                                echo '<tr>


                                                <td>'.$id.'</td>
                                                <td>'.$name.'</td>
                                                <td>'.number_format($price).' đ</td>
                                                <td>
                                                    <img src=" '.$img_path.$image.' " style="width:100px">
                                                 </td>
                                                <td>
                                                    <a href="?page=edit_pro&id=' .$id. '" class="btn btn-primary">Sửa</a>
                                                    <a onclick="return confirm(`Bạn có chắc muốn xóa không?`);" href="index.php?page=del_pro&id=' .$id. '" type="button" class="btn btn-danger">Xóa</a>
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