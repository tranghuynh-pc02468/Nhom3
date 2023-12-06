<?php
session_start(); // Call session_start() only once

include '../../admin/components/pdo.php';
include '../../admin/comment/comment.php';

$db = new comments();
$product_id = isset($_REQUEST['product_id']) ? $_REQUEST['product_id'] : null;

if ($product_id !== null) {
    $dsbl = $db->loadall_binhluan($product_id);
} else {
    // Handle the case where 'product_id' is not present in the request
    // You might want to display an error message or redirect the user.
}
// $dsbl = $db->loadall_binhluan($product_id);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<style>
    .comment-list {
        list-style: none;
        padding: 0;
    }

    .comment {
        /* border: 1px solid #ccc; */
        padding: 10px;
        margin: 10px;
    }

    .comment-label {
        font-weight: bold;
    }

    .comment-text {
        margin-left: 10px;
    }

    .login-message {
        background-color: #CCC;
        padding: 10px;
        margin: 10px;
        text-align: center;
        font-weight: bold;
    }

    /* Add more styles as needed */
</style>


<body>
<div class="row mb">
    <div class="boxtitle">Bình luận</div>
    <div class="boxcontent2 menudoc">
        <table>
            <ul class="comment-list">
                <?php
                foreach ($dsbl as $bl) {
                    extract($bl);
                    echo '<li class="comment">';
                    echo '<span class="comment-label">Nội dung:</span><span class="comment-text">' . $content . '</span><br>';
                    echo '<span class="comment-label">Người dùng:</span><span class="comment-text">' . $username . '</span><br>';
                    echo '<span class="comment-label">Ngày bình luận:</span><span class="comment-text">' . date('d-m-Y', strtotime($date)) . '</span>';
                    echo '</li>';
                }
                ?>
            </ul>
        </table>
    </div>

    <div class="boxfooter comment">
        <?php


        if (isset($_SESSION['user_name'])) {
            // Hiển thị form bình luận nếu người dùng đã đăng nhập
            echo '<form action="' . $_SERVER['PHP_SELF'] . '" method="post">
                        <input type="hidden" name="product_id" value="' . $product_id . '">
                        <input type="text" name="content">
                        <input class="mt-4" type="submit" name="send" value="Gửi bình luận">
                    </form>';
        } else {
            // Hiển thị thông báo nếu người dùng chưa đăng nhập
            echo '<div class="login-message">Hãy đăng nhập tài khoản để bình luận.</div>';
        }
        ?>
    </div>


    <?php
    if (isset($_POST['send']) && $_POST['send']) {
        // Start the session

        // Check if the user is logged in
        if (isset($_SESSION['user_name'])) {
            $db = new comments();
            $tpmuser_id = $_SESSION['user_id'];
            $content = $_POST['content'];
            $product_id = $_POST['product_id'];
            $date = date('Y-m-d');
            // Hàm strtotime là một chuổi thời gian thành 1 dấu thời gian
            $result = $db->insert_binhluan($user_id, $product_id, $date, $content);
            // Redirect after successful insertion
            header("location: " . $_SERVER['HTTP_REFERER']);
            exit();
        }
    }
    ?>


</div>
</body>

</html>