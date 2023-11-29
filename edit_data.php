<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <title>Edit Data</title>
</head>
<body>

<?php
// Include file koneksi
include 'koneksi.php';

// Koneksi ke database (gantilah sesuai dengan konfigurasi database Anda)
$conn = new mysqli("localhost", "root", "", "datapeserta");

// Periksa koneksi
if ($conn->connect_error) {
    die("Koneksi ke database gagal: " . $conn->connect_error);
}

// Fungsi untuk mengupdate data
function updateData($id, $nama, $email, $tanggal_lahir, $jenis_kelamin) {
    global $conn;
    $sql = "UPDATE data SET nama='$nama', email='$email', tanggal_lahir='$tanggal_lahir', jenis_kelamin='$jenis_kelamin' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Data berhasil diupdate.";
        // Redirect back to data_view.php
        header("Location: data_view.php");
        exit(); // Ensure that the script stops execution after redirection
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

// Menghandle edit request
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $nama = test_input($_POST["nama"]);
    $email = test_input($_POST["email"]);
    $tanggal_lahir = test_input($_POST["tanggal_lahir"]);
    $jenis_kelamin = test_input($_POST["jenis_kelamin"]);

    // Validasi form
    $error = false;
    if (empty($nama)) {
        $error = true;
        echo "Nama harus diisi.<br>";
    }

    if (empty($email)) {
        $error = true;
        echo "Email harus diisi.<br>";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = true;
        echo "Format email tidak valid.<br>";
    }

    if (empty($tanggal_lahir)) {
        $error = true;
        echo "Tanggal lahir harus diisi.<br>";
    }

    if (empty($jenis_kelamin)) {
        $error = true;
        echo "Jenis kelamin harus diisi.<br>";
    }

    if (!$error) {
        // Update data jika tidak ada error
        updateData($id, $nama, $email, $tanggal_lahir, $jenis_kelamin);
    }
} else {
    // Menampilkan form edit
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $sql = "SELECT * FROM data WHERE id=$id";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            ?>
            <!-- Form Edit Data -->
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">

                Nama: <input type="text" name="nama" value="<?php echo $row['nama']; ?>">
                <br><br>

                Email: <input type="text" name="email" value="<?php echo $row['email']; ?>">
                <br><br>

                Tanggal Lahir: <input type="date" name="tanggal_lahir" value="<?php echo $row['tanggal_lahir']; ?>">
                <br><br>

                Jenis Kelamin:
                <input type="radio" name="jenis_kelamin" value="Laki-laki" <?php if ($row['jenis_kelamin'] == "Laki-laki") echo "checked"; ?>> Laki-laki
                <input type="radio" name="jenis_kelamin" value="Perempuan" <?php if ($row['jenis_kelamin'] == "Perempuan") echo "checked"; ?>> Perempuan
                <br><br>

                <input type="submit" name="submit" value="Update">
            </form>
            <?php
        } else {
            echo "Data tidak ditemukan.";
        }
    } else {
        echo "ID tidak valid.";
    }
}

// Tutup koneksi
$conn->close();

// Fungsi untuk membersihkan dan memvalidasi data input
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>

<p>Any suggestion would be appreciated. You can mail me at <br>
    <a href="mailto:githriffgresik@gmail.com">githriffgresik@gmail.com</a></p>

    <div class="social-icons">
        <span>Follow me:</span><br>
        <a href="https://github.com/githdavro" target="_blank"><i class="fab fa-github"></i></a>
        <a href="https://facebook.com/githriff" target="_blank"><i class="fab fa-facebook"></i></a>
        <a href="https://instagram.com/gith.amd_" target="_blank"><i class="fab fa-instagram"></i></a>
        <a href="https://twitter.com/githriff" target="_blank"><i class="fab fa-twitter"></i></a>
        <a href="https://t.me/githriff" target="_blank"><i class="fab fa-telegram"></i></a>
    </div>

    <p class="copyright">&#169; 2023 All Rights reserved. This site is made with kang love by <a href="https://instagram.com/gith.amd_" target="_blank">@gith.amd_</a></p>


</body>
</html>
