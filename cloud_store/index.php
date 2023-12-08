<?php
session_start();
ob_start();
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <title>CLOUD STORE | Client</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="css/adminlte.min.css">
        <!--        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Mukta:300,400,700">-->
        <link rel="stylesheet" href="fonts/icomoon/style.css">

        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/magnific-popup.css">
        <link rel="stylesheet" href="css/jquery-ui.css">
        <link rel="stylesheet" href="css/owl.carousel.min.css">
        <link rel="stylesheet" href="css/owl.theme.default.min.css">
        <link rel="stylesheet" href="css/aos.css">

        <link rel="stylesheet" href="css/style.css">
        <script src="https://kit.fontawesome.com/8ea8a81b6f.js" crossorigin="anonymous"></script>
        <link rel="stylesheet"
              href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    </head>

    <body>

    <div class="site-wrap">
        <?php
        include '../admin/components/pdo.php';
        include '../config.php';
        include './include/header.php';
        include '../admin/include/data.php';
        include '../admin/user/users.php';
        include '../admin/category/category.php';
        include '../admin/product/products.php';
        include '../admin/sizes/size.php';
        include './accounts/account.php';
        include '../admin/comment/comment.php';
        include '../admin/order/order.php';
        include '../admin/statistical/statistical.php';
        include './accounts/PHPMailer/PHPMailer-master/index.php';
        $mail = new mailer();


        $action = "home";
        if (isset($_GET['page']))
            $action = $_GET['page'];
        switch ($action) {
            case "home":
                include './home.php';
                break;
            case 'about':
                include './about.php';
                break;
            case 'contact':
                include './contact.php';
                break;
            case 'cart':
                include './products/cart.php';
                break;
            case 'forgetpass':
                $user = new accounts();
                include './accounts/forgetpass.php';
                break;
            case 'verifcation':
                include './accounts/verification.php';
                break;
            case 'resetpass':
                $forgot_password = new accounts();
                $user = new accounts();
                include './accounts/resetpass.php';
                break;
            case 'shop':
//                $db = new product();
//                $add = $db->getListshop();

                $itemsPerPage = 6; // 6 sp hiển thị 1 trang
                // is_numeric kiểm tra giá trị có phải số hay không
                $page = isset($_GET['p']) && is_numeric($_GET['p']) ? $_GET['p'] : 1; // Trang số 1
                // Số bản ghi trong data
                $pdo = new statistical();
                $totalItems = $pdo->countProduct();

                // $totalItems = 30; // Replace with the actual total number of items

                // Tính số trang
                $totalPages = ceil($totalItems / $itemsPerPage); // Calculate total pages
                $offset = ($page - 1) * $itemsPerPage; // Starting point for fetching items

                // Truy vấn sql limit và offset
                // $sql = "SELECT * FROM products LIMIT $start, $itemsPerPage";
                $pdo = new product();
                $result = $pdo->getListP($itemsPerPage, $offset);
                include './products/shop.php';
                break;

            case 'category':
                $id = $_GET["iddm"];
                $db = new product();
                $result = $db->getListCategory($id);
                include './products/shop.php';
                break;
            case 'shop-single':
                include './products/shop-single.php';
                break;

            case 'keyword':
                $keyword = isset($_POST['search']) ? $_POST['search'] : '';
                $db = new product();
                $result = $db->keyword($keyword);
                include './products/shop.php';
                break;

            case 'add-to-cart':
                include './order/add-to-cart.php';
                break;
            case 'view-cart':
                include './order/cart.php';
                break;
            case 'delete-cart':
                if(isset($_GET['id'])){
                    array_splice($_SESSION['my-cart'], $_GET['id'], 1);
                }else{
                    unset($_SESSION['my-cart']);
                }
                include './order/cart.php';
                break;
            case 'checkout':
                include './order/check-out.php';
                break;
            case 'thanks':
                include './order/thanks.php';
                break;
            case 'vn-pay':
                include './order/vnpay_create_payment.php';
                break;
            case 'vnpay-return':
                include './order/vnpay_return.php';
                break;

            case 'login':
                include './accounts/login.php';
                break;
            case 'register':
                include './accounts/register.php';
                break;
            case 'profile':
                include './accounts/profile.php';
                break;

            case 'user':
                include '../admin/user/users.php';
                break;
            case "logout":
                session_destroy();
                header("location: index.php");
                break;
        }
        ?>
        <?php
        include './include/footer.php';
        ?>


    </div>

    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/jquery-ui.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/aos.js"></script>

    <script src="js/main.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    </body>

    </html>
<?php
ob_end_flush();
?>