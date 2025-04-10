<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Riwayat Perhitungan</title>
    <style>
        /* === CSS UNTUK TAMPILAN HALAMAN === */
        body {
            font-family: Arial, sans-serif; /* Jenis font utama */
            padding: 20px; /* Ruang di sekitar konten */
            background: #f7f7f7; /* Warna latar belakang */
        }

        h2 {
            text-align: center; /* Judul ditengah */
            font-size: 20px; /* Ukuran font */
            margin-bottom: 10px; /* Jarak bawah */
        }

        table {
            width: 80%; /* Lebar tabel 80% dari lebar layar */
            margin: auto; /* Tabel ditaruh di tengah halaman */
            border-collapse: collapse; /* Gabungkan garis antar sel agar rapi */
            background: #fff; /* Latar belakang tabel putih */
            box-shadow: 0 0 8px rgba(0,0,0,0.05); /* Tambahkan bayangan lembut */
            font-size: 13px; /* Ukuran huruf default dalam tabel */
            table-layout: fixed; /* Kolom tabel punya lebar tetap, biar rapi */
    }

        th, td {
            padding: 2px 4px; /* Jarak isi sel dari pinggirannya (lebih sempit dari sebelumnya) */
            border: 1px solid #ccc; /* Garis abu terang antar sel */
            text-align: center; /* Teks di tengah secara horizontal */
            vertical-align: middle; /* Teks di tengah secara vertikal */
            line-height: 1; /* Tinggi antar baris yang rapat */
            font-size: 12px; /* Ukuran huruf lebih kecil dari default */
            height: 24px; /* Tinggi maksimum setiap baris biar tidak terlalu tinggi */
            overflow: hidden; /* Sembunyikan teks yang keluar dari sel */
            white-space: nowrap; /* Teks tidak akan pindah ke baris baru */
            text-overflow: ellipsis; /* Tambahkan tanda titik-titik (...) jika teks terlalu panjang */
    }


        th {
            background: #00cc77; /* Warna latar kepala tabel */
            color: white; /* Warna teks */
        }

        tr:nth-child(even) {
            background: #f2f2f2; /* Baris genap warnanya beda */
        }

        a {
            display: block; /* Tampilkan sebagai blok */
            text-align: center; /* Teks tengah */
            margin: 15px; /* Jarak sekitar */
            text-decoration: none; /* Hilangkan garis bawah */
            color: #00cc77; /* Warna teks */
            font-size: 14px; /* Ukuran teks */
        }

        .hapus-btn, .hapus-baris {
            background-color: red; /* Warna tombol merah */
            color: white; /* Teks putih */
            border: none; /* Hilangkan border default */
            padding: 4px 8px; /* Padding dalam tombol */
            font-size: 11px; /* Ukuran font kecil */
            border-radius: 3px; /* Sudut membulat */
            cursor: pointer; /* Cursor jadi tangan */
        }

        .hapus-btn {
            margin: 12px auto; /* Tengah + jarak atas bawah */
            display: block; /* Biar bisa ditengahkan */
        }
    </style>
</head>
<body>
    <h2>Riwayat Perhitungan</h2>

    <!-- Form hapus semua data -->
    <form method="POST" onsubmit="return confirm('Yakin ingin menghapus semua riwayat?')">
        <button type="submit" name="hapus" class="hapus-btn">Hapus Semua Riwayat</button>
    </form>

    <!-- Tabel menampilkan data riwayat -->
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
        // Inisialisasi koneksi database
        include 'koneksi.php';

        // Jika tombol hapus semua ditekan
        if (isset($_POST['hapus'])) {
            $conn->query("DELETE FROM riwayat"); // Hapus semua isi tabel
        }

        // Jika ada permintaan hapus berdasarkan id
        if (isset($_GET['hapus_id'])) {
            $id = intval($_GET['hapus_id']); // Ubah ke integer
            $conn->query("DELETE FROM riwayat WHERE id = $id"); // Hapus baris berdasarkan id
        }

        // Ambil semua data dari tabel riwayat urut berdasarkan waktu
        $result = $conn->query("SELECT * FROM riwayat ORDER BY waktu ASC");
        $no = 1; // Nomor urut
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
            $no++; // Tambah nomor urut
        }
        ?>
    </table>

    <!-- Tombol kembali ke kalkulator -->
    <a href='index.php'>← Kembali ke Kalkulator</a>
      <!-- Footer -->
  <<footer style="position: absolute; bottom: 30px; left: 50%; transform: translateX(-50%); color: #ccc; font-size: 14px;">
  © 2025 Aplikasi Kalkulator | Dibuat oleh <strong>Firda Mareza</strong>
</footer>
</body>
</html>
