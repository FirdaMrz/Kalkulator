<?php
// Menghubungkan ke database dengan memanggil koneksi.php
include "koneksi.php";

// Mengambil data yang dikirim melalui metode POST dari JavaScript (fetch)
$angka1 = $_POST['angka1'];
$angka2 = $_POST['angka2'];
$operator = $_POST['operator'];
$hasil = $_POST['hasil'];

// Menyusun perintah SQL untuk menyimpan data ke tabel riwayat
$sql = "INSERT INTO riwayat (angka1, operator, angka2, hasil) 
        VALUES ('$angka1', '$operator', '$angka2', '$hasil')";

// Menjalankan query SQL dan memberi respon apakah berhasil atau gagal
if ($conn->query($sql) === TRUE) {
    echo "Data berhasil disimpan!"; // Jika berhasil
} else {
    echo "Gagal: " . $conn->error; // Jika gagal, tampilkan error-nya
}
?>
