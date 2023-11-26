<?php

class accounts
{

    var $id = null;
    var $name = null;
    var $email = null;
    var $password = null;
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

    //Đăng nhập
    function getUser()
    {
        $db = new connect();
        $select = 'SELECT * FROM users';
        return $db->pdo_query($select);
    }

    public function checkUser($name, $password)
    {
        $db = new connect();
        $select = "SELECT * FROM users where name ='$name' and password ='$password' and role = '0'";
        $result = $db->pdo_query_one($select);
        if ($result != null)
            return true;
        else
            return false;
    }

    public function userid($name, $password)
    {
        $db = new connect();
        $select = "SELECT id FROM users where name='$name' and password = '$password'";
        $result = $db->pdo_query_one($select);
        return $result;
    }

    public function useridset($name, $password)
    {
        $db = new connect();
        $select = "SELECT * FROM users where name='$name' and password = '$password'";
        $result = $db->pdo_query_one($select);
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
    public function getAdd($name, $email, $password, $image, $role)
    {
        $pdo = new connect();
        $sql = "INSERT INTO users (`name`, `email`, `password`, `image`, `role`) VALUES ('$name', '$email', '$password', '$image', '$role')";
        $result = $pdo->pdo_execute($sql);
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