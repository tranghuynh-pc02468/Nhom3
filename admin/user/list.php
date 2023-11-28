<?php
include "components/header.php";
include "components/sidebar.php";
?>

<div class="wrapper">
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Khách Hàng</h1>
                    </div>

                </div>
            </div>
        </div>
        <section class="content">
            <div class="container-fluid">
                <!-- viết code giao diện ở đây -->
                <!-- /.row -->
                <div class="row">
                    <div class="col-12">
                        <?php
                        if (isset($_SESSION['error'])) {
                            $message_err = $_SESSION['error'];
                            unset($_SESSION['error']);
                        }
                        if (isset($_SESSION['message'])) {
                            $message = $_SESSION['message'];
                            unset($_SESSION['message']);
                        }
                        if (isset($message_err))
                            echo '
                                    <div class="alert alert-danger" role="alert">
                                        ' . $message_err . '
                                    </div>';
                        if (isset($message))
                            echo '
                                    <div class="alert alert-success" role="alert">
                                        ' . $message . '
                                    </div>';
                        ?>
                    </div>
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Danh sách khách hàng</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0" style="height: 470px;">
                                <table class="table table-head-fixed text-nowrap">
                                    <thead>
                                        <tr>
                                            <th>STT</th>
                                            <th>Tên</th>
                                            <th>Địa chỉ Email</th>
                                            <th>Hình ảnh</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $db = new users();
                                            $result = $db -> getList();
                                            $i=1;
                                            foreach ($result as $item){
                                        ?>
                                        <tr >
                                            <td><?= $i ?></td>
                                            <td><?= $item['name'] ?></td>
                                            <td><?= $item['email'] ?></td>
                                            <td><img src="../upload/<?= $item['image'] ?>" alt="image" style="width: 100px"></td>
                                            <td>
                                                <a onclick="return confirm(`Bạn có chắc muốn xóa không?`);" href="index.php?page=deleteuser&id=<?= $item['id'] ?>"
                                                   class="btn btn-danger">Xóa</a>
                                            </td>
                                        </tr>
                                        <?php $i++; } ?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
                <!-- /.row -->
            </div>
        </section>
    </div>


    <aside class="control-sidebar control-sidebar-dark">

    </aside>

</div>
<?php include 'components/footer.php' ?>
