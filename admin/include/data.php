<?php

class data
{
    var $id = null;
    var $name = null;
    var $email = null;

    var $password = null;
    var $images = null;

    var $role = null;

    function getUser()
    {
        $db = new connect();
        $select = "select * from users";
        return $db->pdo_query($select);
    }

    public function checkUser($name, $password)
    {
        $db = new connect();
        $select = "select * from users where name='$name' and password='$password'";
        $result = $db->pdo_query_one($select);
        if ($result != null)
            return true;
        else
            return false;
    }

    public function userid($name, $password)
    {
        $db = new connect();
        $select = "select id from users where name='$name' and password='$password'";
        $result = $db->pdo_query_one($select);
        return $result;
    }

    public function getInfoById($name)
    {
        $db = new connect();
        $select = "select * from users where name='$name'";
        $result = $db->pdo_query($select);
        //   $quest = $result->fetch();
        return $result;
    }

    function insertUser($tmpUsername, $tmpPassword, $tmpName, $tmpEmail, $tmpPermisions, $tmpPhone)
    {
        $db = new connect();
        $query = "INSERT INTO users(UserID,Username,Password,FullName,Email ,Permissions, Avatar,Address,Phone) VALUES (NULL,'$tmpUsername','$tmpPassword','$tmpName','$tmpEmail','$tmpPermisions','','',$tmpPhone)";
        $db->pdo_execute($query);
    }

    function updateUser($tmpUsername, $tmpPassword, $tmpName, $tmpEmail)
    {
        $db = new connect();
        $query = "update users set Password='$tmpPassword',Username='$tmpName',Email='$tmpEmail' where Username='$tmpUsername'";
        $db->pdo_execute($query);
    }

    function deleteUser($id)
    {
        $db = new connect();
        $query = "delete from users where UserName = '$id'";
        $db->pdo_execute($query);
    }
}

?>