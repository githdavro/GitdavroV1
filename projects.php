<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GitDaVro | About</title>
    <link rel="stylesheet" href="style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
<header class="header">
        <a href="#" class="logosini">GitDaVro.</a>

        <nav class="navbar">
            <a href="home.php" >Home</a>
            <a href="about.php" >About</a>
            <a href="projects.php" class="active">Projects</a>
            <a href="contact.php">Contact</a>
            <a href="?logout=true">Logout</a>
        </nav>
    </header>

    <section class="project">
    <div class="project-content">
        <h1>My Projects</h1>
    <div class="project-card">
    <!-- Kartu Program Menambah Data -->
    <div class="card" onclick="location.href='form_data.php';">
        <h3>Program Menambah Data</h3>
        <img src="project1.png" alt="Project 1 Preview" style="width: 20%;">
    </div>

    <!-- Kartu Kalkulator -->
    <div class="card" onclick="location.href='project2_details.php';">
        <h3>Kalkulator</h3>
        <img src="project2_preview.jpg" alt="Project 2 Preview" style="width: 100%;">
    </div>

    <!-- Kartu Lainnya -->
    <div class="card" onclick="location.href='project3_details.php';">
        <h3>Lainnya</h3>
        <img src="project3_preview.jpg" alt="Project 3 Preview" style="width: 100%;">
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


</body>
</html>
