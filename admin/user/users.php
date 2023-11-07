<?php

class users
{
    var $id = null;
    var $name = null;
    var $email = null;
    var $pasword = null;
    var $image = null;
    var $role = null;

    //Hiển thị bảng
    public function getList()
    {
        $pdo = new connect();
        $sql = 'SELECT * FROM users';
        $result = $pdo->pdo_query($sql);
        return $result;
    }

    //Hiển thị mã
    public function getById($id)
    {
        $pdo = new connect();
        $sql = 'SELECT * FROM users WHERE id  = ' . $id;
        $result = $pdo->pdo_query_one($sql);
        return $result;
    }

    //Edit
    public function getupdate($id, $name, $email, $password, $image, $role)
    {
        $pdo = new connect();
        $sql = "UPDATE users SET id = '$id', name = '$name', email = '$email', password = '$password', image = '$image', role = '$role' WHERE id = " . $id;
        $result = $pdo->pdo_execute($sql);
        return $result;
    }

    //Add
    public function getAdd($id, $name, $email, $password, $image, $role)
    {
        $pdo = new connect();
        $sql = "INSERT INTO users (`id`, `name`, `email`, `password`, `image`, `role`) VALUES ('$id', '$name', '$email', '$password', '$image', '$role')";
        $result = $pdo->pdo_query($sql);
        return $result;
    }

    //Xóa
    public function getDeLeTe($id)
    {
        $pdo = new connect();
        $sql = 'DELETE FROM users WHERE id  =' . $id;
        $result = $pdo->pdo_query_one($sql);
        return $result;
    }
}

