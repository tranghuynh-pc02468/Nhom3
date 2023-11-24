<?php
$id = $_GET['id'];
try {
    $db = new sizes();
    $del = $db->getDeLeTe($id);
    $_SESSION['message'] = "Xóa thành công";
} catch (Exception $e) {
    $_SESSION['error'] = "Không thể xóa";
}

header('location:index.php?page=listsize');exit;

?>