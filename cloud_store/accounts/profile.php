<div class="bg-light py-3">
    <div class="container">
        <div class="row">
            <div class="col-md-12 mb-0"><a href="index.php">Trang chủ</a> <span class="mx-2 mb-0">/</span> <strong
                    class="text-black"> Tài khoản</strong></div>
        </div>
    </div>
</div>
<div class="site-section">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="card card-primary ">
                    <div class="card-body box-profile">
                        <div class="text-center">
                            <img class="profile-user-img img-fluid img-circle" src="../../upload/user.jpg"
                                 alt="User profile picture">
                        </div>
                        <h3 class="profile-username text-center"><?= $_SESSION['user_name'] ?></h3>
                        <?php
                        $db = new accounts();
                        $result = $db->getById($_SESSION['user_id']);
                        ?>
                        <p class="text-muted text-center"><?= $result['email'] ?></p>
                        <a href="index.php?page=logout" class="btn btn-primary btn-block mt-4">Đăng xuất</a>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header p-2">
                        <ul class="nav nav-pills">

                            <li class="nav-item"><a class="nav-link active" href="#timeline" data-toggle="tab">Lịch sử
                                    mua hàng</a></li>
                        </ul>
                    </div>
                    <?php
                    $id = $_SESSION['user_id'];
                    $db = new order();
                    $result = $db->getOrderByInfo($id);
                    // var_dump($result);
                    ?>
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="active tab-pane" id="timeline">
                                <!-- The timeline -->
                                <div class="timeline timeline-inverse">
                                    <?php foreach ($result as $item) {
                                        $id_order = $item['id'];
                                        ?>
                                        <div class="time-label">
                                        <span class="bg-danger">
                                            <?= date("d-m-Y", strtotime($item['date'])) ?>
                                        </span>
                                        </div>
                                        <div>
                                            <i class="fas fa-solid fa-location-dot bg-primary"></i>

                                            <div class="timeline-item p-3">
                                                <p class=""><span
                                                        class="font-weight-bold">Số điện thoại:</span> <?= $item['phone'] ?>
                                                </p>
                                                <p class=""><span
                                                        class="font-weight-bold">Địa chỉ giao hàng:</span> <?= $item['address'] ?>
                                                </p>
                                                <p class="mb-0"><span class="font-weight-bold">Phương thức thanh
                                                        toán:</span> <?= $item['payment_method'] == 1 ? 'VNPay' : 'Thanh toán khi nhận hàng' ?>
                                                </p>
                                            </div>
                                        </div>
                                        <div>
                                            <i class="fas fa-solid fa-bag-shopping bg-success"></i>

                                            <div class="timeline-item">
                                                <div class="timeline-body">
                                                    <?php
                                                    $db = new order();
                                                    $items = $db->getOrderDetailByInfo($id_order);
                                                    foreach ($items as $item1) {
                                                        ?>
                                                        <div class="row mx-2 align-items-center">
                                                            <div class="col-md-2"><img
                                                                    src="../upload/<?= $item1['pro_image'] ?>"
                                                                    class="w-100">
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="d-flex w-100 justify-content-between">
                                                                    <h5 class="mb-1">
                                                                        <?= $item1['pro_name'] ?>
                                                                    </h5>
                                                                    <!-- <small class="text-body-secondary">3 days ago</small> -->
                                                                </div>
                                                                <p class="mb-0">
                                                                    Size giày: <?= $item1['size'] ?>
                                                                </p>
                                                                <p>Số lượng:<?= $item1['quantity'] ?>
                                                                </p>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <?= number_format($item1['price']) ?> đ
                                                            </div>
                                                        </div>
                                                    <?php } ?>
                                                    <div
                                                        class="row mx-2 justify-content-end pr-4 text-primary font-weight-bold">
                                                        Thành tiền:
                                                        <?= number_format($item['total']) ?> đ
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    <?php } ?>


                                    <div>
                                        <i class="far fa-clock bg-gray"></i>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>