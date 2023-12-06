<!-- Modal -->
<div class="" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="loginModalLabel">Đổi mật khẩu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <!--                    <span aria-hidden="true">&times;</span>-->
                </button>
            </div>
            <div class="modal-body">
                <form action="" class="form" method="post">
                    <?php
                    if (isset($_POST['submit'])) {
                        $error = array();
                        // So sánh mk mơi và mk cũ nếu nó không bằng thì báo mk ko khớp
                        if ($_POST['repass'] != $_POST['newpass']) {
                            $error['fail'] = 'Nhập lại mật khẩu không khớp !';
                        } else {
                            // Nếu mk trùng khớp thì $error['success'] sẽ đc thực thi
                            $error['success'] = 'Đổi mật khẩu thành công ! Chuyển hướng sau 3s.'; //$error['success'] thông báo thành công
                            $user->forgetPass($_POST['newpass'], $_SESSION['mail']);
                            header('refresh:3; index.php?page=login');
                        }

                    }
                    ?>
                    <!-- Nếu nó tồn tại $error và fail nằm trong $error thì sẽ báo lỗi -->
                    <?php if (isset($error) && isset($error['fail'])) : ?>
                        <div class="alert alert-danger" role="alert">
                            <?= $error['fail'] ?>
                        </div>
                        <!-- Nếu điều kiện trên sai thì kiểm tra $error có chứa từ khóa success hay không-->
                    <?php elseif (isset($error) && isset($error['success'])) : ?>
                        <div class="alert alert-success" role="alert">
                            <?= $error['success'] ?>
                        </div>
                        <!-- Nếu 2 điều kiện trên sai thì không có lỗi hoặc thông báo thành công nào trong $error -->
                    <?php else : ?>
                        <div class="alert alert-primary" role="alert">
                            Đổi mật khẩu mới tại đây
                        </div>
                    <?php endif; ?>

                    <div class="form-group">
                        <input type="password" name="newpass" class="form-control"
                               value="<?php if (isset($_POST['newpass'])) echo $_POST['newpass'] ?>"
                               placeholder="Nhập mật khẩu mới">
                        <br>
                        <input type="password" name="repass" class="form-control"
                               value="<?php if (isset($_POST['repass'])) echo $_POST['repass'] ?>"
                               placeholder="Xác nhận mật khẩu">
                    </div>

                    <div class=" form-group">
                        <button type="submit" class="btn btn-primary" name="submit">
                            Gửi
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>