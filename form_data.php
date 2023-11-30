<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GitDaVro | Form Data</title>
    
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>

<header class="header">
        <a href="#" class="logosini">GitDaVro.</a>

        <nav class="navbar">
            
            <a href="projects.php">Back</a>
            <a href="https://github.com/githdavro/"><i class='bx bxl-github'></i></a>
        </nav>
    </header>


<?php
// Include file koneksi
include 'koneksi.php';

// Inisialisasi variabel
$nama = $email = $tanggal_lahir = $jenis_kelamin = "";
$error_nama = $error_email = $error_tanggal_lahir = $error_jenis_kelamin = "";

// Setelah form disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validasi dan ambil data
    $nama = test_input($_POST["nama"]);
    $email = test_input($_POST["email"]);
    $tanggal_lahir = test_input($_POST["tanggal_lahir"]);
    
    // Check if 'jenis_kelamin' index is set before accessing its value
    $jenis_kelamin = isset($_POST["jenis_kelamin"]) ? test_input($_POST["jenis_kelamin"]) : "";

    // Validasi form
    if (empty($nama)) {
        $error_nama = "Nama harus diisi";
    }

    if (empty($email)) {
        $error_email = "Email harus diisi";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error_email = "Format email tidak valid";
    }

    if (empty($tanggal_lahir)) {
        $error_tanggal_lahir = "Tanggal lahir harus diisi";
    }

    if (empty($jenis_kelamin)) {
        $error_jenis_kelamin = "Jenis kelamin harus diisi";
    }

    // Jika tidak ada error, simpan data ke database
    if (empty($error_nama) && empty($error_email) && empty($error_tanggal_lahir) && empty($error_jenis_kelamin)) {
        // Koneksi ke database (gantilah sesuai dengan konfigurasi database Anda)
        $conn = new mysqli("localhost","root","","datapeserta");

        // Periksa koneksi
        if ($conn->connect_error) {
            die("Koneksi ke database gagal: " . $conn->connect_error);
        }

        // Persiapkan data untuk disimpan ke database
        $nama = $conn->real_escape_string($nama);
        $email = $conn->real_escape_string($email);
        $tanggal_lahir = $conn->real_escape_string($tanggal_lahir);
        $jenis_kelamin = $conn->real_escape_string($jenis_kelamin);

        // Query SQL untuk menyimpan data
        $sql = "INSERT INTO data (nama, email, tanggal_lahir, jenis_kelamin) VALUES ('$nama', '$email', '$tanggal_lahir', '$jenis_kelamin')";

        // Eksekusi query
        if ($conn->query($sql) === TRUE) {
            echo "Data berhasil disimpan ke database.";
    
            // Redirect to data_view.php
            header("Location: data_view.php");
            exit(); // Ensure that the script stops execution after redirection
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    
        // Tutup koneksi
        $conn->close();
    }
}

// Fungsi untuk membersihkan dan memvalidasi data input
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>


<section class="contact">
    <h1>Isi Form data</h1>
    <br><br>

<!-- Form Data -->
<form class="contact-content" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    Nama: <input type="text" name="nama" value="<?php echo $nama; ?>">
    <span class="error">* <?php echo $error_nama; ?></span>
    <br><br>

    Email: <input type="text" name="email" value="<?php echo $email; ?>">
    <span class="error">* <?php echo $error_email; ?></span>
    <br><br>

    Tanggal Lahir: <input type="date" name="tanggal_lahir" value="<?php echo $tanggal_lahir; ?>">
    <span class="error">* <?php echo $error_tanggal_lahir; ?></span>
    <br><br>

    Jenis Kelamin:
    <input type="radio" name="jenis_kelamin" value="Laki-laki" <?php if ($jenis_kelamin == "Laki-laki") echo "checked"; ?>> Laki-laki
    <input type="radio" name="jenis_kelamin" value="Perempuan" <?php if ($jenis_kelamin == "Perempuan") echo "checked"; ?>> Perempuan
    <span class="error">* <?php echo $error_jenis_kelamin; ?></span>
    <br><br>

    <input type="submit" name="submit" value="Submit">
</form>

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
