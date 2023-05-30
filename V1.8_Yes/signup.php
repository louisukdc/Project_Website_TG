<?php 
require('koneksilogin.php');

if (isset($_POST['daftar'])){
    if (tambah($_POST) > 0) {
        echo "<script> 
                alert('Berhasil mendaftar akun');
                document.location.href='login.php';
            </script>";
    } else {
        echo "<script> 
                alert('Gagal Mendaftar akun');
            </script>";
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
    <link rel="stylesheet" href="style.css">
    <title>Sign Up Page</title>
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
                <div class="col justify-content-around">
                    <div class="header-text mb-4">
                        <h1>Selamat Datang</h1>
                        <h3>Masuk akun</h3>
                    </div>
                    <form action="" method="post">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control form-control-lg bg-light fs-6" placeholder="Username" name="user" required>
                        </div>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control form-control-lg bg-light fs-6" placeholder="Nama" name="nama" required>
                        </div>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control form-control-lg bg-light fs-6" placeholder="Email" name="email" required>
                        </div>
                        <div class="input-group mb-3">
                            <input type="password" class="form-control form-control-lg bg-light fs-6" placeholder="Password" name="pw" required>
                        </div>
                        <div class="input-group mb-3">
                            <button class="btn btn-lg btn-primary w-100 fs-6" name="daftar">Daftar</button>
                        </div>
                    </form>
                    <div class="row">
                        <small>Sudah punya akun? <a href="login.php">Masuk</a></small>
                    </div>
                </div>
            </div>

        </div>
    </div>

</body>

</html>