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
                        <h1 class="m-0">Sản Phẩm</h1>
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
                            <h3 class="card-title">Cập nhật sản phẩm</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form>
                            <div class="card-body">
                                <div class="form-group">
                                    Mã sản phẩm</br>
                                    <input type="text" class="form-control" name="id">
                                </div>
                                <div class="form-group">
                                    Tên sản phẩm
                                    <input type="text" class="form-control" name="name">
                                </div>
                                <div class="form-group">
                                    Giá
                                    <input type="text" class="form-control" name="price">
                                </div>
                                <div class="form-group">
                                    Hình
                                    <input type="file" class="form-control" name="image">
                                </div>
                                <div class="form-group">
                                    Mô tả
                                    <textarea id="summernote" name="content" value="" rows="10"></textarea>
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <input ype="submit" class="btn btn-primary" value="Cập nhật" name="edit_pro">
                                <button type="reset" class="btn btn-primary">Huỷ</button>
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
<?php
    if(isset($_POST['edit_pro'])) {
        $id=$_GET['id'];
        $name=$_POST['name'];
        $name=$_POST['price'];
        $name=$_POST['image'];
        $name=$_POST['content'];
        $db = new product();
        $db->getupdate($id, $name);
        header('location:index.php?page=listpro');
    }

?>