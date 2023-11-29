<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projects Page</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            text-align: center;
            padding: 20px;
            background-color: #f4f4f4;
            color: #333;
        }

        h2 {
            color: #333;
        }

        .project-card {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
            margin-top: 20px;
        }

        .card {
            width: 300px;
            margin: 20px;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s;
            cursor: pointer;
        }

        .card:hover {
            transform: scale(1.05);
        }

        .back-btn {
            margin-top: 20px;
            text-decoration: none;
            background-color: #333;
            color: #fff;
            padding: 10px 20px;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .back-btn:hover {
            background-color: #555;
        }
    </style>
</head>
<body>

<h2>My Projects</h2>

<div class="project-card">
    <!-- Kartu Program Menambah Data -->
    <div class="card" onclick="location.href='form_data.php';">
        <h3>Program Menambah Data</h3>
        <img src="project1_preview.jpg" alt="Project 1 Preview" style="width: 100%;">
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

<!-- Tombol untuk kembali ke halaman home.php -->
<a class="back-btn" href="home.php">Back to Home</a>

</body>
</html>
