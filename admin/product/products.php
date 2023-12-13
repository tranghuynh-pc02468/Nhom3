<?php
class product{
    var $id = null;
    var $category_id = null;
    var $name = null;
    var $price = null;
    var $image = null;
    var $content = null;
    var $views = null;
    var $quantity = null;

    public function keyword($keyword)
    {
        $pdo = new connect();
        $sql = "SELECT * FROM products WHERE name LIKE '%$keyword%'";
        $result = $pdo->pdo_query($sql);
        return $result;
    }

    //Hiển thị bảng
    public function getList()
    {
        $pdo = new connect();
        $sql = "SELECT * FROM products";
        $result = $pdo->pdo_query($sql);
        return $result;
    }


    // Phân trang
    public function getListP($start, $itemsPerPage)
    {
        // offset xác định vị trí bắt đầu của kết quả
        $pdo = new connect();
        $sql = "SELECT * FROM products where quantity > 0  limit $start offset $itemsPerPage";
        $result = $pdo->pdo_query($sql);
        return $result;
    }

public function getProductTopView(){
        $db = new connect();
        $sql = "SELECT * FROM products WHERE quantity > 0 ORDER BY views DESC LIMIT 6";
        return $db -> pdo_query($sql);
}

    public function getListshop()
    {
        $pdo = new connect();
        $sql = "SELECT * FROM products WHERE quantity > 0
                ORDER BY id DESC";
        $result = $pdo->pdo_query($sql);
        return $result;
    }

    public function getListCategory($id)
    {
        $pdo = new connect();
        $sql = "SELECT * FROM products
                WHERE category_id='$id' AND quantity > 0";
        $result = $pdo->pdo_query($sql);
        return $result;
    }

    //Hiển thị mãư
    public function getById($id)
    {
        $pdo = new connect();
        $sql = 'SELECT *, products.name as name_product FROM products WHERE id  = ' . $id;
        $result = $pdo->pdo_query_one($sql);
        return $result;
    }


    //Edit
    public function getupdate($id, $category_id, $name, $price, $quantity, $image, $content, $views)
    {
        $pdo = new connect();
        $sql = "UPDATE products SET id = '$id', category_id = '$category_id' ,name = '$name', price = '$price', quantity='$quantity', image = '$image', content = '$content', views='$views' WHERE id = " . $id;
        $result = $pdo->pdo_execute($sql);
        return $result;
    }

    //Add
    public function getAdd($category_id, $name, $price, $quantity, $image, $content, $views)
    {
        $pdo = new connect();
        $sql = "INSERT INTO products (`category_id`, `name`, `price`, `quantity`, `image`, `content`, `views`) VALUES ('$category_id', '$name', '$price', '$quantity' ,'$image', '$content', '$views')";
        $result = $pdo->pdo_execute($sql);
        return $result;
    }

    //Xóa
    public function getDeLeTe($id)
    {
        $pdo = new connect();
        $sql = 'DELETE FROM products WHERE id  =' . $id;
        $result = $pdo->pdo_query_one($sql);
        return $result;
    }

//    SP liên quan
    public function getListDM($id, $category_id){
        $db = new connect();
        $sql = "SELECT * FROM products WHERE category_id='$category_id' AND id <> '$id' AND quantity > 0";
        return $db -> pdo_query($sql);
    }

    public function insertView($id){
        $db = new connect();
        $sql = "UPDATE products SET views = views + 1 WHERE id='$id'";
        return $db -> pdo_execute($sql);
    }

    public function updateQuantity($quantity, $id){
        $db = new connect();
        $sql = "UPDATE products SET quantity = quantity - '$quantity' WHERE id = '$id'";
        return $db -> pdo_execute($sql);
    }
    public function emailOder($name, $phone, $address, $payment_method, $cart){
        $result = '';
        $i = 0;
        $total = 0;

        if($payment_method == 0){
            $payment_method = 'Thanh toán khi nhận hàng';
        }else{
            $payment_method = 'Thanh toán VNPAY';
        }

        $result .= '
        <!doctype html>
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
        <style>
        th, td {
            border-collapse: collapse; 
            border: 1px solid black;"
        }
        </style>
        <body>
            <div class="container">
            <div class="row mt-3">
                <div class="col-lg-6 offset-lg-3 col-md-12 ">
                    <p>Xin chào '. $name .', <br> Đơn hàng của bạn đã được đặt thành công</p>
                    <h5 style="font-size: 15px">Địa chỉ thanh toán</h5>
                    <div class="mb-4">
                        <p class="mb-0">SĐT: '. $phone .'</p>
                        <p class="mb-0">Địa chỉ: '. $address .'</p>
                        <p class="mb-0">Phương thức thanh toán: '. $payment_method .'</p>
                    </div>
                    <h5 style="font-size: 15px">Chi tiết đơn hàng</h5>
                    <table style="border-collapse: collapse; border: 1px solid black;">
                        <thead>
                            <tr>
                                <th style="border: 1px solid black;">Tên SP</th>
                                <th style="border: 1px solid black;">Đơn giá</th>
                                <th style="border: 1px solid black;">Số lượng</th>
                                <th style="border: 1px solid black;">Thành tiền</th>
                            </tr>
                        </thead>
                        <tbody> 
        ';

        foreach ($cart as $item) { //$product_id, $image, $name, $size, $price, $quantity
            $total = $total + ($item[4] * $item[5]);
            $result .= '
                            <tr>
                                <td style="border: 1px solid black;">'. $item[2] .' <br><small>Size: '. $item[3] .'</small></td>
                                <td style="border: 1px solid black; text-align: right">'. number_format($item[4]) .' đ</td>
                                <td style="border: 1px solid black; text-align: right">'. $item[5] .'</td>
                                <td style="border: 1px solid black; text-align: right">'. number_format($item[4] * $item[5]) .' đ</td>
                            </tr>
            ';
             $i++;
        }

        $result .= '
                            <tr>
                                <td colspan="3" style="font-weight: bold; text-align: right; border: 1px solid black;">Tổng tiền hàng</td>
                                <td style="text-align: right">'. number_format($total) .' đ</td>
                            </tr> 
                            <tr>
                                <td colspan="3" style="font-weight: bold; text-align: right; border: 1px solid black;">Phí vận chuyển</td>
                                <td style="text-align: right">0 đ</td>
                            </tr> 
                            <tr>
                                <td colspan="3" style="font-weight: bold; text-align: right; border: 1px solid black;">Tổng cần thanh toán</td>
                                <td style="text-align: right; border: 1px solid black;">'. number_format($total) .' đ</td>
                            </tr>
                        </tbody>
                    </table>
                    <p>Cảm ơn bạn đã đặt hàng</p>
    
                </div>
    
            </div>
            
        </body>

        </html>
        ';
        return $result;
    }
}