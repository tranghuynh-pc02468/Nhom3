<?php
class sizes{
    var $id = null;
    var $name = null;

    //Hiển thị bảng
    public function getList()
    {
        $pdo = new connect();
        $sql = "SELECT * FROM sizes
                ORDER BY id DESC";
        $result = $pdo->pdo_query($sql);
        return $result;
    }


    //Hiển thị mã
    public function getById($id)
    {
        $pdo = new connect();
        $sql = 'SELECT * FROM sizes WHERE id  = ' . $id;
        $result = $pdo->pdo_query_one($sql);
        return $result;
    }
    //Edit
    public function getupdate($id, $name)
    {
        $pdo = new connect();
        $sql = "UPDATE sizes SET id = '$id', name = '$name' WHERE id = " . $id;
        $result = $pdo->pdo_execute($sql);
        return $result;
    }

    //Add
    public function getAdd($name)
    {
        $pdo = new connect();
        $sql = "INSERT INTO sizes (`name`) VALUES ('$name')";
        $result = $pdo->pdo_execute($sql);
        return $result;
    }

    //Xóa
    public function getDeLeTe($id)
    {
        $pdo = new connect();
        $sql = 'DELETE FROM sizes WHERE id  = ' . $id;
        $result = $pdo->pdo_execute($sql);
        return $result;
    }

//    lấy size lúc sửa sản phẩm
    function size_editProduct($id){
        $db = new connect();
        $sql = "SELECT sizes.id, sizes.name, size_detail.product_id, size_detail.size_id  FROM sizes 
                JOIN size_detail  ON sizes.id = size_detail.size_id WHERE size_detail.product_id = '$id' ";
        return $db->pdo_query($sql);
    }
}