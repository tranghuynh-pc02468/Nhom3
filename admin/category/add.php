<?php
include "components/header.php";
include "components/sidebar.php";
?>

<?php
if (isset($_POST['themmoi']) && ($_POST['themmoi'])) {
    //lay dl tu form
    $name = $_POST['name'] ?? "";

    // kt loi
    if (empty($name)) {
        $error_name = "Vui lòng không bỏ trống";
    } else {
        $db = new category();
        $result = $db->getList();
        foreach ($result as $item) {
            if ($name === $item['name']) {
                $error_name = "Tên đã tồn tại";
            }
        }
    }
    if(!isset($error_name)){
        $db = new category();
        $db->getAdd($name);
        $_SESSION['message'] = "Thêm thành công";
        header('location: index.php?page=listcategory');
    }


}

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
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Thêm Mới</h3>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->
                                <form method="post">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="email">Mã danh mục</label>
                                            <input type="text" disabled name="id" class="form-control "
                                                   placeholder="Mục này không được nhập">
                                        </div>
                                        <div class="form-group">
                                            <label for="email">Tên danh mục</label>
                                            <input type="text" class="form-control" name="name">
                                            <?php
                                            // ktra neu $error_name ton tai thi in 1 dong bao loi
                                            if (isset($error_name)) {
                                                echo '<small class="text-danger"> ' . $error_name . ' </small>';
                                            }

                                            ?>

                                        </div>


                                        <!-- /.card-body -->

                                        <div class="card-footer">
                                            <input type="submit" name="themmoi" class="btn btn-primary"
                                                   value="Thêm Mới">
                                            <button type="reset" class="btn btn-primary">Nhập lại</button>
                                            <a href="index.php?page=listcategory" type="reset" class="btn btn-primary">Hủy
                                                bỏ</a>
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