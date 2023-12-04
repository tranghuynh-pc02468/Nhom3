<!-- Modal -->
<div class="" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="post">
                    <h5 class="modal-title" id="loginModalLabel">Nhận mã xác nhận</h5>

                    <?php
                    // echo' nè' . $_SESSION['code'];
                    if (isset($_POST['submit'])) {
                        $error = array();

                        if ($_POST['text'] != $_SESSION['code']) {
                            $error['fail'] = 'Mã xác nhận không hợp lệ!';
                        } else {
                            header('location: index.php?page=resetpass');
                        }
                    }
                    ?>

                    <?php if (isset($error['fail'])) : ?>
                        <div class="alert alert-primary" role='alert'>
                            <?= $error['fail'] ?>
                        </div>
                    <?php else : ?>
                        <div class="mb-3">
                            <div class="alert alert-primary role='alert'">
                                Hãy nhập mã xác nhận chúng tôi đã gửi về email bạn
                            </div>
                        </div>
                    <?php endif ?>
                    <div class="mb-3">
                        <input type="text" class="control-login" name="text" placeholder="Nhập mã xác nhận">
                    </div>
                    <div class="modal-footer">
                        <button name="submit" type="submit" class="btn btn-primary">Gửi xác nhận</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>