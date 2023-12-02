<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <link rel="stylesheet" href="dataview.css">
    <title>Data View</title>
</head>
<body>
    

<div class="container">
        <!-- Tombol untuk kembali ke halaman home.php -->
        <a href="form_data.php">Tambah data</a>

<?php
// Include file koneksi
include 'koneksi.php';

// Koneksi ke database (gantilah sesuai dengan konfigurasi database Anda)
$conn = new mysqli("localhost", "root", "", "datapeserta");

// Periksa koneksi
if ($conn->connect_error) {
    die("Koneksi ke database gagal: " . $conn->connect_error);
}

// Fungsi untuk menghapus data
function deleteData($id) {
    global $conn;
    $sql = "DELETE FROM data WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        // Display the success alert
        echo '<script>alert("Data berhasil dihapus");</script>';
        // Redirect back to data_view.php
        echo '<script>window.location.href = "data_view.php";</script>';
        exit(); // Ensure that the script stops execution after redirection
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}

// Menghandle delete request
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        // Hapus data jika ID tersedia
        deleteData($id);
    } else {
        echo "ID tidak valid.";
    }
}

// Query SQL untuk mengambil data
$sql = "SELECT * FROM data";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Menampilkan data dalam tabel
    echo "<table border='1'>
    <tr>
        <th>Nama</th>
        <th>Email</th>
        <th>Tanggal Lahir</th>
        <th>Jenis Kelamin</th>
        <th>Action</th>
    </tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>
            <td>" . $row["nama"] . "</td>
            <td>" . $row["email"] . "</td>
            <td>" . $row["tanggal_lahir"] . "</td>
            <td>" . $row["jenis_kelamin"] . "</td>
            <td>
                <a href='edit_data.php?id=" . $row["id"] . "'>Edit</a>
                <a href='data_view.php?action=delete&id=" . $row["id"] . "' onclick=\"return confirm('Afakah anda yaqueen utk menghapus item ini? cba pikir 2 kali');\">Delete</a>
            </td>
        </tr>";
    }

    echo "</table>";
} else {
    echo "Tidak ada data yang ditemukan.";
}

// Tutup koneksi
$conn->close();
?>

<div class="home-inf animate__animated animate__fadeInUp"><p>Any suggestion would be appreciated. You can mail me at: <br>
            <a href="mailto:githriffgresik@gmail.com" class="active">githriffgresik@gmail.com</a>
        </div>

            <div class="home-sci animate__animated animate__fadeInUp">
                <h3>Follow me:</h3><br>
                <a href="https://github.com/githdavro/"><i class='bx bxl-github'></i></a>
                <a href="https://www.facebook.com/githriff.nibross/"><i class='bx bxl-facebook'></i></a>
                <a href="https://www.instagram.com/gith.amd_"><i class='bx bxl-instagram'></i></a>
                <a href="#"><i class='bx bxl-whatsapp'></i></a>
                <a href="https://t.me/s/Fre1z4"><i class='bx bxl-telegram'></i></a>
            </div>
            <div class="clock animate__animated animate__fadeInUp">
                <h1 id="current-time"9></h1>
            </div>

            <div class="home-bott animate__animated animate__fadeInUp">
        <p>©2023 GitDaVro All Rights reserved. This site is made with kang love by <a href="https://instagram.com/gith.amd_" target="_blank" class="active">@gith.amd_</a></p>
        </div>
</body>
</html>
