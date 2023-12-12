<?php
$name = $_POST['name'] ?? "";
// nếu username có điền bằng 9 nó ko thì = rỗng
$password = $_POST['password'] ?? "";
$user = new data();
if ($name == "" || $password == "") {
    $error = "Vui lòng nhập đầy đủ thông tin";
} else {
    if ($user->checkUser($name, $password)) {
        $result = $user->userid($name, $password);
        $_SESSION['admin'] = $name;
//        unset($_POST);
        header('Location: index.php?page=home');
        exit;
    } else {
        $error = "Tên đăng nhập hoặc mật khẩu không trùng khớp";

    }
}
?>

<div class="col-lg-4 col-md-8 col-12 mx-auto mt-5">
    <div class="card z-index-0 fadeIn3 fadeInBottom">
        <div class="card-body">
            <form role="form" class="text-start" method="POST">
                <div class="input-group input-group-outline my-3">
                    <input name="name" placeholder="Username" class="form-control">
                </div>
                <div class="input-group input-group-outline mb-3">
                    <input type="password" name="password" placeholder="Password" class="form-control">
                </div>
                <div class="text-center">
                    <button class="btn bg-gradient-primary w-100 my-4 mb-2">Sign in</button>
                </div>
                <p class="mt-4 text-sm text-center text-danger">
                    <?= $error ?? ''; ?>
                </p>


            </form>
        </div>
    </div>
</div>


