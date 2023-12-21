<?php
$host = 'localhost'; // Nama hostnya
$username = 'root'; // Username
$password = 'wibr4h4s14'; // Password (Isi jika menggunakan password)
$database = 'db_upload_soal'; // Nama databasenya

// Koneksi ke MySQL dengan PDO
$pdo = new PDO('mysql:host='.$host.';dbname='.$database, $username, $password);
?>