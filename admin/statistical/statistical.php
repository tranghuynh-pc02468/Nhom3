<?php

class statistical
{


    public function countUser()
    {
        $db = new connect();
        $sql = "SELECT count(id) as count_user FROM users";
        $result = $db->pdo_query_value($sql);
        return $result;
    }

    public function countOrder()
    {
        $db = new connect();
        $sql = "SELECT count(id) as count_order FROM orders";
        $result = $db->pdo_query_value($sql);
        return $result;
    }

    public function countProduct()
    {
        $db = new connect();
        $sql = "SELECT count(id) as count_product FROM products";
        $result = $db->pdo_query_value($sql);
        return $result;
    }

    public function countComment()
    {
        $db = new connect();
        $sql = "SELECT count(id) as count_comment FROM comments";
        $result = $db->pdo_query_value($sql);
        return $result;
    }

// thóng kê sp theo từng loại
    function thongKeSP()
    {
        $db = new connect();
        $sql = "SELECT categories.name as name_category, categories.id,
                MIN(products.price) as price_min, 
                MAX(products.price) as price_max, 
                COUNT(products.id) as count_product
                FROM products
                JOIN categories ON products.category_id = categories.id
                GROUP BY categories.id, categories.name";
        return $db->pdo_query($sql);
    }
}

?>