<!-- Modal -->
<div class="" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="loginModalLabel">Quên mật khẩu</h5>
            </div>
            <div class="modal-body">
                <form action="" method="post" id="formDemo" class="form">
                    <?php
                    if (isset($_POST['send'])) {
                        // array() hàm rỗng để chứ thông báo lỗi
                        $error = array();
                        $email = $_POST['email'];
                        $result = $user->getUserEmail($email);
                        // Kiểm tra email đã gửi có trống hay ko nếu lỗi sẽ gửi thông báo vào mảng array()
                        if ($email == '') {
                            $error['email'] = 'Email không được để trống';
                        }
                        // Kiểm tra email có tồn tại trên hệ thống hay ko
                        if (empty($error) && !empty($result)) {
                            // Kiểm tra email có tồn tại không
                            $code = str_pad(rand(0, 999999), 6, '0', STR_PAD_LEFT); //Tạo mã xác nhận code có 6 chữ số
                            $title = "Quên mật khẩu";
                            $content = "Mã xác nhận của bạn là: <span style='color: green'>" . $code . "</span>";
                            $mail->sendMail($title, $content, $email);

                            $_SESSION['mail'] = $email; //lưu email
                            $_SESSION['code'] = $code; //lưu mã xác nhận
                            header("location: index.php?page=verifcation");
                            exit;
                        }
                    }
                    ?>
                    <div class="mb-3">
                        <p style="margin-bottom: 20px;" class="title">Quên mật khẩu?</p>
                        <input type="text" class="form-control" name="email" placeholder="Nhập email">
                        <span style="color: red;">
                            <?php
                            // Kiểm tra email có tồn tại trong $error hay ko
                            if (isset($error['email'])) {
                                echo $error['email']; //nếu email tồn tại thì if đc thực thi
                            }
                            ?>
                        </span>
                    </div>
                    <div class="modal-footer">
                        <button name="send" type="submit" class="btn btn-primary">Gửi yêu cầu</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>