<?php
class category{

    var $id = null;
    var $name = null;

    //Hiển thị bảng
    public function getList(){
        $pdo = new connect();
        $sql = 'SELECT * FROM categories';
        $result = $pdo->pdo_query($sql);
        return $result;
    }

    //Hiển thị mã
    public function getById( $id){
        $pdo = new connect();
        $sql = 'SELECT * FROM categories WHERE id  = '.$id;
        $result = $pdo->pdo_query_one($sql);
        return $result;
    }
    //Edit
    public function getupdate($id, $name){
        $pdo = new connect();
        $sql = "UPDATE categories SET id = '$id', name = '$name' WHERE id = ".$id;
        $result = $pdo->pdo_execute($sql);
        return $result;
    }

    //Add
    public function getAdd($name){
        $pdo = new connect();
        $sql = "INSERT INTO categories (`name`) VALUES ('$name')";
        $result = $pdo->pdo_query($sql);
        return $result;
    }

    //Xóa
    public function getDeLeTe($id){
        $pdo = new connect();
        $sql = 'DELETE FROM categories WHERE id  ='.$id;
        $result = $pdo->pdo_query_one($sql);
        return $result;
    }

}
