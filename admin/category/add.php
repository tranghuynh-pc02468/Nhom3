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
                <div class="row">
                    <div class="col-md-12">
                        <!-- general form elements -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Thêm Mới</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form action="index.php?act=listcategory" method="post">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="email">Mã danh mục</label>
                                        <input type="text" disabled name="id" class="form-control" >
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Tên danh mục</label>
                                        <input type="text" class="form-control" name="name">
                                    </div>

                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                        <label class="form-check-label" for="exampleCheck1">Check me out</label>
                                    </div>
                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" name="themmoi" class="btn btn-primary">Thêm mới</button>
                                    <a href="index.php?page=listcategory" type="reset" class="btn btn-primary">Hủy</a>
                                </div>
                            </form>
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
            </div>
        </section>
    </div>

    <aside class="control-sidebar control-sidebar-dark">

    </aside>

</div>
<?php include 'components/footer.php' ?>
