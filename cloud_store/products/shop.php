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
                        <div class="col-md-12 mb-5">
                            <div class="float-md-left mb-4">
                                <h2 class="text-black h5">Sản phẩm</h2>
                            </div>
                            <div class="d-flex">
                                <div class="dropdown mr-1 ml-md-auto">
                                    <button type="button" class="btn btn-secondary btn-sm dropdown-toggle"
                                            id="dropdownMenuOffset" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">
                                        Latest
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuOffset">
                                        <a class="dropdown-item" href="#">Men</a>
                                        <a class="dropdown-item" href="#">Women</a>
                                        <a class="dropdown-item" href="#">Children</a>
                                    </div>
                                </div>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-secondary btn-sm dropdown-toggle"
                                            id="dropdownMenuReference" data-toggle="dropdown">Reference
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuReference">
                                        <a class="dropdown-item" href="#">Relevance</a>
                                        <a class="dropdown-item" href="#">Name, A to Z</a>
                                        <a class="dropdown-item" href="#">Name, Z to A</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="#">Price, low to high</a>
                                        <a class="dropdown-item" href="#">Price, high to low</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-5">

                        <?php
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
                          <p class="text-primary font-weight-bold">' . number_format($row['price']) . '</p>
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
                                    for ($i = 1; $i <= $totalPages; $i++) {
                                        echo '<li' . ($i == $page ? ' class="active"' : '') . '><a href="index.php?page=shop&p=' . $i . '">' . $i . '</a></li>';
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
                            <li class="mb-1"><a href="#" class="d-flex"><span>Nike</span></a></li>
                            <li class="mb-1"><a href="#" class="d-flex"><span>Adidas</span></a></li>
                            <li class="mb-1"><a href="#" class="d-flex"><span>Puma</span></a></li>
                        </ul>
                    </div>

                    <div class="border p-4 rounded mb-4">
                        <div class="mb-4">
                            <h3 class="mb-3 h6 text-uppercase text-black d-block">Filter by Price</h3>
                            <div id="slider-range" class="border-primary"></div>
                            <input type="text" name="text" id="amount" class="form-control border-0 pl-0 bg-white"
                                   disabled=""/>
                        </div>

                        <div class="mb-4">
                            <h3 class="mb-3 h6 text-uppercase text-black d-block">Size</h3>
                            <label for="s_sm" class="d-flex">
                                <input type="checkbox" id="s_sm" class="mr-2 mt-1"> <span class="text-black">Small (2,319)</span>
                            </label>
                            <label for="s_md" class="d-flex">
                                <input type="checkbox" id="s_md" class="mr-2 mt-1"> <span class="text-black">Medium (1,282)</span>
                            </label>
                            <label for="s_lg" class="d-flex">
                                <input type="checkbox" id="s_lg" class="mr-2 mt-1"> <span class="text-black">Large (1,392)</span>
                            </label>
                        </div>

                        <div class="mb-4">
                            <h3 class="mb-3 h6 text-uppercase text-black d-block">Color</h3>
                            <a href="#" class="d-flex color-item align-items-center">
                                <span class="bg-danger color d-inline-block rounded-circle mr-2"></span> <span
                                        class="text-black">Red (2,429)</span>
                            </a>
                            <a href="#" class="d-flex color-item align-items-center">
                                <span class="bg-success color d-inline-block rounded-circle mr-2"></span> <span
                                        class="text-black">Green (2,298)</span>
                            </a>
                            <a href="#" class="d-flex color-item align-items-center">
                                <span class="bg-info color d-inline-block rounded-circle mr-2"></span> <span
                                        class="text-black">Blue (1,075)</span>
                            </a>
                            <a href="#" class="d-flex color-item align-items-center">
                                <span class="bg-primary color d-inline-block rounded-circle mr-2"></span> <span
                                        class="text-black">Purple (1,075)</span>
                            </a>
                        </div>

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