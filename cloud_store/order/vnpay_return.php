<?php
require ('config.php');


$vnp_SecureHash = $_GET['vnp_SecureHash'];
$inputData = array();
foreach ($_GET as $key => $value) {
    if (substr($key, 0, 4) == "vnp_") {
        $inputData[$key] = $value;
    }
}

unset($inputData['vnp_SecureHash']);
ksort($inputData);
$i = 0;
$hashData = "";
foreach ($inputData as $key => $value) {
    if ($i == 1) {
        $hashData = $hashData . '&' . urlencode($key) . "=" . urlencode($value);
    } else {
        $hashData = $hashData . urlencode($key) . "=" . urlencode($value);
        $i = 1;
    }
}

$secureHash = hash_hmac('sha512', $hashData, $vnp_HashSecret);

if ($secureHash == $vnp_SecureHash) {
    if ($_GET['vnp_ResponseCode'] == '00') {
        $user_id = $_SESSION['user_id'];
        $date = date('Y-m-d H:i:s');
        $total = $_SESSION['order']['total'];
        $payment_method = 1;

        $dbOrder = new order();
        $result = $dbOrder->getInsertOrder($user_id, $date, $_SESSION['order']['address'], $_SESSION['order']['phone'], $total, $payment_method);
        if ($result) {
            $order_id = $result;
            for ($i = 0; $i < count($_SESSION['my-cart']); $i++) {
                // $product_id, $image, $name, $size, $price, $quantity
                $product_id = $_SESSION['my-cart'][$i][0];
                $quantity = $_SESSION['my-cart'][$i][5];
                $price = $_SESSION['my-cart'][$i][4];
                $size = $_SESSION['my-cart'][$i][3];

                $dbOrder->getInsertOrderDetail($order_id, $product_id, $quantity, $price, $size);
            }


        }
        unset($_SESSION['my-cart']);
        unset($_SESSION['order']);
        header('location: index.php?page=thanks');exit;
    } else {
        echo "<span style='color:red'>GD Khong thanh cong</span>";
    }
}





