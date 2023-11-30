<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>GitDaVro | Login</title>
    <link rel="stylesheet" href="style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
</head>
<body>

<header class="header animate__animated animate__fadeInDown">
        <a href="#" class="logosini">GitDaVro.</a>
</header>

<?php
// Set username dan password yang benar
$correct_username = "gitdavro";
$correct_password = "123";

// Inisialisasi variabel
$username = "";
$password = "";
$login_error = "";

// Cek apakah form telah disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil nilai username dan password dari form
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Periksa apakah username dan password benar
    if ($username == $correct_username && $password == $correct_password) {
        // Tampilkan pesan pop-up "Login berhasil"
        echo '<script>alert("Login berhasil");</script>';
        
        // Redirect ke halaman home.php jika login berhasil
        header("Location: home.php");
        exit();
    } else {
        // Tampilkan pesan error jika login gagal
        $login_error = "Maaf, username atau password yang Anda masukkan salah.";
    }
}
?>

<!-- Form Login -->

<section class="login">
<form class="contact-content animate__animated animate__bounceIn animate__delay-1s" method="post" action="">
    <label for="username">Username:</label>
    <input type="text" name="username"  placeholder="Insert username" id="username" value="<?php echo $username; ?>" required>
    <br>
    <label for="password">Password:</label>
    <input type="password" name="password" placeholder="Insert Password" id="password" required>
    <br>
    <input type="submit" value="Login">
</form>

<div class="home-bott animate__animated animate__fadeInUp">
        <p>©2023 GitDaVro All Rights reserved. This site is made with kang love by <a href="https://instagram.com/gith.amd_" target="_blank" class="active">@gith.amd_</a></p>
        </div>


</section>

<?php
// Tampilkan pesan error jika ada
if ($login_error) {
    echo '<script>alert("' . $login_error . '");</script>';
}
?>

</body>
</html>
