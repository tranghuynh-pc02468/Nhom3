<?php
include "components/header.php";
include "components/sidebar.php";
?>
<?php
$id = $_GET['id'] ?? '';
// lấy dữ liệu để hiển thị input
if (!empty($id)) {
    $product = new product();
    $result = $product->getById($id);
    extract($result);
//    var_dump($result);


}

// cập nhật lại
if (isset($_POST['editpro'])) {
    $category_id = $_POST['category_id'] ?? "";
    $name = $_POST['name'] ?? "";
    $price = $_POST['price'] ?? "";
    $image = save_file('image', $UPLOAD_URL);
    $content = $_POST['content'] ?? "";
    $size_id = $_POST['size_id'] ?? "";
    $views = 0;

    $db = new product();
    $result = $db->getupdate($id, $category_id, $name, $price, $image, $content, $views);
} 



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
                            <div class="card-body">
                                <form method="post" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="form-group col-6">
                                            <label for="category_id">Danh Mục</label>
                                            <select class="form-control" name="category_id">
                                                <option>Chọn danh mục</option>
                                                <?php
                                                $db = new category();
                                                $list = $db->getList();
                                                foreach ($list as $item) {
                                                    extract($item);
                                                    echo '<option value="' . $id . '">' . $name . '</option>';
                                                }

                                                if (empty($category_id)) {
                                                    $error_category = "Vui lòng chọn danh mục";
                                                }
                                                ?>

                                            </select>
                                        </div>
                                        <div class="form-group col-6">
                                            <label for="name">Tên Sản Phẩm</label>
                                            <input type="text" class="form-control" name="name" value="<?= $name ?>">
                                            <?php
                                            if (isset($error_name)) {
                                                echo '<small class="text-danger">' . $error_name . '</small>';
                                            }
                                            ?>
                                        </div>
                                        <div class="form-group col-6">
                                            <label for="price">Giá</label>
                                            <input type="text" class="form-control" name="price" value="<?= $price ?>">
                                            <?php
                                            
                                            ?>
                                        </div>
                                        <div class="form-group col-6">
                                            <label for="price">Size</label>
                                            <select class="selectpicker form-control border" name="size_id" multiple
                                                title="Chọn size giày">
                                                <?php
                                                $db = new sizes();
                                                $list = $db->getList();
                                                foreach ($list as $item) {
                                                    extract($item);
                                                    echo '<option value="' . $id . '">' . $name . '</option>';
                                                }

                                                if (empty($size_id)) {
                                                    $error_size = 'Vui lòng chọn size';
                                                }
                                                ?>

                                            </select>
                                        </div>
                                        <div class="form-group col-12">
                                            <label for="exampleInputFile">Hình Ảnh</label>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" name="image">
                                                    <label class="custom-file-label" for="exampleInputFile">Choose
                                                        file</label>
                                                    <?php
                                                    if (empty($image)) {
                                                        $error_image = "Vui lòng chọn ảnh";
                                                    }
                                                    ?>
                                                </div>
                                                <div class="input-group-append">
                                                    <span class="input-group-text">Upload</span>
                                                </div>
                                            </div>
                                        </div>
                                        <input type="hidden" name="views" value="0">
                                        <div class="form-group col-12">
                                            <label for="" class="form-label">Mô tả</label>
                                            <textarea name="content" class="form-control" rows="10"><?= $content ?></textarea>
                                            <?php
                                            if (empty($content)) {
                                                $error_content = "Không được bỏ trống";
                                            }
                                            ?>
                                        </div>
                                    </div>
                                    <!-- /.card-body -->

                                    <div class="card-footer">
                                        <input type="submit" class="btn btn-primary" value="Cập nhật" name="editpro">
                                        <!-- <button type="submit" class="btn btn-primary">Them</button> -->
                                        <button type="reset" class="btn btn-primary">Huỷ</button>
                                        <a href="index.php?page=listpro" class="btn btn-primary">Danh Sách</a>
                                    </div>
                                </form>
                            </div>
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
