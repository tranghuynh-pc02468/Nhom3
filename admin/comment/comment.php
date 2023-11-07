<?php

class comment
{

    var $id = null;
    var $user_id = null;
    var $product_id = null;
    var $date = null;
    var $content = null;

    public function getCmt()
    {
        $db = new connect();
        $sql = 'SELECT * FROM comments INNER JOIN users ON comments.id = users.id ';
        $result = $db->pdo_query($sql);
        return $result;
    }

    //Hiển thị bảng
    public function getList($id)
    {
        $db = new connect();
        $sql = 'SELECT * FROM comments INNER JOIN users ON comments.id = users.id WHERE id =' . $id;
        $result = $db->pdo_query($sql);
        return $result;
    }

    //Hiển thị mã
    public function getById($id)
    {
        $pdo = new connect();
        $sql = 'SELECT * FROM comments WHERE id  = ' . $id;
        $result = $pdo->pdo_query_one($sql);
        return $result;
    }

    //Edit
    public function getupdate($id, $user_id, $product_id, $date, $content)
    {
        $pdo = new connect();
        $sql = "UPDATE comments SET id = '$id' , user_id = '$user_id', product_id = '$product_id', date = '$date', content = '$content' WHERE id = " . $id;
        $result = $pdo->pdo_execute($sql);
        return $result;
    }

    //Add
    public function getAdd($id, $user_id, $product_id, $date, $content)
    {
        $pdo = new connect();
        $sql = "INSERT INTO comments (`id`, `user_id`, `product_id`, `date`, `content`) VALUES ('$id', '$user_id', '$product_id', '$date', '$content')";
        $result = $pdo->pdo_query($sql);
        return $result;
    }

    //Xóa
    public function getDeLeTe($id)
    {
        $pdo = new connect();
        $sql = 'DELETE FROM comments WHERE id  =' . $id;
        $result = $pdo->pdo_query_one($sql);
        return $result;
    }

}