<?php 
session_start();
$conn = mysqli_connect("localhost","root","","penjadwalan");

if (isset($_POST['login'])){
    $id = $_POST['user'];
    $pw = $_POST['pw'];
    $cek = mysqli_query($conn, "SELECT * FROM t_admin WHERE ID_ADMIN='$id'");
    if (mysqli_num_rows($cek) === 1) {
        $row = mysqli_fetch_assoc($cek);
        if ($pw === $row['Password']) {
            $_SESSION['nama'] = $id;
            header('location: index.php');
        } else {
            echo "Nama pengguna dan kata kunci tidak ditemukan";
        }
    }
    
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="style/stylelogin.css">
    <title>Login Page</title>
</head>

<body>

    <!----------------------- Main Container -------------------------->

    <div class="container d-flex justify-content-center align-items-center min-vh-100">

        <!----------------------- Login Container -------------------------->

        <div class="row border rounded-5 p-3 bg-white shadow box-area">

            <!--------------------------- Left Box ----------------------------->

            <div class="col-md-6 rounded-4 d-flex justify-content-center align-items-center flex-column left-box">
                <div class="featured-image">
                    <img src="image/gedung.jpg" class="img-fluid rounded-3">
                </div>
            </div>

            <!-------------------- ------ Right Box ---------------------------->

            <div class="col-md-6 right-box">
                <div class="col align-items-center">
                    <div class="header-text mb-4">
                        <h1>Selamat Datang</h1>
                        <h3>Masuk akun</h3>
                    </div>
                    <form action="" method="post">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control form-control-lg bg-light fs-6" placeholder="Username" name="user">
                        </div>
                        <div class="input-group mb-2">
                            <input type="password" class="form-control form-control-lg bg-light fs-6" placeholder="Password" name="pw">
                        </div>
                        <div class="input-group mb-3 d-flex justify-content-between">
                            <div class="form-check grid gap-3">
                                <input type="checkbox" class="form-check-input " id="formCheck">
                                <label for="formCheck" class="form-check-label text-secondary"><small>Ingat Saya</small></label>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <button class="btn btn-lg btn-primary w-100 fs-6" name="login">Login</button>
                        </div>
                        <div class="row">
                            <small>Tidak punya akun? <a href="signup.php">Daftar</a></small>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>

</body>

</html>