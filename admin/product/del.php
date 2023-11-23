<?php
        $id=$_GET['id'];
        try{
            $dbSizeDetail = new size_detail();
            $dbSizeDetail -> getDeleteProductId($id);
            $db = new product();
            $del = $db->getDeLeTe($id);
            $_SESSION['message'] = "Xóa thành công";
        } catch (Exception $e) {
            $_SESSION['error'] = "Không thể xóa";
        }

        
        header('location:index.php?page=listpro');

?>