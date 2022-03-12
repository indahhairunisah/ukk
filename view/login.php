<?php
include '../model/koneksi.php';
include './layout/header.php';

session_start();

if($_SESSION && !$_SESSION['daftar_sukses']) {
    header("location: /hotelindahhai/admin/dashboard/dashboard.php");
}

$alertMessage = "";

if(isset($_POST['login'])) {

    // Inputan User
    $username = $_POST['username'];
    $password = $_POST['password'];

    // check data apakah user ada di database
    $sql = "SELECT * FROM user WHERE username='$username'";
    $result = $koneksi->query($sql);
    $userDB = $result->fetch_assoc();

    if($userDB) {
        // Jika username ada di db dan password salah
        // Pengecekan pertama, membandingkan password dari db dengan password yang di input user
        if($userDB['password'] != $password) {
            $alertMessage = "Username  atau Password salah";
        }else {
            $_SESSION["username"] = $userDB['username'];
            $_SESSION["level"] = $userDB['level'];
            header("location: ../admin/dashboard/dashboard.php");
        }
    }else if(!$userDB) {
        $alertMessage = "Username  tidak terdaftar";
    }

}

?>


<style>
    body {
        width: 100%;
        height: 100%;
        padding: 0;
        margin: 0;
        background: #e6e6e6;
    }

</style>

    <div class="container">
        <div class="row">
            <div class="col-md-3 mx-auto position-absolute start-50 top-50 translate-middle">
                <div class="card py-3 shadow">
                    <div class="card-body rounded">
                        <h1 class="text-center">Login</h1>

                        <?php if($alertMessage) : ?>
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                <?= $alertMessage; ?>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php endif; ?>

                        <?php if($_SESSION && $_SESSION['daftar_sukses']) : ?>
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <?= $_SESSION['daftar_sukses']; ?>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php endif; ?>

                        <form action="" method="post">
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" required name="username" class="form-control" id="username">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" required name="password" class="form-control" id="password">
                        </div>
                        <div class="d-grid gap-2">
                          <button type="submit" name="login" class="btn btn-primary d-block shadow">Login</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>