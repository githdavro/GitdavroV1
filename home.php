<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GitDaVro | Home</title>
    <link rel="stylesheet" href="style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>
    <header class="header">
        <a href="#" class="logosini">GitDaVro.</a>

        <nav class="navbar">
            <a href="#" class="active">Home</a>
            <a href="about.php">About</a>
            <a href="projects.php">Projects</a>
            <a href="contact.php">Contact</a>
            <a href="?logout=true">Logout</a>
        </nav>
    </header>

    <section class="home">
        <div class="home-content">
            <h1>Hi, I am Githriff Ahmad</h1>
            <h3> Student and a Junior Front-End Developer</h3>
            <p>I am a Front-End Web Developer, with PHP and JavaScript as my favorite programming languages.
            I also enjoy drawing, designing, and much more.
            </p>
            <div class="btn-box">
                <a href="about.php">About</a>
                <a href="contact.php">Contact Me!</a>
            </div>
        </div>

        <div class="home-inf"><p>Any suggestion would be appreciated. You can mail me at: <br>
            <a href="mailto:githriffgresik@gmail.com" class="active">githriffgresik@gmail.com</a>
        </div>

            <div class="home-sci">
                <h3>Follow me:</h3><br>
                <a href="https://github.com/githdavro/"><i class='bx bxl-github'></i></a>
                <a href="https://www.facebook.com/githriff.nibross/"><i class='bx bxl-facebook'></i></a>
                <a href="https://www.instagram.com/gith.amd_"><i class='bx bxl-instagram'></i></a>
                <a href="#"><i class='bx bxl-whatsapp'></i></a>
                <a href="https://t.me/s/Fre1z4"><i class='bx bxl-telegram'></i></a>
            </div>
            <div class="clock">
                <h1 id="current-time"9></h1>
            </div>

            <span class="home-imgHover"></span>

            <div class="home-bott">
        <p>©2023 GitDaVro All Rights reserved. This site is made with kang love by <a href="https://instagram.com/gith.amd_" target="_blank" class="active">@gith.amd_</a></p>
        </div>


    </section>
        
<script>
    let time = document.getElementById("current-time")

    setInterval(() =>{
        let d = new Date();
        time.innerHTML = d.toLocaleTimeString()
    },1000)
</script>


<?php
// Mulai sesi (pastikan ini dijalankan di setiap halaman yang melibatkan sesi)
session_start();

// Fungsi logout
if (isset($_GET['logout'])) {
    // Hancurkan semua variabel sesi
    session_unset();

    // Hancurkan sesi
    session_destroy();

    // Alihkan ke halaman login atau halaman lain yang sesuai
    header("Location: login.php");
    exit();
}
?>


</body>

</html>
