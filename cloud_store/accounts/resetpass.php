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
                <form action="" class="form" method="post">
                    <?php
                    if (isset($_POST['submit'])) {
                        $error = array();
                        if ($_POST['repass'] != $_POST['newpass']) {
                            $error['fail'] = 'Nhập lại mật khẩu không khớp !';
                        } else {
                            $error['success'] = 'Đổi mật khẩu thành công ! Chuyển hướng sau 3s.';
                            $user->forgetPass($_POST['newpass'], $_SESSION['mail']);
                            header('refresh:3; index.php?page=login');
                        }
                    }
                    ?>
                    <?php if (isset($error) && isset($error['fail'])) : ?>
                        <div class="alert alert-danger" role="alert">
                            <?= $error['fail'] ?>
                        </div>
                    <?php elseif (isset($error) && isset($error['success'])) : ?>
                        <div class="alert alert-success" role="alert">
                            <?= $error['success'] ?>
                        </div>
                    <?php else : ?>
                        <div class="alert alert-primary" role="alert">
                            Đổi mật khẩu mới tại đây
                        </div>
                    <?php endif; ?>

                    <div class="form-group">
                        <input type="text" name="newpass" class="contro-login"
                               value="<?php if (isset($_POST['newpass'])) echo $_POST['newpass'] ?>"
                               placeholder="Nhập mật khẩu mới">
                        <br>
                        <input type="text" name="repass" class="contro-login"
                               value="<?php if (isset($_POST['repass'])) echo $_POST['repass'] ?>"
                               placeholder="Xác nhận mật khẩu">
                    </div>

                    <div class=" form-group">
                        <button type="submit" class="btn btn-heading btn-block hover-up" name="submit">
                            Gửi
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>