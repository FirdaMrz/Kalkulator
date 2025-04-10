<?php
include 'koneksi.php';

// Hapus semua data jika tombol hapus semua diklik
if (isset($_POST['hapus'])) {
    $conn->query("DELETE FROM riwayat");
}

// Hapus data berdasarkan ID
if (isset($_GET['hapus_id'])) {
    $id = intval($_GET['hapus_id']);
    $conn->query("DELETE FROM riwayat WHERE id = $id");
}

// Ambil semua data riwayat
$result = $conn->query("SELECT * FROM riwayat ORDER BY waktu ASC");
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Riwayat Perhitungan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
            background: #f7f7f7;
        }
        h2 {
            text-align: center;
        }
        table {
            width: 95%;
            margin: auto;
            border-collapse: collapse;
            background: #fff;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        th, td {
            padding: 12px;
            border: 1px solid #ccc;
            text-align: center;
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
            margin: 20px;
            text-decoration: none;
            color: #00cc77;
        }
        .hapus-btn, .hapus-baris {
            background-color: red;
            color: white;
            border: none;
            padding: 6px 12px;
            border-radius: 4px;
            cursor: pointer;
        }
        .hapus-btn {
            margin: 20px auto;
            display: block;
        }
    </style>
</head>
<body>
    <h2>Riwayat Perhitungan</h2>

    <!-- Tombol hapus semua -->
    <form method="POST" onsubmit="return confirm('Yakin ingin menghapus semua riwayat?')">
        <button type="submit" name="hapus" class="hapus-btn">Hapus Semua Riwayat</button>
    </form>

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
                    <a href='riwayat.php?hapus_id={$row['id']}' onclick=\"return confirm('Yakin ingin hapus riwayat ini?')\">
                        <button class='hapus-baris'>Hapus</button>
                    </a>
                </td>
            </tr>";
            $no++;
        }
        ?>
    </table>

    <a href='index.php'>← Kembali ke Kalkulator</a>
</body>
</html>
