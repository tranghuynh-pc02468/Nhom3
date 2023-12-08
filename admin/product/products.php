<?php
class product{
    var $id = null;
    var $category_id = null;
    var $name = null;
    var $price = null;
    var $image = null;
    var $content = null;
    var $views = null;
    var $quantity = null;

    public function keyword($keyword)
    {
        $pdo = new connect();
        $sql = "SELECT * FROM products WHERE name LIKE '%$keyword%'";
        $result = $pdo->pdo_query($sql);
        return $result;
    }

    //Hiển thị bảng
    public function getList()
    {
        $pdo = new connect();
        $sql = "SELECT * FROM products";
        $result = $pdo->pdo_query($sql);
        return $result;
    }


    // Phân trang
    public function getListP($start, $itemsPerPage)
    {
        // offset xác định vị trí bắt đầu của kết quả
        $pdo = new connect();
        $sql = "SELECT * FROM products where quantity > 0  limit $start offset $itemsPerPage";
        $result = $pdo->pdo_query($sql);
        return $result;
    }

public function getProductTopView(){
        $db = new connect();
        $sql = "SELECT * FROM products WHERE quantity > 0 ORDER BY views DESC LIMIT 6";
        return $db -> pdo_query($sql);
}

    public function getListshop()
    {
        $pdo = new connect();
        $sql = "SELECT * FROM products WHERE quantity > 0
                ORDER BY id DESC";
        $result = $pdo->pdo_query($sql);
        return $result;
    }

    public function getListCategory($id)
    {
        $pdo = new connect();
        $sql = "SELECT * FROM products
                WHERE category_id='$id' AND quantity > 0";
        $result = $pdo->pdo_query($sql);
        return $result;
    }

    //Hiển thị mãư
    public function getById($id)
    {
        $pdo = new connect();
        $sql = 'SELECT *, products.name as name_product FROM products WHERE id  = ' . $id;
        $result = $pdo->pdo_query_one($sql);
        return $result;
    }


    //Edit
    public function getupdate($id, $category_id, $name, $price, $quantity, $image, $content, $views)
    {
        $pdo = new connect();
        $sql = "UPDATE products SET id = '$id', category_id = '$category_id' ,name = '$name', price = '$price', quantity='$quantity', image = '$image', content = '$content', views='$views' WHERE id = " . $id;
        $result = $pdo->pdo_execute($sql);
        return $result;
    }

    //Add
    public function getAdd($category_id, $name, $price, $quantity, $image, $content, $views)
    {
        $pdo = new connect();
        $sql = "INSERT INTO products (`category_id`, `name`, `price`, `quantity`, `image`, `content`, `views`) VALUES ('$category_id', '$name', '$price', '$quantity' ,'$image', '$content', '$views')";
        $result = $pdo->pdo_execute($sql);
        return $result;
    }

    //Xóa
    public function getDeLeTe($id)
    {
        $pdo = new connect();
        $sql = 'DELETE FROM products WHERE id  =' . $id;
        $result = $pdo->pdo_query_one($sql);
        return $result;
    }

//    SP liên quan
    public function getListDM($id, $category_id){
        $db = new connect();
        $sql = "SELECT * FROM products WHERE category_id='$category_id' AND id <> '$id' AND quantity > 0";
        return $db -> pdo_query($sql);
    }

    public function insertView($id){
        $db = new connect();
        $sql = "UPDATE products SET views = views + 1 WHERE id='$id'";
        return $db -> pdo_execute($sql);
    }

    public function updateQuantity($quantity, $id){
        $db = new connect();
        $sql = "UPDATE products SET quantity = quantity - '$quantity' WHERE id = '$id'";
        return $db -> pdo_execute($sql);
    }
}