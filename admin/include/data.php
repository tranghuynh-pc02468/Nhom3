<?php

class data
{

    var $ten_loai = null;
    var $ma_loai = null;

    //Hiển thị bảng
    public function getList()
    {
        $pdo = new connect();
        $sql = 'SELECT * FROM loai';
        $result = $pdo->pdo_query($sql);
        return $result;
    }

    //Hiển thị mã
    public function getById($ma_loai)
    {
        $pdo = new connect();
        $sql = 'SELECT * FROM loai WHERE ma_loai  = ' . $ma_loai;
        $result = $pdo->pdo_query_one($sql);
        return $result;
    }

    //Edit
    public function getupdate($ma_loai, $ten_loai)
    {
        $pdo = new connect();
        $sql = "UPDATE loai SET ma_loai = '$ma_loai', ten_loai = '$ten_loai' WHERE ma_loai = " . $ma_loai;
        $result = $pdo->pdo_execute($sql);
        return $result;
    }

    //Add
    public function getAdd($ten_loai)
    {
        $pdo = new connect();
        $sql = "INSERT INTO loai (`ten_loai`) VALUES ('$ten_loai')";
        $result = $pdo->pdo_query($sql);
        return $result;
    }

    //Xóa
    public function getDeLeTe($ma_loai)
    {
        $pdo = new connect();
        $sql = 'DELETE FROM loai WHERE ma_loai  =' . $ma_loai;
        $result = $pdo->pdo_query_one($sql);
        return $result;
    }

}