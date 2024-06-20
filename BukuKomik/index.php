<?php
session_start();
include 'includes/db.php';

// Check if user is not logged in, redirect to login page
if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit;
}

include 'header.php';
?>

<head>
    <style>
        /* CSS untuk gambar */
        .image-container {
            display: flex;
            justify-content: space-around;
            margin-top: 20px;
            overflow: hidden; /* Mengatur overflow agar gambar tidak keluar dari container */
        }

        .image-container img {
            width: 250px;
            height: 250px;
            object-fit: cover;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            animation: slideRight 15s linear infinite;
        }

        @keyframes slideRight {
            0% {
                transform: translateX(0%);
            }
            100% {
                transform: translateX(100%);
            }
        }
        /* Reset CSS */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

/* Global Styles */
body {
    font-family: 'Comic Sans MS', cursive, sans-serif;
    line-height: 1.6;
    background: radial-gradient(circle, rgba(13,6,36,1) 0%, rgba(51,51,102,1) 50%, rgba(9,9,18,1) 100%);
    padding: 20px;
}

header {
    background-color: #0400e6cc;
    color: #ee0000;
    padding: 10px 0;
    text-align: center;
}

header h1 {
    font-size: 2em;
}

nav ul {
    list-style-type: none;
    padding: 0;
}

nav ul li {
    display: inline;
    margin-right: 10px;
}

nav ul li a {
    color: #fff;
    text-decoration: none;
    padding: 5px 10px;
}

nav ul li a:hover {
    background-color: #555;
}

main {
    background-color: #fff;
    padding: 20px;
    margin-top: 20px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

footer {
    text-align: center;
    padding: 10px 0;
    background-color: #333;
    color: #fff;
    position: fixed;
    bottom: 0;
    width: 100%;
}

/* Form Styling */
form {
    margin-bottom: 20px;
}

input[type="text"], input[type="email"], input[type="password"], input[type="number"] {
    width: 100%;
    padding: 10px;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
}

input[type="submit"], input[type="button"] {
    background-color: #4CAF50;
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-size: 1em;
}

input[type="submit"]:hover, input[type="button"]:hover {
    background-color: #45a049;
}

/* Table Styling */
table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}

table th, table td {
    border: 1px solid #ddd;
    padding: 8px;
    text-align: left;
}

table th {
    background-color: #f2f2f2;
}

table tr:nth-child(even) {
    background-color: #f9f9f9;
}

table tr:hover {
    background-color: #f1f1f1;
}
h2 {
    color: #fff;
    text-align: center;
}
p {
    color: #fff;
    text-align: center;
}
    </style>
</head>

<section>
    <h2>Selamat Datang di Rental Buku Komik</h2>
    <!-- Your content for the home page goes here -->
    <p> Rancangan Basis Data Sistem Informasi Rental Buku Komik </p>
    </section>
    <!-- Images section -->
    <div class="image-container">
        <img src="../BukuKomik/img/bake.jpg" alt="Bakemonogatari">
        <img src="../BukuKomik/img/ousama.jpg" alt="Ousama Ranking">
        <img src="../BukuKomik/img/titan.jpg" alt="Attack On Titan">
        <img src="../BukuKomik/img/berserk.jpg" alt="Berserk">
    </div>
</section>

<?php include 'footer.php'; ?>
