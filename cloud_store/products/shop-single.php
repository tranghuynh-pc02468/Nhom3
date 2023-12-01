<?php
// isset kiểm tra có tồm taị hay kkhoong
$id = $_GET['id'];
// id đường dẫn shop
if (isset($_GET['id'])) {
    $db = new Product();
    $result = $db->getById($_GET['id']);
    $category_id = $result['category_id'];
    $_SESSION['product_id'] = $result['id'];
//    tăng lượt xem khi nhấp vào xem chi tiết SP
    $db -> insertView($id);
} else {
    $result = [];
}


?>
<div class="bg-light py-3">
    <div class="container">
        <div class="row">
            <div class="col-md-12 mb-0"><a href="index.php?page=home">Trang chủ</a> <span class="mx-2 mb-0">/</span>
                <strong class="text-black"><?= $result['name'] ?></strong></div>
        </div>
    </div>
</div>

<div class="site-section">
    <div class="container">
        <form action="index.php?page=add-to-cart" method="POST">
            <div class="row">
                <div class="col-md-6">
                    <img src="../../upload/<?= isset($result['image']) ? $result['image'] : '' ?>" alt="image"
                         class="img-fluid">
                </div>
                <div class="col-md-6">
                    <h2 class="text-black"><?= isset($result['name']) ? $result['name'] : '' ?></h2>
                    <p><?= isset($result['content']) ? $result['content'] : '' ?></p>
                    <!-- <p class="mb-4">Ex numquam veritatis debitis minima quo error quam eos dolorum quidem perferendis. Quos repellat dignissimos minus, eveniet nam voluptatibus molestias omnis reiciendis perspiciatis illum hic magni iste, velit aperiam quis.</p> -->
                    <p>
                        <strong class="text-primary h4"><?= isset($result['price']) ? number_format($result['price']) : '' ?> đ</strong>
                    </p>
                    <div class="mb-1 d-flex">
                        <?php
                        $size = new sizes();
                        $getSize = $size->size_editProduct($id);
                        foreach ($getSize as $item) {
                            ?>
                            <div class="custom-control custom-radio mr-3">
                                <input class="custom-control-input" type="radio" id="<?= $item['name'] ?>" name="size" value="<?= $item['name'] ?>">
                                <label for="<?= $item['name'] ?>" class="custom-control-label text-primary"><?= $item['name'] ?></label>
                            </div>
                        <?php } ?>
                    </div>
                    <div class="mb-4"><small class="text-danger"><?php if(isset($_SESSION['error-size'])) echo $_SESSION['error-size']; unset($_SESSION['error-size']); ?></small></div>
                    <div class="mb-4">
                        <div class="input-group mb-3" style="max-width: 120px;">
                            <div class="input-group-prepend">
                                <button class="btn btn-outline-primary js-btn-minus" type="button">&minus;</button>
                            </div>
                            <input type="text" class="form-control text-center" value="1" placeholder="" min="1"
                                   aria-label="Example text with button addon" aria-describedby="button-addon1"
                                   name="quantity">
                            <div class="input-group-append">
                                <button class="btn btn-outline-primary js-btn-plus" type="button">&plus;</button>
                            </div>
                        </div>

                    </div>

                    <input type="hidden" name="image" value="<?= $result['image'] ?>">
                    <input type="hidden" name="name" value="<?= $result['name'] ?>">
                    <input type="hidden" name="price" value="<?= $result['price'] ?>">
                    <button type="submit" name="btn-add-cart" class="btn btn-sm btn-primary" >
                        Thêm vào giỏ hàng
                    </button>

                </div>
            </div>
        </form>
    </div>
</div>


<div class="row mb">
    <?php
    // is_null và is_array kiểm tra coi nó có phải là mảng hay ko và có pahir là 1 mảng ko
    if (isset($onesp) && is_array($onesp)) {
        extract($onesp);
        ?>
        <div class="boxtitle"><?= $name ?></div>
        <div class="row boxcontent">
            <?php
            $img = $img_path . $img;
            $formatted_price = number_format($price, 0, '.', '.') . ' VNĐ';
            echo $formatted_price;
            echo '<img class="small-image" src="' . $img . '"><br>';
            echo $mota;
            ?>
        </div>
    <?php } ?>

</div>

<div class="m-lg-5 row mb" id="comment">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script>
        $(document).ready(function () {
            $("#comment").load("/cloud_store/comments/comment.php", {
                product_id: <?= $id ?>
            });
        });
    </script>

    <div class="boxtitle m-lg-5">Bình luận</div>
    <!-- <iframe src="<?= $id ?>" width="100%" height="300px" frameborder="0"> -->
    <!-- <label for="text" class="form-label">Bình luận</label>
      <input type="text" class="form-control" aria-describedby="emailHelp"> -->
    <!-- </iframe> -->


    <div class="row boxcontent">
    </div>

</div>


<div class="site-section block-3 site-blocks-2 bg-light">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-7 site-section-heading text-center pt-4">
                <h2>Sản phẩm liên quan</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="nonloop-block-3 owl-carousel">

                    <?php
                    $db = new product();
                    $result = $db->getListDM($id, $category_id);
                    foreach ($result as $row) {
                        ?>

                        <div class="item">
                            <div class="block-4 text-center h-100">
                                <figure class="block-4-image">
                                    <a href="index.php?page=shop-single&id=<?= $row['id'] ?>"><img
                                                src="../../upload/<?= $row['image'] ?>" alt="Image placeholder"
                                                class="img-fluid"></a>
                                </figure>
                                <div class="block-4-text p-4">
                                    <h3>
                                        <a href="index.php?page=shop-single&id=<?= $row['id'] ?>"><?= $row['name'] ?></a>
                                    </h3>
                                    <p class="mb-0"></p>
                                    <p class="text-primary font-weight-bold"><?= number_format($row['price']) ?> đ</p>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>


</div>


    </body>

</html>