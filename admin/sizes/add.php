<?php
include "components/header.php";
include "components/sidebar.php";
?>
<?php

if (isset($_POST['addsize']) && ($_POST['addsize'])) {
    $name = $_POST['name'] ?? "";


    // kt loi ten
    if (empty($name)) {
        $error_name = 'Vui lòng nhập thông tin';
    } elseif(!empty($name)) {
        $pattern = '/[a-z]/';
        if (preg_match($pattern, $name)) {
            $error_name = 'Size phải là số';
        }
    } else {
        // lấy tất cả tên trong csdl ra để so sánh
        $db = new sizes();
        $result = $db->getList();
        foreach ($result as $item) {
            if($name == $item['name']) {
                $error_name = 'Dữ liệu đã tồn tại';
            }
        }
    }


    // var_dump($name, $price, $image, $category_id, $content);
    if (!isset($error_name)) {

        $db = new sizes();
        $result = $db->getAdd($name);
        if ($result) {
            $mgs = "Thành công";
            header('location: index.php?page=listsize');
        } else {
            $mgs = "Lỗi";
        }


    } else {
        $mgs = "Không insert được";
    }

}
?>

    <div class="wrapper">
        <div class="content-wrapper">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Size</h1>
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

                                <!-- /.card-header -->
                                <!-- form start -->
                                <form method="post" enctype="multipart/form-data">
                                    <div class="card-body">

                                        <div class="form-group">
                                            <label for="name">Size</label>
                                            <input type="text" class="form-control" name="name">
                                            <?php
                                            if (isset($error_name)) {
                                                echo '<small class="text-danger">' . $error_name . '</small>';
                                            }
                                            ?>
                                        </div>
                                    </div>

                                    <!-- /.card-body -->

                                    <div class="card-footer">
                                        <input type="submit" class="btn btn-primary" value="Thêm" name="addsize">
                                        <button type="reset" class="btn btn-primary">Huỷ</button>
                                        <a href="index.php?page=listsize" class="btn btn-primary">Danh Sách</a>
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