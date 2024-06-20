<?php
include 'includes/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_buku = $_POST['id_buku'];

    $sql = "DELETE FROM BukuKomik WHERE ID_Buku=$id_buku";

    if ($conn->query($sql) === TRUE) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}
?>

<form method="post" action="">
    ID Buku: <input type="number" name="id_buku"><br>
    <input type="submit" value="Delete">
</form>
