<?php
include 'includes/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $judul = $_POST['judul'];
    $pengarang = $_POST['pengarang'];
    $tahun_terbit = $_POST['tahun_terbit'];
    $genre = $_POST['genre'];
    $jumlah_stok = $_POST['jumlah_stok'];

    $sql = "INSERT INTO BukuKomik (Judul, Pengarang, Tahun_Terbit, Genre, Jumlah_Stok)
            VALUES ('$judul', '$pengarang', $tahun_terbit, '$genre', $jumlah_stok)";

    if ($conn->query($sql) === TRUE) {
        echo "Komik telah berhasil dibuat.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Membuat Database Komik</title>
    <link rel="stylesheet" href="styles.css"> <!-- Pastikan untuk memasukkan CSS Anda di sini -->
    <style>
        /* Custom CSS for Galaxy Theme */
        body {
            font-family: 'Comic Sans MS', cursive, sans-serif;
            background: radial-gradient(circle, rgba(13,6,36,1) 0%, rgba(51,51,102,1) 50%, rgba(9,9,18,1) 100%);
            color: #fff;
            padding: 20px;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background-color: rgba(0, 0, 0, 0.7);
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(255, 255, 255, 0.2);
            width: 100%;
            max-width: 600px;
            text-align: center;
        }

        .container h1 {
            font-size: 2.5em;
            margin-bottom: 20px;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
        }

        form {
            margin-top: 20px;
            display: grid;
            gap: 15px;
        }

        form input[type="text"],
        form input[type="number"] {
            font-family: 'Comic Sans MS', cursive, sans-serif;
            padding: 10px;
            font-size: 1em;
            border-radius: 5px;
            border: none;
            background-color: rgba(255, 255, 255, 0.1);
            color: #fff;
            border: 1px solid #fff;
            outline: none;
        }

        form input[type="submit"] {
            font-family: 'Comic Sans MS', cursive, sans-serif;
            padding: 12px 20px;
            font-size: 1.2em;
            border: none;
            background-color: #4CAF50;
            color: #fff;
            cursor: pointer;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        form input[type="submit"]:hover {
            background-color: #45a049;
        }

        .back-button {
            margin-top: 20px;
        }

        .back-button a {
            padding: 10px 20px;
            font-size: 1em;
            background-color: #333;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .back-button a:hover {
            background-color: #555;
        }
    </style>
</head>
<body>
    
    <div class="container">
        <h1>Membuat Database Komik</h1>
        
        <form method="post" action="">
            <input type="text" name="judul" placeholder="Judul" required><br>
            <input type="text" name="pengarang" placeholder="Pengarang" required><br>
            <input type="number" name="tahun_terbit" placeholder="Tahun Terbit" required><br>
            <input type="text" name="genre" placeholder="Genre" required><br>
            <input type="number" name="jumlah_stok" placeholder="Jumlah Stok" required><br>
            <input type="submit" value="Create">
        </form>

        <div class="back-button">
            <a href="index.php">Back to Home</a>
        </div>
    </div>
</body>
</html>
