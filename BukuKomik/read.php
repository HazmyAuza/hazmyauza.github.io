<?php
session_start();
include 'includes/db.php'; // Memasukkan file koneksi ke database

// Check if user is not logged in, redirect to login page
if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Koleksi Buku Komik</title>
    <style>
        /* Reset CSS */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Global Styles */
        body {
            font-family: 'Comic Sans MS', cursive, sans-serif;
            background-color: #f2f3f7;
            background-image: url('https://wallpapercave.com/wp/wp12670893.jpg'); /* Ganti dengan gambar latar belakang yang Anda miliki */
            background-size: cover;
            background-position: center;
            padding: 20px;
            position: relative; /* Diperlukan untuk posisi absolute bintik-bintik */
        }

        @keyframes snowfall {
            0% {
                transform: translateY(0);
            }
            100% {
                transform: translateY(100vh);
            }
        }

        .container {
            max-width: 900px;
            margin: 0 auto;
            background-color: rgba(255, 255, 255, 0.8); /* Warna latar belakang kontainer */
            padding: 20px;
            border-radius: 15px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
        }

        h1 {
            font-size: 2.5em;
            margin-bottom: 20px;
            text-align: center;
            color: #3c64b1;
        }

        .book-list {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 20px;
        }

        .book-item {
            background-color: #fff;
            padding: 15px;
            border-radius: 10px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            text-align: center;
            transition: transform 0.3s ease;
            position: relative;
        }

        .book-item:hover {
            transform: translateY(-5px);
        }

        .book-cover {
            width: 100%;
            max-height: 300px;
            object-fit: cover;
            border-radius: 8px;
            margin-bottom: 10px;
        }

        h2 {
            font-size: 1.5em;
            color: #3c64b1;
            margin-bottom: 10px;
        }

        .book-item p {
            margin-bottom: 5px;
        }

        .empty-message {
            text-align: center;
            font-style: italic;
            color: #888;
            margin-top: 20px;
        }

        .back-button {
            text-align: center;
            margin-top: 20px;
        }

        .back-button a {
            text-decoration: none;
            padding: 10px 20px;
            background-color: #3c64b1;
            color: #fff;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .back-button a:hover {
            background-color: #304e8c;
        }

        .action-buttons {
            display: flex;
            justify-content: center;
            margin-top: 10px;
        }

        .action-buttons a {
            text-decoration: none;
            padding: 8px 16px;
            background-color: #e74c3c;
            color: #fff;
            border-radius: 5px;
            font-size: 0.8em;
            transition: background-color 0.3s ease;
            margin-right: 10px;
        }

        .action-buttons a.edit-button {
            background-color: #3498db;
        }

        .action-buttons a.delete-button {
            background-color: #e74c3c;
        }

        .action-buttons a:hover {
            background-color: #c0392b;
        }
    </style>
</head>
<body>
<div class="container">
        <h1>Daftar Buku Komik Yang Tersedia</h1>
        
        <div class="book-list">
            <?php
            $sql = "SELECT * FROM BukuKomik";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo '<div class="book-item">';
                    echo '<h2>' . $row["Judul"] . '</h2>';
                    echo '<p><strong>Pengarang:</strong> ' . $row["Pengarang"] . '</p>';
                    echo '<p><strong>Tahun Terbit:</strong> ' . $row["Tahun_Terbit"] . '</p>';
                    
                    // Hanya tampilkan tombol Edit dan Delete jika peran admin
                    if ($_SESSION['role'] == 'admin') {
                        echo '<div class="action-buttons">';
                        echo '<a href="update.php?id=' . $row["ID_Buku"] . '" class="edit-button">Edit</a>';
                        echo '<a href="delete.php?id=' . $row["ID_Buku"] . '" class="delete-button" onclick="return confirmDelete()">Delete</a>';
                        echo '</div>';
                    }
                    
                    echo '</div>';
                }
            } else {
                echo "<p class='empty-message'>Tidak ada buku komik yang tersedia.</p>";
            }

            $conn->close();
            ?>
        </div>

        <!-- Back Button -->
        <div class="back-button">
            <a href="index.php">Kembali</a>
        </div>
    </div>

    <script>
        function confirmDelete() {
            return confirm("Apakah Anda yakin ingin menghapus buku komik ini?");
        }
    </script>
</body>
</html>
