<?php
class order{
    var $id = null;
    var $user_id = null;
    var $date = null;
    var $address = null;
    var $phone = null;
    var $total = null;
    var $payment_method = null;

    var $product_id = null;
    var $order_id = null;
    var $quantity = null;
    var $price = null;
    var $size = null;
    function getAll(){
        $db = new connect();
        $sql = " SELECT orders.id , orders.date, orders.total, users.name as name_user, orders.* FROM orders
                JOIN users ON orders.user_id = users.id ";
        return $db ->pdo_query($sql);
    }

    function getById($id){
        $db = new connect();
        $sql = "SELECT products.name as name_pro,products.image, order_detail.size, order_detail.price, order_detail.quantity  FROM order_detail
                JOIN products ON order_detail.product_id = products.id 
                JOIN orders ON order_detail.order_id = orders.id
                WHERE order_detail.order_id = '$id'   ";
        return $db -> pdo_query($sql);
    }

    public function getInsertOrder($user_id, $date, $address, $phone, $total, $payment_method){
        $db = new connect();
        $sql = "INSERT INTO orders (user_id, date, address, phone, total, payment_method) 
                VALUES ('$user_id', '$date', '$address', '$phone', '$total', '$payment_method')";
        return $db -> pdo_execute($sql);
    }

    public function getInsertOrderDetail($order_id, $product_id, $quantity, $price, $size){
        $db = new connect();
        $sql = "INSERT INTO order_detail (order_id, product_id, quantity, price, size) 
                VALUES ('$order_id', '$product_id', '$quantity', '$price', '$size')";
        return $db -> pdo_execute($sql);
    }

}