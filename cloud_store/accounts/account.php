<?php

class accounts
{

    var $id = null;
    var $name = null;
    var $email = null;
    var $password = null;
    var $image = null;
    var $role = null;
    var $hashedPassword = null;

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

    public function userInfo($name)
    {
        $db = new connect();
        $select = "SELECT * FROM users where name='$name'";
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
    public function getDK($name, $email, $password)
    {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $pdo = new connect();
        $sql = "INSERT INTO users (`name`, `email`, `password`) VALUES ('$name', '$email', '$hashedPassword')";
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

    // xác nhận mk bằng email
    public function getUserEmail($email)
    {
        $pdo = new connect();
        $sql = "SELECT * FROM users WHERE email = '$email'";
        $result = $pdo->pdo_query($sql);
        if ($result) {
            return $result;
        } else {
            echo "<h4 style='color: red;'>Email không tồn tại</h4> <br>";
        }
    }

    public function forgetPass($pass, $email)
    {
        $hashedPassword = password_hash($pass, PASSWORD_DEFAULT);
        $db = new connect();
        // $passwordEncryption = md5($pass);
        $sql = "UPDATE users SET password ='$hashedPassword' WHERE email ='$email'";
        $result = $db->pdo_execute($sql);
    }

}