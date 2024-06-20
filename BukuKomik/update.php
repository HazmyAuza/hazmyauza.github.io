<?php
include 'includes/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_buku = $_POST['id_buku'];
    $judul = $_POST['judul'];
    $pengarang = $_POST['pengarang'];
    $tahun_terbit = $_POST['tahun_terbit'];
    $genre = $_POST['genre'];
    $jumlah_stok = $_POST['jumlah_stok'];

    $sql = "UPDATE BukuKomik SET Judul='$judul', Pengarang='$pengarang', Tahun_Terbit=$tahun_terbit, Genre='$genre', Jumlah_Stok=$jumlah_stok WHERE ID_Buku=$id_buku";

    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $conn->error;
    }
} else {
    // Check if 'id' parameter is set in the URL
    if (isset($_GET['id'])) {
        $id_buku = $_GET['id'];
        $sql = "SELECT * FROM BukuKomik WHERE ID_Buku=$id_buku";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
        } else {
            echo "No book found with ID: " . $id_buku;
        }
    } else {
        echo "No book ID provided.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Buku Komik</title>
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
            background: radial-gradient(circle, rgba(13,6,36,1) 0%, rgba(51,51,102,1) 50%, rgba(9,9,18,1) 100%);
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .container {
            max-width: 600px;
            background-color: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            font-size: 2.5em;
            margin-bottom: 20px;
            text-align: center;
            color: #333;
        }

        form {
            display: grid;
            gap: 15px;
        }

        form input[type="text"],
        form input[type="number"] {
            padding: 12px;
            font-size: 1em;
            border-radius: 5px;
            border: 1px solid #ddd;
            outline: none;
        }

        form input[type="submit"] {
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
            text-align: center;
            margin-top: 20px;
        }

        .back-button a {
            text-decoration: none;
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .back-button a:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Edit Data Buku Komik</h1>
        
        <form method="post" action="">
            <?php if (isset($row)) : ?>
                <input type="hidden" name="id_buku" value="<?php echo $row['ID_Buku']; ?>">
                Judul: <input type="text" name="judul" value="<?php echo $row['Judul']; ?>"><br>
                Pengarang: <input type="text" name="pengarang" value="<?php echo $row['Pengarang']; ?>"><br>
                Tahun Terbit: <input type="number" name="tahun_terbit" value="<?php echo $row['Tahun_Terbit']; ?>"><br>
                Genre: <input type="text" name="genre" value="<?php echo $row['Genre']; ?>"><br>
                Jumlah Stok: <input type="number" name="jumlah_stok" value="<?php echo $row['Jumlah_Stok']; ?>"><br>
                <input type="submit" value="Update">
            <?php endif; ?>
        </form>

        <!-- Back Button -->
        <div class="back-button">
            <a href="read.php">Cancel</a>
        </div>
    </div>
</body>
</html>
