<!-- Modal -->
<div class="" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="loginModalLabel">Đăng nhập</h5>
            </div>
            <div class="modal-body">
                <form action="" method="post">
                    <div class="mb-3">
                        <label for="name" class="form-label">Tên đăng nhập</label>
                        <input type="text" class="form-control" name="name" aria-describedby="emailHelp">
                        <div id="emailHelp" class="form-text"></div>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Mật khẩu</label>
                        <input type="password" class="form-control" name="password">
                    </div>
                    <div class="">
                        <p><a href="index.php?page=forgetpass">Quên mật khẩu?</a></p>
                    </div>
                    <div class="modal-footer">
                        <a href="index.php?page=register" type="button" class="btn btn-secondary" data-dismiss="modal">Đăng
                            ký</a>
                        <button name="login" type="submit" class="btn btn-primary">Đăng nhập</button>
                    </div>
                    <?php
                    if (isset($_POST['login'])) {
                        $user = $_POST['name'] ?? '';
                        $password = $_POST['password'] ?? '';
                        if (empty($user) || empty($password)) {
                            echo '<div class="text-danger">Vui lòng nhập thông tin</div>';
                        }
                        $users = new accounts();
                        if (!empty($user) && !empty($password)) {
                            // $id = $users->userid($user, $password);
                            $check = $users->userInfo($user);
                            //So sánh password trong sql và $password người dùng nhập vô
                            if ($check && password_verify($password, $check['password'])) {
                                $_SESSION['user_name'] = $user;
                                $_SESSION['user_id'] = $check['id'];
                                header("Location: index.php?page=home");
                            } else {
                                echo '<div class="text-danger">Tên đăng nhập hoặc mật khẩu không chính xác</div>';
                            }
                        }
                    } else {
                        echo "Bạn cần nhập đầy đủ thông tin trước khi đăng nhập";
                    }
                    ?>
                </form>
            </div>
        </div>
    </div>
</div>