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

}

// cập nhật lại
if (isset($_POST['editpro'])) {
    $category_id = $_POST['category_id'] ?? "";
    $name = $_POST['name'] ?? "";
    $price = $_POST['price'] ?? "";
    $image_upload = save_file('image_upload', $UPLOAD_URL);
    $image = strlen($image_upload) > 0 ? $image_upload : $image;
    $content = $_POST['content'] ?? "";
    $size = $_POST['sizes'] ?? "";
    $views = $_POST['views'];
    $quantity = $_POST['quantity'] ?? '';

    // kt loi ten
    if (empty($name)) {
        $error_name = 'Vui lòng nhập thông tin';
    }
// lt loi gia
    if (empty($price)) {
        $error_price = "Vui lòng không bỏ trống giá";
    } else {
        $pattern = '/[a-z]/';
        if (preg_match($pattern, $price)) {
            $error_price = 'Giá phải là số';
        }
    }
// kt loi size
    if (empty($size)) {
        $error_size = 'Vui lòng chọn size';
    }
// kt loi k chon danh muc
    if (empty($category_id)) {
        $error_category = "Vui lòng chọn danh mục";
    }
// kt loi k nhap content
    if (empty($content)) {
        $error_content = "Không được bỏ trống";
    }
    if(empty($quantity)){
        $error_quantity = "Vui lòng nhập thông tin";
    }else{
        if(!preg_match('/^\d{1,3}$/', $quantity)){
            $error_quantity = "Vui lòng nhập đúng số lượng";
        }
    }

// var_dump($name, $price, $image, $category_id, $content);
    if (!isset($error_name) && !isset($error_price) && !isset($error_size) && !isset($error_category) && !isset($error_content) && !isset($error_quantity)) {
        // Xóa product_id = id đang sửa ở bảng size_detail
        $dbSizeDetail = new size_detail();
        $dbSizeDetail->getDeleteProductId($id);

        // Cập nhật lại sản phẩm
        $db = new product();
        $lastInsertId = $db->getupdate($id, $category_id, $name, $price, $quantity, $image, $content, $views);

        // insert lại theo id sp đang sửa và size đã chọn
        for ($i = 0; $i < sizeof($size); $i++) {
            $size_id = $size[$i];
            $dbSizeDetail->getInsert($id, $size_id);
        }

        $_SESSION['message'] = "Cập nhật thành công";
        header('location: index.php?page=listpro');
    }


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
                                                    if ($item['id'] == $category_id) {
                                                        echo '<option selected value="' . $item['id'] . '">' . $item['name'] . '</option>';
                                                    } else {
                                                        echo '<option value="' . $item['id'] . '">' . $item['name'] . '</option>';
                                                    }
                                                }
                                                ?>

                                            </select>
                                            <?php
                                            if (isset($error_category)) {
                                                echo '<small class="text-danger">' . $error_category . '</small>';
                                            }
                                            ?>
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
                                            if (isset($error_price)) {
                                                echo '<small class="text-danger">' . $error_price . '</small>';
                                            }
                                            ?>
                                        </div>
                                        <div class="form-group col-6">
                                            <label for="price">Size</label>
                                            <select class="selectpicker form-control border" name="sizes[]" multiple
                                                    title="Chọn size giày">
                                                <?php
                                                $db = new sizes();
                                                $list = $db->getList();
                                                $checked = $db->size_editProduct($id);
                                                foreach ($list as $item) {
                                                    $isCheck = false;
                                                    foreach ($checked as $check) {
                                                        if ($item['id'] == $check['size_id']) {
                                                            $isCheck = true;
                                                        }
                                                    }
                                                    switch ($isCheck) {
                                                        case false:
                                                            echo '<option value="' . $item['id'] . '">' . $item['name'] . '</option>';
                                                            break;
                                                        case true:
                                                            echo '<option selected value="' . $item['id'] . '">' . $item['name'] . '</option>';
                                                            break;
                                                        default:
                                                            echo '<option value="' . $item['id'] . '">' . $item['name'] . '</option>';
                                                            break;
                                                    }
                                                }

                                                ?>

                                            </select>
                                            <?php
                                            if (isset($error_size)) {
                                                echo '<small class="text-danger">' . $error_size . '</small>';
                                            }
                                            ?>
                                        </div>
                                        <div class="form-group col-6">
                                            <label for="exampleInputFile">Hình Ảnh</label>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" name="image_upload">
                                                    <input type="hidden" value="<?=$image?>" name="image">
                                                    <label class="custom-file-label" for="exampleInputFile">Choose
                                                        file</label>
                                                </div>
                                                <div class="input-group-append">
                                                    <span class="input-group-text">Upload</span>
                                                </div>
                                            </div>
                                            <?php
                                            if (isset($error_image)) {
                                                echo '<small class="text-danger">' . $error_image . '</small>';
                                            }
                                            ?>

                                        </div>
                                        <div class="form-group col-6">
                                            <label for="" class="form-label">Số lượng</label>
                                            <input type="text" class="form-control" name="quantity" value="<?= $quantity ?>">
                                            <small class="text-danger"><?= $error_quantity ?? '' ?></small>
                                        </div>
                                        <input type="hidden" name="views" value="<?= $views ?>">
                                        <div class="form-group col-12">
                                            <label for="" class="form-label">Mô tả</label>
                                            <textarea name="content" id="summernote" class="form-control" rows="10"><?= $content ?></textarea>
                                        </div>
                                        <?php
                                        if (isset($error_content)) {
                                            echo '<small class="text-danger">' . $error_content . '</small>';
                                        }
                                        ?>
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
