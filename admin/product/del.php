<?php
        $id=$_GET['id'];
        $db = new product();
        $del = $db->getDeLeTe($id);

        
        header('location:index.php?page=listpro');

?>