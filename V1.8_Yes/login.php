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
            header('location: index/index.php');
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href='image/IF_jadwal.ico' rel='shortcut icon'>
    <title>Login Page</title>
</head>

<body>
<div class="wrapper">
    <div class="heading">
        <h1>Login Form</h1>
    </div>
    <div class="form">
        <form action="" method="post">
            <span>
                <i class="fas fa-user"></i>
                <input type="text" placeholder="Username" name="user">
            </span><br>
            <span>
                <i class="fas fa-lock"></i>
                <input type="password" placeholder="Password" name="pw">
            </span><br>
            <button name="login">Login</button>
        </form>
    </div>
</div>
</body>
</html>
