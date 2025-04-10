<?php
include "koneksi.php";

$angka1 = $_POST['angka1'];
$angka2 = $_POST['angka2'];
$operator = $_POST['operator'];
$hasil = $_POST['hasil'];

$sql = "INSERT INTO riwayat (angka1, operator, angka2, hasil) 
        VALUES ('$angka1', '$operator', '$angka2', '$hasil')";

if ($conn->query($sql) === TRUE) {
    echo "Data berhasil disimpan!";
} else {
    echo "Gagal: " . $conn->error;
}
?>
