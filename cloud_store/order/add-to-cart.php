<?php
if(isset($_POST['btn-add-cart'])){
    $image = $_POST['image'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $size = $_POST['size'] ?? '';
    $quantity = $_POST['quantity'];
    $product_id = $_SESSION['product_id'];
    $tam = 1;

//    kiểm tra đăng nhập
    if(isset($_SESSION['user_name'])){
        if(!isset($_SESSION['my-cart'])){
            $_SESSION['my-cart'] = array();
        }

        if(empty($size)){
            $_SESSION['error-size'] = "Vui lòng chọn 1 size";
            header('location: index.php?page=shop-single&id='.$product_id);
        }else{
            // kiểm tra nếu SP có trong giỏ hàng và cùng size thì + số lượng lên thêm
            if (isset($_SESSION['my-cart']) && count($_SESSION['my-cart']) > 0) {
                $i = 0;
                foreach ($_SESSION['my-cart'] as $item) {
                    if ($product_id == $item[0] && $size == $item[3]) {
                        $quantity = $quantity + $item[5];
                        $_SESSION['my-cart'][$i][5] = $quantity;
                        $tam = 0;
                        break;
                    }
                    $i++;
                }
            }
            // chưa có SP trong giỏ hàng
            if ($tam == 1) {
                $product_array = array($product_id, $image, $name, $size, $price, $quantity);
                array_push($_SESSION['my-cart'], $product_array );
            }

            header('location: index.php?page=view-cart');
            exit;
        }

    }else{
        // nếu chưa đăng nhập
        header('location: index.php?page=login');
    }
}