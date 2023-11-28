<?php

class comments
{

    var $id = null;
    var $user_id = null;
    var $product_id = null;
    var $date = null;
    var $content = null;

    // bình luận sản phẩm
    public function commentList()
    {
        $db = new connect();
        $sql = "SELECT products.name as name_product, comments.product_id, 
                COUNT(comments.id) as quantity, MIN(comments.date) as min_date,
                MAX(comments.date) as max_date FROM comments
                JOIN products ON comments.product_id = products.id 
                JOIN users ON comments.user_id = users.id
                GROUP BY comments.product_id";
        return $db->pdo_query($sql);
    }

    // chi tiết bình luận
    public function commentdetail($product_id)
    {
        $db = new connect();
        $sql = "SELECT users.name as name_user, comments.date, comments.content, comments.id
                    FROM comments
                    JOIN users ON comments.user_id = users.id
                    WHERE comments.product_id = '$product_id'
                    ORDER BY comments.date DESC";
        return $db->pdo_query($sql);

    }


    public function insert_binhluan($user_id, $product_id, $date, $content)
    {
        try {
            $db = new connect();
            $query = "INSERT INTO comments (user_id, product_id, date, content) VALUES (?, ?, ?, ?)";
            $db->pdo_execute($query, $user_id, $product_id, $date, $content);

            // Debugging: Output the SQL query and bind parameters
            // var_dump($query); // Output the SQL query
            var_dump([$user_id, $product_id, $date, $content]); // Output the bind parameters


            return true;
        } catch (PDOException $exception) {
            // Debugging: Output the exception message
            var_dump($exception->getMessage());
            die();
        }
    }


    function loadall_binhluan($product_id)
    {
        $db = new connect();
        $sql = "SELECT comments.*, users.name AS username 
                FROM comments
                LEFT JOIN users ON comments.user_id = users.id
                WHERE 1";
        if ($product_id > 0) {
            $sql .= " AND product_id='" . $product_id . "'";
        }
        $sql .= " ORDER BY id DESC";
        $listbl = $db->pdo_query($sql);
        return $listbl;
    }


    // public function checkUser($user_id)
    // {
    //     $db = new connect();
    //     $select = "SELECT * FROM comments WHERE user_id='$user_id'";
    //     $result = $db->pdo_query_one($select);
    //     if ($result != null)
    //         return true;
    //     else
    //         return false;
    // }

    public function getCmt()
    {
        $db = new connect();
        $sql = 'SELECT * FROM comments INNER JOIN users ON comments.id = users.id ';
        $result = $db->pdo_query($sql);
        return $result;
    }

    //Hiển thị bảng
    public function getList($product_id)
    {
        $db = new connect();
        $sql = 'SELECT * FROM comments JOIN users ON comments.user_id = user_id WHERE product_id =' . $product_id;
        $result = $db->pdo_query($sql);
        return $result;
    }

    //Hiển thị mã
    public function getById($id)
    {
        $pdo = new connect();
        $sql = 'SELECT * FROM comments WHERE id  = ' . $id;
        // where id comment
        $result = $pdo->pdo_query_one($sql);
        return $result;
    }

    //Edit
    public function getupdate($id, $user_id, $product_id, $date, $content)
    {
        $pdo = new connect();
        $sql = "UPDATE comments SET id = '$id' , user_id = '$user_id', product_id = '$product_id', date = '$date', content = '$content' WHERE id = " . $id;
        // where id comment
        $result = $pdo->pdo_execute($sql);
        return $result;
    }

    //Add
    public function getAdd($user_id, $product_id, $date, $content)
    {
        $pdo = new connect();
        $sql = "INSERT INTO comments (`user_id`, `product_id`,`date`,  `content`) VALUES ('$user_id', '$product_id', '$date', '$content')";
        $result = $pdo->pdo_query($sql);
        return $result;
    }

    //Xóa
    public function getDeLeTe($id)
    {
        $pdo = new connect();
        $sql = 'DELETE FROM comments WHERE id  =' . $id;
        $result = $pdo->pdo_execute($sql);   
        return $result;
    }

}