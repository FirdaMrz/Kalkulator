
<?php
include 'koneksi.php';

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
            width: 90%;
            margin: auto;
            border-collapse: collapse;
            background: #fff;
            box-shadow: 0px 0px 10px rgba(0,0,0,0.1);
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
    </style>
</head>
<body>
    <h2>Riwayat Perhitungan</h2>
    <table>
        <tr>
            <th>No</th>
            <th>Angka 1</th>
            <th>Operator</th>
            <th>Angka 2</th>
            <th>Hasil</th>
            <th>Waktu</th>
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
            </tr>";
            $no++;
        }
        ?>
    </table>

    <a href='index.php'>← Kembali ke Kalkulator</a>
</body>
</html>
