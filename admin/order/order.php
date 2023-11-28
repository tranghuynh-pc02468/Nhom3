<?php
class order{
    var $id = null;
    var $user_id = null;
    var $date = null;
    var $address = null;
    var $phone = null;
    var $total = null;
    var $payment_method = null;

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

}