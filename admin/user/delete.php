<?php
$id = $_GET['id'];
$db = new users();
$result = $db->getById($id);
try {
    if ($result['role'] == 1) {
        $_SESSION['error'] = "Không thể xóa tài khoản admin";
    } else {
        $db->getDeLeTe($id);
        $_SESSION['message'] = "Xóa tài khoản thành công";
    }
} catch (Exception $e) {
    $_SESSION['error'] = "Không thể xóa tài khoản";
}


header('location: index.php?page=listuser');
exit;
?>
