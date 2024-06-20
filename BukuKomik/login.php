<?php
session_start();
include 'includes/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM Anggota WHERE Email='$email' AND Password='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $_SESSION['email'] = $email;
        $_SESSION['role'] = $row['role']; // Pastikan 'Role' sesuai dengan kolom di tabel
        $_SESSION['login_message'] = "Login successful";
        header("Location: index.php");
        exit;
    } else {
        $error_message = "Invalid email or password";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        /* Reset CSS */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Comic Sans MS', cursive, sans-serif;
            background: radial-gradient(circle, rgba(15,6,36,1) 0%, rgba(51,51,102,1) 50%, rgba(34,36,18,1) 100%);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .container {
            background-color: rgba(255, 255, 255, 0.1);
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            width: 300px;
            text-align: center;
        }

        .container h2 {
            color: #fff;
            margin-bottom: 20px;
        }

        form {
            display: grid;
            gap: 15px;
        }

        form input[type="email"],
        form input[type="password"] {
            padding: 12px;
            font-size: 1em;
            border-radius: 5px;
            border: none;
            background-color: rgba(255, 255, 255, 0.8);
            color: #333;
            outline: none;
        }

        form input[type="submit"] {
            padding: 12px 20px;
            font-size: 1.2em;
            border: none;
            background-color: #1abc9c;
            color: #fff;
            cursor: pointer;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        form input[type="submit"]:hover {
            background-color: #16a085;
        }

        form .error-message {
            color: #ff4f42;
            margin-top: 10px;
        }

        .back-button {
            margin-top: 20px;
        }

        .back-button a {
            text-decoration: none;
            padding: 10px 20px;
            background-color: #34495e;
            color: #fff;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .back-button a:hover {
            background-color: #2c3e50;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Login</h2>
        
        <form method="post" action="">
            <input type="email" name="email" placeholder="Email" required><br>
            <input type="password" name="password" placeholder="Password" required><br>
            <input type="submit" value="Login">
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($error_message)) {
            echo '<p class="error-message">' . $error_message . '</p>';
        }
        ?>

        <div class="back-button">
            <a href="index.php">Back</a>
        </div>
    </div>
    
</body>
</html>
