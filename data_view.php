<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data View</title>
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

// Fungsi untuk menghapus data
function deleteData($id) {
    global $conn;
    $sql = "DELETE FROM data WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        echo "Data berhasil dihapus.";
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}

// Menghandle delete request
if (isset($_GET['action']) && $_GET['action'] == 'delete' && isset($_GET['id'])) {
    $id = $_GET['id'];
    deleteData($id);
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
                <a href='data_view.php?action=edit&id=" . $row["id"] . "'>Edit</a>
                <a href='data_view.php?action=delete&id=" . $row["id"] . "' onclick=\"return confirm('Are you sure you want to delete this item?');\">Delete</a>
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

</body>
</html>
