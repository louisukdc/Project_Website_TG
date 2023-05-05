<?php
session_start();
if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // lakukan verifikasi username dan password di sini
    if ($username === 'admin' && $password === 'admin123') {
        // jika username dan password benar, set session dan redirect ke halaman selanjutnya
        $_SESSION['username'] = $username;
        header('Location: dashboard.php');
        exit;
    } else {
        // jika username dan password salah, tampilkan pesan error
        $errorMessage = 'Invalid username or password';
    }
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Login Page</title>
</head>
<body>
	<h2>Login Page</h2>
	<form action="auth.php" method="post">
		<label>Username:</label><br>
		<input type="text" name="username" required><br>
		<label>Password:</label><br>
		<input type="password" name="password" required><br><br>
		<input type="submit" value="Login">
	</form>
	<?php if (isset($errorMessage)) { ?>
		<p><?php echo $errorMessage; ?></p>
	<?php } ?>
</body>
</html>
