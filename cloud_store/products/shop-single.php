<div class="site-wrap">


    <div class="bg-light py-3">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mb-0"><a href="index.php?page=home">Trang chủ</a> <span class="mx-2 mb-0">/</span>
                    <strong class="text-black">Chi tiết sản phẩm</strong></div>
            </div>
        </div>
    </div>

    <?php
    // isset kiểm tra có tồm taị hay kkhoong
    $id = $_GET['id'];
    // id đường dẫn shop
    if (isset($_GET['id'])) {
        $db = new Product();
        $result = $db->getById($_GET['id']);
        $category_id = $result['category_id'];
        $_SESSION['id'] = $result['id'];
    } else {
        $result = [];
    }
    ?>

    <div class="site-section">
        <div class="container">
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
                        <strong class="text-primary h4"><?= isset($result['price']) ? number_format($result['price']) : '' ?></strong>
                    </p>
                    <div class="mb-1 d-flex">
                        <label for="option-sm" class="d-flex mr-3 mb-3">
                            <span class="d-inline-block mr-2" style="top:-2px; position: relative;"><input type="radio"
                                                                                                           id="option-sm"
                                                                                                           name="shop-sizes"></span>
                            <span class="d-inline-block text-black">36</span>
                        </label>
                        <label for="option-md" class="d-flex mr-3 mb-3">
                            <span class="d-inline-block mr-2" style="top:-2px; position: relative;"><input type="radio"
                                                                                                           id="option-md"
                                                                                                           name="shop-sizes"></span>
                            <span class="d-inline-block text-black">37</span>
                        </label>
                        <label for="option-lg" class="d-flex mr-3 mb-3">
                            <span class="d-inline-block mr-2" style="top:-2px; position: relative;"><input type="radio"
                                                                                                           id="option-lg"
                                                                                                           name="shop-sizes"></span>
                            <span class="d-inline-block text-black">38</span>
                        </label>
                        <label for="option-xl" class="d-flex mr-3 mb-3">
                            <span class="d-inline-block mr-2" style="top:-2px; position: relative;"><input type="radio"
                                                                                                           id="option-xl"
                                                                                                           name="shop-sizes"></span>
                            <span class="d-inline-block text-black">39</span>
                        </label>
                    </div>
                    <div class="mb-5">
                        <div class="input-group mb-3" style="max-width: 120px;">
                            <div class="input-group-prepend">
                                <button class="btn btn-outline-primary js-btn-minus" type="button">&minus;</button>
                            </div>
                            <input type="text" class="form-control text-center" value="1" placeholder=""
                                   aria-label="Example text with button addon" aria-describedby="button-addon1">
                            <div class="input-group-append">
                                <button class="btn btn-outline-primary js-btn-plus" type="button">&plus;</button>
                            </div>
                        </div>

                    </div>
                    <p><a href="#" class="buy-now btn btn-sm btn-primary">Thêm vào giỏ hàng</a></p>

                </div>
            </div>
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
                                        <p class="text-primary font-weight-bold"><?= number_format($row['price']) ?></p>
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


</div>


    </body>

</html>