<?php
        $id=$_GET['id'];
        $db = new sizes();
        $del = $db->getDeLeTe($id); 
        
        header('location:index.php?page=listsize');

?>