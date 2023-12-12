<?php
date_default_timezone_set('Asia/Ho_Chi_Minh');
if (isset($_POST['order-cod'])) {
    $user_id = $_SESSION['user_id'];
    $date = date('Y-m-d H:i:s');
    $address = $_POST['address'] ?? '';
    $phone = $_POST['phone'] ?? '';
    $total = $_POST['total'];
    $payment_method = 0;

    if (empty($address)) {
        $error_address = "Vui lòng nhập thông tin";
    } else {
        if (strlen($address) < 5) {
            $error_address = "Địa chỉ quá ngắn. Địa chỉ phải có 5 ký tự trở lên";
        }
    }
    if (empty($phone)) {
        $error_phone = "Vui lòng nhập thông tin";
    } else {
        if (!preg_match('/^0(9|8|7|3)[0-9]{8}$/', $phone)) {
            $error_phone = "Số điện thoại không hợp lệ";
        }
    }

    if (!isset($error_address) && !isset($error_phone)) {
        $dbOrder = new order();
        $result = $dbOrder->getInsertOrder($user_id, $date, $address, $phone, $total, $payment_method);
        if ($result) {
            $order_id = $result;
            for ($i = 0; $i < count($_SESSION['my-cart']); $i++) {
                // $product_id, $image, $name, $size, $price, $quantity
                $product_id = $_SESSION['my-cart'][$i][0];
                $quantity = $_SESSION['my-cart'][$i][5];
                $price = $_SESSION['my-cart'][$i][4];
                $size = $_SESSION['my-cart'][$i][3];

                $dbOrder->getInsertOrderDetail($order_id, $product_id, $quantity, $price, $size);
                $db = new product();
                $db -> updateQuantity($quantity, $product_id);
            }
            $title = "Đặt hàng thành công";
//            $content = $db -> emailOder($_SESSION['user_name'], $phone, $address, $payment_method, $_SESSION['my-cart']);
            $content = '<!doctype html>
    <html lang="en">
    
    <head>
        <title>Title</title>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    
        <!-- Bootstrap CSS v5.2.1 -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    </head>
    
    <body>
        <div class="container">
            <div class="row mt-3">
                <div class="col-md-6 offset-3 ">
                    <p>Xin chào ' . $_POST['user_name'] . ', <br> Đơn hàng của bạn đã được đặt thành công</p>
                    <h5>Địa chỉ thanh toán</h5>
                     <div class="mb-4">
                        <p class="mb-0">tên</p>
                        <p class="mb-0">sdt</p>
                        <p class="mb-0">địa chỉ</p>
                        <p class="mb-0">pttt</p>
                     </div>
                    <h5>Chi tiết đơn hàng</h5>
                    <table class="table table-bordered table-responsive">
                    <thead>
                        <tr>
                            <th>Tên SP</th>
                            <th>Đơn giá</th>
                            <th>Số lượng</th>
                            <th>Thành tiền</th>
                        </tr> 
                    </thead>
                    <tbody>
                        <tr>
                            <td>Air Jordan 1 Low <br><small>size: 37</small></td>
                            <td class="text-end">350.000 đ</td>
                            <td class="text-end">1</td>
                            <td class="text-end">350000</td>
                        </tr>
                        <tr>
                            <td>Air Jordan 1 Low <br> <small>size: 37</small></td>
                            <td class="text-end">350.000 đ</td>
                            <td class="text-end">1</td>
                            <td class="text-end">350000</td>
                        </tr>
                        <tr class="text-end">
                            <td colspan="3">Tổng tiền hàng</td>
                            <td>dsfjkh</td>
                        </tr>
                        <!-- <tr class="text-md-end">
                            <td colspan="3">Phương thức thanh toán</td>
                            <td>dsfjkh</td>
                        </tr> -->
                        <tr class="text-end">
                            <td colspan="3">Tổng cần thanh toán</td>
                            <td>dsfjkh</td>
                        </tr>
                    </tbody>
                </table>
    <p>Cảm ơn bạn đã đặt hàng</p>
    
                </div>
    
            </div>
            <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
                integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
                crossorigin="anonymous"></script>
    
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
                integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
                crossorigin="anonymous"></script>
    </body>
    
    </html>';
            $email = $_SESSION['user_email'];
//            $mail = new mailer();
            $mail->sendMail($title, $content, $email);
            unset($_SESSION['my-cart']);
            header('location: index.php?page=thanks');
        }
    }

}
if (isset($_POST['order-vnpay'])) {
    $address = $_POST['address'] ?? '';
    $phone = $_POST['phone'] ?? '';
    $_SESSION['order']['total'] = $_POST['total'];

    if (empty($address)) {
        $error_address = "Vui lòng nhập thông tin";
    } else {
        if (strlen($address) < 5) {
            $error_address = "Địa chỉ quá ngắn. Địa chỉ phải có 5 ký tự trở lên";
        }
    }
    if (empty($phone)) {
        $error_phone = "Vui lòng nhập thông tin";
    } else {
        if (!preg_match('/^0(9|8|7|3)[0-9]{8}$/', $phone)) {
            $error_phone = "Số điện thoại không hợp lệ";
        }
    }

    if (!isset($error_address) && !isset($error_phone)) {
        $_SESSION['order']['address'] = $address;
        $_SESSION['order']['phone'] = $phone;
        header('location: index.php?page=vn-pay');
//        exit();
        }

}
?>
<div class="bg-light py-3">
    <div class="container">
        <div class="row">
            <div class="col-md-12 mb-0"><a href="index.php">Trang chủ</a> <span class="mx-2 mb-0">/</span> <a
                        href="index.php?page=view-cart">Giỏ hàng</a> <span class="mx-2 mb-0">/</span> <strong
                        class="text-black">Thông tin giao hàng</strong></div>
        </div>
    </div>
</div>

<div class="site-section">
    <div class="container">
        <form action="" method="POST">
            <div class="row">
                <div class="col-md-6 mb-5 mb-md-0">
                    <h2 class="h3 mb-3 text-black" style=" font-family: 'Arial', 'Helvetica', 'sans-serif'; ">Thông tin
                        giao hàng</h2>
                    <div class="p-3 p-lg-5 border">
                        <div class="form-group row">
                            <div class="col-md-12">
                                <label for="c_companyname" class="text-black">Tên</label>
                                <input type="text" class="form-control" id="c_companyname" name="name"
                                       value="<?= $_SESSION['user_name'] ?>" disabled>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <label for="c_phone" class="text-black">Số điện thoại <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="c_phone" name="phone"
                                       placeholder="VD: 0987654321">
                                <small class="text-danger"><?= $error_phone ?? '' ?></small>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <label for="c_address" class="text-black">Địa chỉ nhận hàng <span
                                            class="text-danger">*</span></label>
                                <textarea class="form-control" name="address" rows="3"
                                          placeholder="VD: 228, Nguyễn Văn Linh, Hưng Lợi, Ninh Kiều, Cần Thơ"></textarea>
                                <small class="text-danger"><?= $error_address ?? '' ?></small>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="hidden" class="form-control" name="user_id" value="<?= $_SESSION['user_id'] ?>">
                            <input type="hidden" class="form-control" value="<?= date('Y-m-d') ?>">

                        </div>
                    </div>
                </div>
                <div class="col-md-6">

                    <div class="row mb-5">
                        <div class="col-md-12">
                            <h2 class="h3 mb-3 text-black" style=" font-family: 'Arial', 'Helvetica', 'sans-serif'; ">
                                Sản phẩm</h2>
                            <div class="p-3 p-lg-5 border">
                                <table class="table site-block-order-table mb-5">
                                    <thead>
                                    <tr>
                                        <th>Tên</th>
                                        <th>Số tiền</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $total = 0;
                                    foreach ($_SESSION['my-cart'] as $item) {
                                        //$product_id[0], $image[1], $name[2], $size, $price, $quantity
                                        $total = $total + ($item[4] * $item[5]);
                                        ?>
                                        <tr>
                                            <td><?= $item[2] ?><strong class="mx-2">x</strong><?= $item[5] ?></td>
                                            <td><?= number_format($item[4] * $item[5]) ?> đ</td>
                                        </tr>
                                    <?php } ?>
                                    <tr>
                                        <td class="text-primary "><strong>Tổng thanh toán</strong></td>
                                        <td class="text-primary "><strong><?= number_format($total) ?>
                                                đ</strong></td>
                                    </tr>
                                    </tbody>
                                </table>
                                <div class="form-group">
                                    <input type="hidden" name="total" value="<?= $total ?>">
                                    <button class="btn btn-primary btn-lg py-3 btn-block" type="submit"
                                            name="order-cod">thanh toán khi nhận hàng
                                    </button>
                                    <button class="btn btn-primary btn-lg py-3 btn-block" type="submit"
                                            name="order-vnpay">thanh toán VNPay
                                    </button>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </form>
    </div>
</div>
