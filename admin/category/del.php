<?php

$id = $_GET['id'];
try {
    $db = new category();
    $del = $db->getDeLeTe($id);
    $_SESSION['message'] = "Xóa thành công";
} catch (Exception $e) {
    $_SESSION['error'] = "Không thể xóa";
}

header('location:index.php?page=listcategory');exit;

