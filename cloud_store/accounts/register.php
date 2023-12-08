<?php
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $name = $_POST['name'] ?? "";
    $email = $_POST['email'] ?? "";
    $password = $_POST['password'] ?? "";
    $role = 0;

    if (empty($name)) {
        $error_name = 'Vui lòng nhập tên đăng nhập';
    } else {
        $db = new accounts();
        $result = $db->getList();
        foreach ($result as $item) {
            if ($name === $item['name']) {
                $error_name = 'Tên đăng nhập đã tồn tại';
            }
        }
    }

    if (empty($email)) {
        $error_email = 'Vui lòng nhập email';

    } elseif (!preg_match("/^[a-zA-Z0-9._-]+@[a-zA-Z0-9-]+\.[a-zA-Z.]{2,5}$/", $email)) {
        $error_email = 'Email không đúng định dạng';
    } else {
        $db = new accounts();
        $result = $db->getList();
        foreach ($result as $item) {
            if ($email === $item['email']) {
                $error_email = 'Email đã tồn tại';
            }
        }
    }

    if (empty($password)) {
        $error_password = 'Vui lòng nhập mật khẩu';
    } elseif (strlen($password) <= 4) {
        $error_password = 'Mật khẩu chứa ít nhất 4 ký tự';
    }


    if (!isset($error_name) && !isset($error_email) && !isset($error_password)) {
        $db = new accounts();
        $result = $db->getDK($name, $email, $password);
        if ($result) {
            $_SESSION['message'] = "Thêm thành công";
            header('location: index.php?page=login');
        } else {
            $_SESSION['error'] = "Thêm thất bại";
        }
    }
}


?>
<!-- Modal -->
<div class="" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="loginModalLabel">Đăng ký</h5>

            </div>
            <div class="modal-body">
                <form action="" method="post">
                    <div class="mb-3">
                        <label for="name" class="form-label">Tên đăng nhập</label>
                        <input type="text" class="form-control" name="name" aria-describedby="emailHelp">
                        <?php
                        if (isset($error_name)) {
                            echo '<small class="text-danger">' . $error_name . '</small>';
                        }
                        ?>
                        <div id="emailHelp" class="form-text"></div>
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">Email</label>
                        <input type="text" class="form-control" name="email" aria-describedby="emailHelp">
                        <?php
                        if (isset($error_email)) {
                            echo '<small class="text-danger">' . $error_email . '</small>';
                        }
                        ?>
                        <div id="emailHelp" class="form-text"></div>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Mật khẩu</label>
                        <input type="password" class="form-control" name="password">
                        <?php
                        if (isset($error_password)) {
                            echo '<small class="text-danger">' . $error_password . '</small>';
                        }
                        ?>
                    </div>
                    <div class="modal-footer">
                        <input type="submit" class="btn btn-primary" value="Đăng ký" name="register">
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
