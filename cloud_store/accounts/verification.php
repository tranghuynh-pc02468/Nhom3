<!-- Modal -->
<div class="" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="loginModalLabel">Nhận mã xác nhận</h5>

            </div>
            <div class="modal-body">
                <form action="" method="post">

                    <?php
                    // echo' nè' . $_SESSION['code'];
                    if (isset($_POST['submit'])) {
                        // array() mảng rổng để lưu các thông báo lỗi hoặc liện quan đên mã xác nhận
                        $error = array();
                        // So sánh text có bằng giá trị đc lưu trong $_SESSION['code'] hay ko
                        if ($_POST['text'] != $_SESSION['code']) {
                            $error['fail'] = 'Mã xác nhận không hợp lệ!'; // điều kiện đúng thông báo lỗi sẽ đcthêm vào $error
                        } else {
                            header('location: index.php?page=resetpass');
                        }
                    }
                    ?>
                    <!-- Kiểm tra $error['fail'] có tồn tại hay ko -->
                    <?php if (isset($error['fail'])) : ?>
                        <div class="alert alert-primary" role='alert'>
                            <!-- Nếu có lỗi thì fail có tồn tại trong $error -->
                            <?= $error['fail'] ?>
                        </div>
                        <!-- Nếu if sai thì từ fail ko có trong $error -->
                    <?php else : ?>
                        <div class="mb-3">
                            <div class="alert alert-primary role='alert'">
                                Hãy nhập mã xác nhận chúng tôi đã gửi về email bạn
                            </div>
                        </div>
                    <?php endif ?>
                    <div class="mb-3">
                        <!-- <input type="text" class="control-login" name="text" placeholder="Nhập mã xác nhận"> -->
                        <input type="text" class="form-control" name="text" placeholder="Nhập mã xác nhận ">
                    </div>
                    <div class="modal-footer">
                        <button name="submit" type="submit" class="btn btn-primary">Gửi xác nhận</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>