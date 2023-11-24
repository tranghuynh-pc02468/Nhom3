<?php
class size_detail{
    var $id = null;
    var $product_id = null;
    var $size_id = null;

//    hàm dùng để thêm product_id và size_id vào bảng size_detail
    function getInsert($product_id, $size_id){
        $db = new connect();
        $sql = "INSERT INTO size_detail(product_id, size_id) VALUES('$product_id', '$size_id')";
        return  $db->pdo_execute($sql);
    }

//    Xóa cột product_id
    function getDeleteProductId($id){
        $db = new connect();
        $sql = "DELETE FROM size_detail WHERE product_id = '$id' ";
        return $db -> pdo_execute($sql);
    }


}
