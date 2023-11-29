<?php
// Fungsi untuk mengirim pesan ke Telegram
function sendMessageToTelegram($name, $email, $message) {
    // Ganti 'YOUR_TELEGRAM_BOT_TOKEN' dengan token bot Telegram Anda
    $botToken = 'YOUR_TELEGRAM_BOT_TOKEN';

    // Ganti 'YOUR_TELEGRAM_CHAT_ID' dengan ID obrolan Telegram Anda
    $chatID = 'YOUR_TELEGRAM_CHAT_ID';

    // Pesan yang akan dikirim ke Telegram
    $telegramMessage = "New Message from Contact Form:\n\nName: $name\nEmail: $email\nMessage: $message";

    // URL untuk mengirim pesan ke Telegram
    $telegramURL = "https://api.telegram.org/bot$botToken/sendMessage?chat_id=$chatID&text=" . urlencode($telegramMessage);

    // Mengirim pesan ke Telegram
    $response = file_get_contents($telegramURL);

    // Mengembalikan respons (mungkin dapat digunakan untuk penanganan lebih lanjut)
    return $response;
}

// Setelah form disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari formulir
    $name = test_input($_POST["name"]);
    $email = test_input($_POST["email"]);
    $message = test_input($_POST["message"]);

    // Validasi data (jika diperlukan)

    // Kirim pesan ke Telegram
    $telegramResponse = sendMessageToTelegram($name, $email, $message);

    // Tambahkan logika atau tindakan lain yang diinginkan setelah pengiriman pesan
    // Misalnya, bisa menampilkan pesan sukses atau error, atau mengarahkan ke halaman tertentu

    // Redirect atau tampilkan pesan sukses
    header("Location: contact.php?success=true");
    exit();
}

// Fungsi untuk membersihkan dan memvalidasi data input
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GitDaVro | Contact</title>
    <link rel="stylesheet" href="style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
<header class="header">
        <a href="#" class="logosini">GitDaVro.</a>

        <nav class="navbar">
            <a href="home.php" >Home</a>
            <a href="about.php" >About</a>
            <a href="projects.php" >Projects</a>
            <a href="#" class="active">Contact</a>
            <a href="?logout=true">Logout</a>
        </nav>
    </header>

    <section class="contact">
    <div class="contact-content">
    


    <h1>Contact us</h1>



<form class="contact-content" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <label class="label" for="name">Name:</label>
    <input class="input" type="text" name="name" required><br>

    <label for="email">Email:</label>
    <input type="email" name="email" required><br>

    <label for="message">Message:</label>
    <textarea name="message" rows="4" required></textarea>

    <?php
// Tampilkan pesan sukses jika ada
if (isset($_GET['success']) && $_GET['success'] == 'true') {
    echo "<p>Message sent successfully. We'll get back to you soon!</p>";
}
?>

    
    <input type="submit" value="Submit">

</form>
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
