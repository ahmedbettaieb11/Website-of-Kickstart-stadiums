<?php
// Connexion à la base de données
$conn = mysqli_connect("127.0.0.1", "root", "", "kickstart_db", 3307);

if (!$conn) {
    die("Erreur de connexion : " . mysqli_connect_error());
}

mysqli_set_charset($conn, "utf8");
?>
