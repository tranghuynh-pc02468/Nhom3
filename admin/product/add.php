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
                            <h3 class="card-title">Thêm Sản Phẩm</h3>
                        </div>
                        <div class="card-body">
                        <form method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="form-group col-6">
                                    <label for="category_id">Danh Mục</label>
                                    <select class="form-control" name="category_id">
                                         <?php
                                            $db = new category();
                                            $list = $db->getList();
                                            foreach ($list as $item) {
                                                extract($item);
                                                echo '<option value="'.$id.'">'.$name.'</option>';
                                            }
                                         ?>
                                        
                                    </select>
                                </div>
                                <div class="form-group col-6">
                                    <label for="name">Tên Sản Phẩm</label>
                                    <input type="text" class="form-control" name="name">
                                    <?php
                                        if(isset($error_name)) {
                                            echo '<small class="text-danger">'.$error_name.'</small>';
                                        }
                                    ?>
                                </div>
                                <div class="form-group col-6">
                                    <label for="price">Giá</label>
                                    <input type="text" class="form-control" name="price">
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
                                                echo '<option value="'.$id.'">'.$name.'</option>';
                                            }
                                            ?>
                                          
                                    </select>
                                </div>
                                <div class="form-group col-12">
                                    <label for="exampleInputFile">Hình Ảnh</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="image">
                                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                        </div>
                                        <div class="input-group-append">
                                            <span class="input-group-text">Upload</span>
                                        </div>
                                    </div>
                                </div>
                               <div class="form-group col-12">
                                <label for="" class="form-label">Mô tả</label>
                                <textarea name="content" class="form-control" rows="10"></textarea>
                               </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <input type="submit" class="btn btn-primary" value="Thêm" name="addpro">
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
<?php
    if(isset($_POST['addpro'])) {
        $category_id=$_POST['category_id']??'';
        $name=$_POST['name']??'';
        $price=$_POST['price']??'';
        $image=$_POST['image']??'';
        $content=$_POST['content']??'';
        $size=$_POST['size']??'';
        $views=0;

        if(empty($name)) {
            $error_name='Vui lòng nhập thông tin';
        }

        $db = new product();
        $add = $db->getAdd($category_id, $name, $price, $image, $content, $views);
        header('location:index.php?page=listpro');
        exit;
    }

?>
<?php include 'components/footer.php' ?>

