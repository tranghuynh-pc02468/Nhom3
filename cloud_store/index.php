<?php
session_start();
ob_start();
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <title>Shoppers &mdash; Colorlib e-Commerce Template</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Mukta:300,400,700">
        <link rel="stylesheet" href="fonts/icomoon/style.css">

        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/magnific-popup.css">
        <link rel="stylesheet" href="css/jquery-ui.css">
        <link rel="stylesheet" href="css/owl.carousel.min.css">
        <link rel="stylesheet" href="css/owl.theme.default.min.css">


        <link rel="stylesheet" href="css/aos.css">

        <link rel="stylesheet" href="css/style.css">

    </head>

    <body>

    <div class="site-wrap">
        <?php
        include '../admin/components/pdo.php';
        include './include/header.php';
        include '../admin/product/products.php';
        include '../admin/category/category.php';
        include '../admin/user/users.php';
        include '../cloud_store/accounts/account.php';
        include '../config.php';

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
            case 'shop':
                $db = new product();
                $add = $db->getListshop();
                include './products/shop.php';
                break;
            case 'category':
                $id = $_GET["iddm"];
                $db = new product();
                $add = $db->getListCategory($id);
                include './products/shop.php';
                break;
            case 'shop-single':
                include './products/shop-single.php';
                break;

            case 'login':
                include './accounts/login.php';
                break;
            case 'register':
                include './accounts/register.php';
                break;
            case "logout":
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

    </body>

    </html>
<?php
ob_end_flush();
?>