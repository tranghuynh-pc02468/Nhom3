<header class="site-navbar" role="banner">
    <div class="site-navbar-top">
        <div class="container">
            <div class="row align-items-center">

                <div class="col-6 col-md-4 order-2 order-md-1 site-search-icon text-left">
                    <form method="post" action="index.php?page=keyword" class="site-block-top-search">
                        <span class="icon icon-search2"></span>
                        <input type="text" name="search" class="form-control border-0" placeholder="Search">
                    </form>
                </div>

                <div class="col-12 mb-3 mb-md-0 col-md-4 order-1 order-md-2 text-center">
                    <div class="site-logo">
                        <a href="index.php?page=home" class="js-logo-clone">Cloud_Store</a>
                    </div>
                </div>

                <div class="col-6 col-md-4 order-3 order-md-3 text-right">
                    <div class="site-top-icons">
                        <ul>
                            <!-- <li><a href="#"><span class="icon icon-person"></span></a></li> -->
                            <?php
                            $id = $_SESSION['user_id'] ?? "";
                            $name = $_SESSION['user_name'] ?? "";

                            if (isset($name) && $id) {
                                // User is logged in, show the user's name in a dropdown
                                echo '
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            ' . $name . '
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="index.php?page=logout">Đăng xuất</a>
                        </div>
                    </div>';
                            } else {
                                // No active user session, show the login link
                                echo '<a href="index.php?page=login" data-bs-toggle="modal" aria-labelledby="loginModalLabel" class="user_link">
                        <span class="icon icon-person"></span>
                      </a>';
                            }
                            ?>

                            <li>
                                <a href="index.php?page=view-cart" class="site-cart">
                                    <span class="icon icon-shopping_cart"></span>
                                </a>
                            </li>
                            <li class="d-inline-block d-md-none ml-md-0"><a href="#"
                                                                            class="site-menu-toggle js-menu-toggle"><span
                                            class="icon-menu"></span></a></li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <nav class="site-navigation text-right text-md-center" role="navigation">
        <div class="container">
            <ul class="site-menu js-clone-nav d-none d-md-block">
                <li>
                    <a href="index.php?page=home">Trang chủ</a>
                </li>
                <li>
                    <a href="index.php?page=about">Giới thiệu</a>
                </li>
                <li><a href="index.php?page=shop">Cửa hàng</a></li>
                <li><a href="index.php?page=contact">Liên hệ</a></li>
            </ul>
        </div>
    </nav>
</header>