<?php
include "components/header.php";
include "components/sidebar.php";
?>

    <div class="wrapper">
        <div class="content-wrapper">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Loại hàng hóa</h1>
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
                                    <h3 class="card-title">Bảng danh mục</h3>

                                    <div class="card-tools">
                                        <div class="input-group input-group-sm" style="width: 150px;">
                                            <div class="input-group-append">
                                                <a href="index.php?page=addcategory" class="btn btn-primary">
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
                                            <th>Name</th>
                                            <th></th>

                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $db= new category();
                                        $add= $db->getList();
                                        $i=1;
                                        foreach ($add as $list){
                                            extract($list);
                                            echo'
                                                    <tr>
                                                    <td>'.$id.'</td>
                                                    <td>'.$name.'</td>
                                                    <td>
                                                    <a href="index.php?page=editcategory&id='.$id.'" class="btn btn-primary">Sửa</a>
                                                    <a onclick="return confirm(`Bạn có chắc muốn xóa không?`);" href="index.php?page=delcategory&id=' .$id. '" type="button" class="btn btn-danger">Xóa</a>
                                                    </td>
                                                    
                                                    
                                                    
                                                    
                                                    </tr>
                                                ';


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