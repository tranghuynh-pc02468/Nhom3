<?php
session_start();
ob_start();
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>CLOUD STORE | Admin</title>

        <!-- Google Font: Source Sans Pro -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
        <!-- Font Awesome Icons -->
        <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
        <!-- overlayScrollbars -->
        <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="dist/css/adminlte.min.css">
        <!-- select multiple-->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
<!-- summernote -->
        <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">

    </head>

    <body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    <div class="wrapper">
        <?php
        include './components/pdo.php';
        include '../config.php';
        include './include/data.php';
        include './user/users.php';
        include './category/category.php';
        include './product/products.php';
        include './sizes/size.php';
        include './comment/comment.php';

        $action = "home";
        if (isset($_GET['page']))
            $action = $_GET['page'];
        if (!isset($_SESSION['admin'])) {
            $action = "login";
        }
        switch ($action) {
            case "home":
                include './home.php';
                break;
            case "listcategory":
                include './category/list.php';
                break;
            case "addcategory":
                include './category/add.php';
                break;
            case "editcategory":
                include './category/edit.php';
                break;
            case "delcategory":
                include './category/del.php';
                break;


            case 'listpro':
                include './product/list.php';
                break;
            case 'addpro':
                include './product/add.php';
                break;


            case 'listcomment':
                include './comment/list.php';
                break;
            case 'delcomment':
                include './comment/delete.php';
                break;


            case 'listuser':
                include './user/list.php';
                break;
            case 'login':
                include './components/login.php';
                break;
            case "users":
                include './user/users.php';
                break;
            case "logout":
                header("location: index.php");
                break;
        }
        ?>




    </div>

    <!-- REQUIRED SCRIPTS -->
    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.js"></script>

    <!-- PAGE PLUGINS -->
    <!-- jQuery Mapael -->
    <script src="plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
    <script src="plugins/raphael/raphael.min.js"></script>
    <script src="plugins/jquery-mapael/jquery.mapael.min.js"></script>
    <script src="plugins/jquery-mapael/maps/usa_states.min.js"></script>
    <!-- ChartJS -->
    <script src="plugins/chart.js/Chart.min.js"></script>

    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="dist/js/pages/dashboard2.js"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
    <!-- (Optional) Latest compiled and minified JavaScript translation files -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/i18n/defaults-*.min.js"></script>
<!-- summernote -->
    <script src="plugins/summernote/summernote-bs4.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#summernote').summernote();
        });
    </script>
    </body>

    </html>
<?php
ob_end_flush();
?>