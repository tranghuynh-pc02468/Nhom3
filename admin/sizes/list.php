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
                            <h1 class="m-0">Size</h1>
                        </div>

                    </div>
                </div>
            </div>
            <section class="content">
                <div class="container-fluid">
                    <!-- viết code giao diện ở đây -->
                    <!-- /.row -->
                    <div class="row">
                        <div id="showError" class="col-12">
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
                                    <h3 class="card-title">Danh Sách Size</h3>

                                    <div class="card-tools">
                                        <div class="input-group input-group-sm" style="width: 150px;">
                                            <div class="input-group-append">
                                                <a href="index.php?page=addsize" class="btn btn-primary">
                                                    Thêm Mới
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body table-responsive p-0" style="height: 470px;">
                                    <table class="table table-head-fixed text-nowrap">
                                        <thead>
                                        <tr>

                                            <th>STT</th>
                                            <th>Size</th>
                                            <th></th>

                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $db = new sizes();
                                        $add = $db->getList();
                                        $i = 1;
                                        foreach($add as $list) {
                                            extract($list);
                                            echo '<tr>
                                                <td>'.$i.'</td>
                                                <td>'.$name.'</td>
                                                <td>
                                                    <a href="index.php?page=edit_size&id='.$id.'" class="btn btn-primary">Sửa</a>
                                                    <a onclick="return confirm(`Bạn có chắc muốn xóa không?`);" href="index.php?page=del_size&id=' .$id. '" type="button" class="btn btn-danger">Xóa</a>
                                                </td>
                                            </tr>
                                            ';
                                            $i++;
                                        }
                                        ?>


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

<script>
    setTimeout(function() {
        let show =  document.getElementById('showError');

        if (show) {
        show.style.display = 'none';
    }
    }, 4000);
    
</script>