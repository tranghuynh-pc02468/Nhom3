<?php
include "components/header.php";
include "components/sidebar.php";
?>
<?php
$id=$_GET['id']??'';
if(!empty('$id')){
    $db= new category();
    $list = $db->getById( $id);

}

if(isset($_POST['capnhat']) && ($_POST['capnhat'])){
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
        $db->getupdate($id, $name);
        $_SESSION['message'] = "Cập nhật thành công";
        header('location:index.php?page=listcategory');
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
                                <h3 class="card-title">Cập nhập loại hàng</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form method="post">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="email">Mã danh mục</label>
                                        <input type="text" disabled name="id" class="form-control"
                                               placeholder="Mục này không được nhập">
                                    </div>
                                    <div class="form-group">
                                        <label>Tên danh mục</label>
                                        <input type="text" class="form-control" name="name"
                                               value="<?= $list['name'] ?>">
                                        <small class="text-danger"><?= $error_name ?? '' ?></small>
                                    </div>


                                    <!-- /.card-body -->

                                    <div class="card-footer">
                                        <input type="submit" name="capnhat" class="btn btn-primary" value="Cập Nhật">
                                        <button type="reset" class="btn btn-primary">Nhập lại</button>
                                        <a class="btn btn-primary" href="index.php?page=listcategory">Hủy bỏ</a>
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

