<!DOCTYPE html>
<html lang="en">
<head>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projects | Form data</title>
    <link rel="stylesheet" href="form.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
</head>

<body>
    <header class="header animate__animated animate__fadeInDown">
        <a href="#" class="logosini">GitDaVro.| Projectk</a>

        <nav class="navbar">
            <a href="projects.php">Return to Projects</a>
        </nav>
    </header>

    <section class="dataform">
    <div class="dataform-content animate__animated animate__bounceIn animate__delay-1s">

    <h1>Isi Form data</h1>

    
    <br><br>

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
        $error_email = "<span style='color: red;'>Email harus diisi</span>";
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
            // Display the success alert
            echo '<script>alert("Alhamdulillah Data berhasil diisi");</script>';
    
            // Redirect to data_view.php
            echo '<script>window.location.href = "data_view.php";</script>';
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




<!-- Form Data -->
<form class="dataform-content" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <label class="label" for="name">Name:</label><br> 
    <input type="text" name="nama" value="<?php echo $nama; ?>"><br>
    <span class="error">* <?php echo $error_nama; ?></span>
    <br><br>

    <label class="label" for="name">Email:</label><br>  <input type="text" name="email" value="<?php echo $email; ?>"><br>
    <span class="error">* <?php echo $error_email; ?></span>
    <br><br>

    <label class="label" for="name">Tanggal lahir:</label><br>  <input type="date" name="tanggal_lahir" value="<?php echo $tanggal_lahir; ?>"><br>
    <span class="error">* <?php echo $error_tanggal_lahir; ?></span>
    <br><br>

    <label class="label" for="name">Gender:</label><br>
    <label><input type="radio" name="jenis_kelamin" value="Laki-laki" <?php if ($jenis_kelamin == "Laki-laki") echo "checked"; ?>>Laki-laki</label>
    <input type="radio" name="jenis_kelamin" value="Perempuan" <?php if ($jenis_kelamin == "Perempuan") echo "checked"; ?>>Perempuan</label> <br>
    <span class="error">* <?php echo $error_jenis_kelamin; ?></span>
    <br><br>

    <input type="submit" name="submit" value="Submit">
</form>
</div>

            <div class="home-bott animate__animated animate__fadeInUp">
        <p>©2023 GitDaVro All Rights reserved. This site is made with kang love by <a href="https://instagram.com/gith.amd_" target="_blank" class="active">@gith.amd_</a></p>
        </div>

</section>
</body>
</html>
