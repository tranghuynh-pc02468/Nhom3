<?php if (isset($_SESSION['user_name'])) { ?>
    <div class="bg-light py-3">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mb-0"><a href="index.php">Trang chủ</a> <span class="mx-2 mb-0">/</span> <strong
                            class="text-black">Giỏ hàng</strong></div>
            </div>
        </div>
    </div>
    <div class="site-section">
        <div class="container">
            <?php
            if (isset($_SESSION['my-cart']) && count($_SESSION['my-cart']) > 0) { //var_dump($_SESSION['my-cart']);
                ?>
                <div class="row mb-5">
                    <form class="col-md-12" method="post">
                        <div class="site-blocks-table">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th class="product-thumbnail">Hình ảnh</th>
                                    <th class="product-name">Tên sản phẩm</th>
                                    <th class="product-price">Size</th>
                                    <th class="product-price">Đơn giá</th>
                                    <th class="product-quantity">Số lượng</th>
                                    <th class="product-total">Số tiền</th>
                                    <th class="product-remove">Thao tác</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $i = 0;
                                $total = 0;
                                foreach ($_SESSION['my-cart'] as $item) {
                                $total = $total + ($item[4] * $item[5]);
                                    ?>
                                    <tr>
                                        <td class="product-thumbnail">
                                            <img src="../upload/<?= $item[1] ?>" alt="Image" class="img-fluid">
                                        </td>
                                        <td class="product-name">
                                            <h2 class="h5 text-black"><?= $item[2] ?></h2>
                                        </td>
                                        <td><?= $item[3] ?></td>
                                        <td><?= number_format($item[4]) ?> đ</td>
                                        <td><?= $item[5] ?></td>
                                        <td><?= number_format($item[4] * $item[5]) ?> đ</td>
                                        <td><a href="index.php?page=delete-cart&id=<?= $i ?>"
                                               class="btn btn-primary btn-sm">X</a></td>
                                    </tr>
                                    <?php $i++; } ?>
                                </tbody>
                            </table>
                        </div>
                    </form>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="row mb-5">
                            <div class="col-md-6 mb-3 mb-md-0">
                                <a href="index.php?page=shop" class="btn btn-primary btn-sm btn-block">Tiếp tục mua
                                    sắm</a>
                            </div>
                            <div class="col-md-6">
                                <a href="index.php?page=delete-cart" class="btn btn-outline-primary btn-sm btn-block">Làm trống giỏ hàng</a>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-6 pl-5">
                        <div class="row justify-content-end">
                            <div class="col-md-7">
                                <div class="row">
                                    <div class="col-md-12 text-right border-bottom mb-5">
                                        <h3 class="text-black h4 text-uppercase" style=" font-family: 'Arial', 'Helvetica', 'sans-serif'; ">Tổng thanh toán</h3>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-6 offset-6 text-right">
                                        <strong class="text-black"><?= number_format($total) ?> đ</strong>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <a href="index.php?page=checkout" class="btn btn-primary btn-lg py-3 btn-block">Thanh toán</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            <?php } else { ?>
                <!-- Nếu giỏ hàng trống -->
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h2 class="display-3 text-black text-uppercase"
                            style=" font-family: 'Arial', 'Helvetica', 'sans-serif'; ">Giỏ hàng trống!</h2>
                        <p><a href="index.php?page=shop" class="btn btn-sm btn-primary">Quay lại cửa hàng</a></p>
                    </div>
                </div>

            <?php } ?>

        </div>
    </div>
    <?php
} else {
    // nếu chưa đăng nhập
    header('location: index.php?page=login');
}
?>

