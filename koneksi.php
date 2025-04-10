<?php
// Menyimpan informasi koneksi database

$host = "localhost"; // Alamat server database, biasanya 'localhost' jika dijalankan di komputer sendiri
$user = "root";      // Username untuk login ke MySQL, default di XAMPP biasanya 'root'
$pass = "";          // Password untuk login ke MySQL, default-nya biasanya kosong
$db = "db_kalkulator"; // Nama database yang akan digunakan

// Membuat koneksi ke database menggunakan objek mysqli
$conn = new mysqli($host, $user, $pass, $db);

// Mengecek apakah koneksi berhasil
if ($conn->connect_error) {
    // Jika koneksi gagal, tampilkan pesan error dan hentikan eksekusi script
    die("Koneksi gagal: " . $conn->connect_error);
}

// Jika tidak ada error, berarti koneksi berhasil dan bisa digunakan untuk query ke database
?>

