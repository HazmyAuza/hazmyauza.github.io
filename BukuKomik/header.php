<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rental Buku Komik</title>
    <link rel="stylesheet" href="..\BukuKomik\styles.css">
    <script src="script.js" defer></script>
</head>
<body>
    <header>
        <h1>Rental Buku Komik</h1>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="read.php">Lihat buku</a></li>
                
                <?php if ($_SESSION['role'] == 'admin') : ?>
                    <li><a href="create.php">Buat buku</a></li>
                <?php endif; ?>
                
                <?php
                // Example of conditional navigation based on session
                if (isset($_SESSION['email'])) {
                    echo '<li><a href="logout.php">Logout</a></li>';
                } else {
                    echo '<li><a href="login.php">Login</a></li>';
                }
                ?>
            </ul>
        </nav>
    </header>
