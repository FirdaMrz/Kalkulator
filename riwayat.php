<?php
// Menghubungkan ke database
include 'koneksi.php';

// Jika tombol "Hapus Semua" ditekan, hapus seluruh isi tabel
if (isset($_POST['hapus'])) {
    $conn->query("DELETE FROM riwayat");
}

// Jika tombol hapus per baris ditekan, hapus data sesuai ID
if (isset($_GET['hapus_id'])) {
    $id = intval($_GET['hapus_id']); // pastikan angka
    $conn->query("DELETE FROM riwayat WHERE id = $id");
}

// Ambil semua data riwayat dari database
$result = $conn->query("SELECT * FROM riwayat ORDER BY waktu ASC");
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Riwayat Perhitungan</title>

    <!-- CSS untuk tampilan halaman -->
    <style>
    body {
        font-family: Arial, sans-serif;
        padding: 20px;
        background: #f7f7f7;
    }

    h2 {
        text-align: center;
        font-size: 20px;
        margin-bottom: 10px;
    }

        table {
        width: 80%;
        margin: auto;
        border-collapse: collapse;
        background: #fff;
        box-shadow: 0 0 8px rgba(0,0,0,0.05);
        font-size: 13px;
    }

    th, td {
        padding: 4px 6px; /* Lebih sempit dari sebelumnya */
        border: 1px solid #ccc;
        text-align: center;
        vertical-align: middle; /* Biar isi teks tetap di tengah tapi tidak tinggi */
        line-height: 1; /* Baris lebih rapat */
    }


    th {
        background: #00cc77;
        color: white;
    }

    tr:nth-child(even) {
        background: #f2f2f2;
    }

    a {
        display: block;
        text-align: center;
        margin: 15px;
        text-decoration: none;
        color: #00cc77;
        font-size: 14px;
    }

    .hapus-btn, .hapus-baris {
        background-color: red;
        color: white;
        border: none;
        padding: 4px 8px;          /* Tombol lebih ramping */
        font-size: 11px;           /* Font kecil */
        border-radius: 3px;
        cursor: pointer;
    }

    .hapus-btn {
        margin: 12px auto;
        display: block;
    }
</style>


</head>
<body>

    <h2>Riwayat Perhitungan</h2>

    <!-- Form untuk hapus semua -->
    <form method="POST" onsubmit="return confirm('Yakin ingin menghapus semua riwayat?')">
        <button type="submit" name="hapus" class="hapus-btn">Hapus Semua Riwayat</button>
    </form>

    <!-- Tabel menampilkan hasil riwayat -->
    <table>
        <tr>
            <th>No</th>
            <th>Angka 1</th>
            <th>Operator</th>
            <th>Angka 2</th>
            <th>Hasil</th>
            <th>Waktu</th>
            <th>Aksi</th>
        </tr>

        <?php
        $no = 1;
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                <td>{$no}</td>
                <td>{$row['angka1']}</td>
                <td>{$row['operator']}</td>
                <td>{$row['angka2']}</td>
                <td>{$row['hasil']}</td>
                <td>{$row['waktu']}</td>
                <td>
                    <!-- Tombol hapus per baris -->
                    <a href='riwayat.php?hapus_id={$row['id']}' onclick=\"return confirm('Yakin ingin hapus riwayat ini?')\">
                        <button class='hapus-baris'>Hapus</button>
                    </a>
                </td>
            </tr>";
            $no++;
        }
        ?>
    </table>

    <!-- Link kembali ke halaman kalkulator -->
    <a href='index.php'>← Kembali ke Kalkulator</a>

</body>
</html>
