<div class="site-wrap">

    <div class="bg-light py-3">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mb-0"><a href="index.php?page=home">Trang chủ</a> <span class="mx-2 mb-0">/</span>
                    <strong class="text-black">Cửa hàng</strong></div>
            </div>
        </div>
    </div>

    <div class="site-section">
        <div class="container">
            <div class="row mb-5">
                <div class="col-md-9 order-2">
                    <div class="row">
                        <div class="col-md-12 ">
                            <div class="float-md-left mb-4">
                                <h2 class="text-black h5">Sản phẩm</h2>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-5">

                        <?php
                        // Hiển thị sp
                        foreach ($result as $row) {
                            echo '<div class="col-sm-6 col-lg-4 mb-4 " data-aos="fade-up ">
                  <div class="block-4 text-center border h-100">
                      <figure class="block-4-image">
                          <a href="index.php?page=shop-single&id=' . $row['id'] . '"><img src="../../upload/' . $row['image'] . '" alt="Image placeholder" class="img-fluid"></a>
                      </figure>
                      <div class="block-4-text p-4">
                          <h3><a href="index.php?page=shop-single&id=' . $row['id'] . '">' . $row['name'] . '</a></h3>
                          <p class="mb-0"></p>
                          <p class="text-primary font-weight-bold">' . number_format($row['price']) . ' đ</p>
                      </div>
                  </div>
                </div>';
                        }
                        ?>
                    </div>
                    <div class="row" data-aos="fade-up">
                        <div class="col-md-12 text-center">
                            <div class="site-block-27">
                                <ul class="pagination">
                                    <?php
                                    if (isset($totalPages)) {
                                        for ($i = 1; $i <= $totalPages; $i++) {
                                            echo '<li' . ($i == $page ? ' class="active"' : '') . '><a href="index.php?page=shop&p=' . $i . '">' . $i . '</a></li>';
                                        }
                                    };
                                    ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 order-1 mb-5 mb-md-0">
                    <div class="border p-4 rounded mb-4">

                        <h3 class="mb-3 h6 text-uppercase text-black d-block">Danh mục</h3>
                        <ul class="list-unstyled mb-0">
                            <?php
                            $db= new category();
                            $result = $db->getList();
                            foreach ($result as $item) {
                                ?>
                                <li class="mb-1">
                                    <a href="index.php?page=category&iddm=<?=$item['id']?>"class="d-flex text-uppercase"><span><?=$item['name']?></span></a>
                                </li>
                            <?php } ?>
                        </ul>
                    </div>


                </div>

            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="site-section site-blocks-2">
                        <div class="row justify-content-center text-center mb-5">
                            <div class="col-md-7 site-section-heading pt-4">
                                <h2>Sản Phẩm Được Yêu Thích</h2>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6 col-md-6 col-lg-4 mb-4 mb-lg-0" data-aos="fade" data-aos-delay="">
                                <a class="block-2-item" href="#">
                                    <figure class="image">
                                        <img src="images/mau1.jpg" alt="" class="img-fluid">
                                    </figure>
                                    <div class="text">
                                        <span class="text-uppercase">Collections</span>
                                        <h3>Women</h3>
                                    </div>
                                </a>
                            </div>
                            <div class="col-sm-6 col-md-6 col-lg-4 mb-5 mb-lg-0" data-aos="fade" data-aos-delay="100">
                                <a class="block-2-item" href="#">
                                    <figure class="image">
                                        <img src="images/mau2.jpg" alt="" class="img-fluid">
                                    </figure>
                                    <div class="text">
                                        <span class="text-uppercase">Collections</span>
                                        <h3>Children</h3>
                                    </div>
                                </a>
                            </div>
                            <div class="col-sm-6 col-md-6 col-lg-4 mb-5 mb-lg-0" data-aos="fade" data-aos-delay="200">
                                <a class="block-2-item" href="#">
                                    <figure class="image">
                                        <img src="images/mau3.jpg" alt="" class="img-fluid">
                                    </figure>
                                    <div class="text">
                                        <span class="text-uppercase">Collections</span>
                                        <h3>Men</h3>
                                    </div>
                                </a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>


    </body>

    </html>
</div>