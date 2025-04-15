        <!-- Struktur dasar HTML -->
<!DOCTYPE html>
<html lang="id">
<head>
    <!-- Pengaturan icon, viewport, dan judul -->
    <meta charset="UTF-8">
    <link rel="icon" href="img/icon.png" type="image/png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>APLIKASI KALKULATOR</title>

    <!-- CSS internal untuk tampilan kalkulator -->
    <style>
        /* Mengatur tampilan latar belakang dan posisi kalkulator */
        body {
            font-family: 'Poppins', Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: linear-gradient(rgba(18, 18, 18, 0.8), rgba(58, 58, 82, 0.8)), 
                url('img/bg.jpg') no-repeat center center fixed;
            background-size: cover;
            margin: 0;
        }

        /* Tampilan kotak kalkulator */
        .kalkulator {
            width: 350px;
            background: rgba(255, 255, 255, 0.15);
            padding: 25px;
            border-radius: 15px;
            backdrop-filter: blur(15px);
            box-shadow: 0px 4px 20px rgba(255, 255, 255, 0.1);
            text-align: center;
            transition: 0.3s ease-in-out;
            position: relative;
        }

        /* Judul Kalkulator */
        h2 {
            color: #fff;
            margin-bottom: 15px;
            font-size: 22px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        /* Input dan operator diletakkan sejajar */
        .input-group {
            display: flex;
            justify-content: space-between;
            gap: 10px;
        }

        /* Desain input dan dropdown */
        .input-field, .select-field {
            width: 100%;
            padding: 12px;
            margin: 10px 0;
            border-radius: 8px;
            border: none;
            font-size: 16px;
            background: rgb(255, 254, 254);
            color: rgb(0, 0, 0);
            text-align: center;
            outline: none;
            transition: all 0.3s ease-in-out;
        }

        /* Desain tombol */
        .button {
            width: 100%;
            padding: 12px;
            margin: 10px 0;
            border-radius: 8px;
            border: none;
            font-size: 16px;
            background: linear-gradient(90deg, #00ff99, #00cc77);
            color: #000;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.3s ease-in-out;
        }

        .hasil {
            color: #fff;
            font-size: 20px;
            font-weight: bold;
            margin-top: 15px;
        }
        /* Efek hover & focus pada input dan select */
        .input-field:hover,
        .select-field:hover,
        .input-field:focus,
        .select-field:focus {
            box-shadow: 0 0 8px rgba(0, 255, 153, 0.5);
            border: 1px solid #00cc77;
        }

        /* Efek hover dan aktif pada tombol */
        .button:hover {
            background: linear-gradient(90deg, #00cc77, #009955);
            transform: scale(1.03);
            box-shadow: 0 4px 12px rgba(0, 255, 153, 0.3);
        }

        .button:active {
            transform: scale(0.97);
            box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.2);
        }

        /* Saat cetak, hanya tampilkan hasil */
                @media print {
            body * {
                visibility: hidden;
            }

            #print-area {
                visibility: visible;
                position: absolute;
                left: 50%;
                top: 50%;
                transform: translate(-50%, -50%);
                font-size: 16px;
                width: 90%;
                max-width: 500px;
                padding: 30px;
                background: white;
                border: 2px solid #000;
                border-radius: 8px;
                text-align: center;
                box-shadow: 0 0 10px rgba(0,0,0,0.1);
            }

            #print-area h3 {
                margin-bottom: 20px;
                font-size: 20px;
                text-transform: uppercase;
            }

            #print-area p {
                font-size: 16px;
                margin: 10px 0;
            }
        }

    </style>
</head>

<!-- Isi utama kalkulator -->
<body>
    <div class="kalkulator">
        <h2>Kalkulator</h2>

        <!-- Input angka pertama -->
        <div class="input-group">
            <input type="number" id="angka1" class="input-field" placeholder="Angka 1">

            <!-- Dropdown operator -->
            <select id="operator" class="select-field">
                <option value="+">+</option>
                <option value="-">-</option>
                <option value="*">*</option>
                <option value="/">/</option>
            </select>

            <!-- Input angka kedua -->
            <input type="number" id="angka2" class="input-field" placeholder="Angka 2">
        </div>

        <!-- Tombol untuk menghitung -->
        <button class="button" onclick="hitung()">Hitung</button>

        <!-- Tombol untuk cetak hasil ke PDF -->
        <button class="button" onclick="printHasil()">Print Hasil</button>

        <!-- Tombol ke halaman riwayat -->
        <a href="riwayat.php">
            <button class="button">Lihat Riwayat</button>
        </a>

        <!-- Area hasil tampil di sini -->
        <div class="hasil" id="hasil"></div>
        <div id="print-area" style="display: none;"></div>
    </div>

    <!-- Plugin jsPDF dari CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>

    <!-- Logika JavaScript -->
    <script>
      // Fungsi utama untuk menghitung
        function hitung() {
            // Ambil nilai dari input dengan id "angka1", ubah ke float (bilangan desimal)
            let angka1 = parseFloat(document.getElementById("angka1").value);
            // Ambil nilai dari input dengan id "angka2", ubah ke float juga
            let angka2 = parseFloat(document.getElementById("angka2").value);
            // Ambil nilai operator (misalnya: +, -, *, /) dari select input
            let operator = document.getElementById("operator").value;
            let hasil; // Variabel untuk menyimpan hasil perhitungan

            // Cek apakah input bukan angka (NaN = Not a Number)
            if (isNaN(angka1) || isNaN(angka2)) {
                hasil = "Masukkan angka dengan benar!"; // Pesan error
                // Tampilkan pesan error ke elemen dengan id "hasil"
                document.getElementById("hasil").innerHTML = hasil;
                // Juga tampilkan ke elemen dengan id "print-area"
                document.getElementById("print-area").innerHTML = hasil;
                return; // Hentikan proses jika input tidak valid
            }

            // Lakukan operasi matematika berdasarkan nilai operator
            switch (operator) {
                case "+": // Jika operator +
                    hasil = angka1 + angka2;
                    break;
                case "-": // Jika operator -
                    hasil = angka1 - angka2;
                    break;
                case "*": // Jika operator *
                    hasil = angka1 * angka2;
                    break;
                case "/": // Jika operator /
                    hasil = angka2 !== 0 ? angka1 / angka2 : "Tidak bisa dibagi 0"; // Cegah pembagian dengan nol
                    break;
                default:
                    hasil = "Operator tidak valid"; // Jika operator bukan dari yang diharapkan
            }

            // Buat tampilan hasil dalam format HTML
            let tampilanHasil = `
                <h4>Hasil :</h4>
                <p>${angka1} ${operator} ${angka2} = ${hasil}</p> 
            `;

            // Tampilkan hasil di elemen dengan id "hasil"
            document.getElementById("hasil").innerHTML = tampilanHasil;
            // Juga tampilkan hasil di elemen dengan id "print-area"
            document.getElementById("print-area").innerHTML = tampilanHasil;
            // Sembunyikan elemen print-area (mungkin hanya ditampilkan saat print nanti)
            document.getElementById("print-area").style.display = "none";
            // Fokuskan kembali ke input angka1 agar pengguna bisa langsung isi ulang
            document.getElementById("angka1").focus();

            // Kirim data hasil perhitungan ke server menggunakan fetch (AJAX)
            fetch("simpan.php", {
                method: "POST", // Kirim data dengan metode POST
                headers: {
                    "Content-Type": "application/x-www-form-urlencoded" // Format data yang dikirim
                },
                // Encode data agar aman dikirim via URL dan sesuai format x-www-form-urlencoded
                body: `angka1=${encodeURIComponent(angka1)}&angka2=${encodeURIComponent(angka2)}&operator=${encodeURIComponent(operator)}&hasil=${encodeURIComponent(hasil)}`
            });

        }


        // Fungsi untuk memanggil cetak hasil
        function printHasil() {
            let hasil = document.getElementById("print-area").innerText;
            if (hasil === "") {
                alert("Hitung dulu sebelum mencetak!");
            } else {
                downloadPDF();
            }
        }

       // Fungsi untuk membuat file PDF dari hasil
            async function downloadPDF() {
                // Mengambil object jsPDF dari library jspdf (pastikan sudah include di HTML kamu)
                const { jsPDF } = window.jspdf;
                // Membuat dokumen PDF baru
                const doc = new jsPDF();

                // Ambil nilai dari input angka1, angka2, dan operator
                let angka1 = document.getElementById("angka1").value;
                let angka2 = document.getElementById("angka2").value;
                let operator = document.getElementById("operator").value;

                let hasil; // Variabel untuk menyimpan hasil perhitungan

               // Lakukan perhitungan sesuai operator yang dipilih
            switch (operator) {
                case "+": 
                    // Jika operator adalah penjumlahan, tambahkan angka1 dan angka2 setelah dikonversi ke float
                    hasil = parseFloat(angka1) + parseFloat(angka2);
                    break;

                case "-": 
                    // Jika operator adalah pengurangan, kurangkan angka2 dari angka1 setelah dikonversi ke float
                    hasil = parseFloat(angka1) - parseFloat(angka2);
                    break;

                case "*": 
                    // Jika operator adalah perkalian, kalikan angka1 dan angka2 setelah dikonversi ke float
                    hasil = parseFloat(angka1) * parseFloat(angka2);
                    break;

                case "/": 
                    // Jika operator adalah pembagian, periksa apakah angka2 bukan nol
                    hasil = angka2 != 0 
                        ? (parseFloat(angka1) / parseFloat(angka2)).toFixed(2) // Jika bukan nol, bagi angka1 dengan angka2 dan bulatkan hasilnya 2 angka di belakang koma
                        : "Tidak bisa dibagi 0"; // Jika nol, tampilkan pesan error
                    break;

                default: 
                    // Jika operator tidak sesuai dengan yang dikenali, tampilkan pesan error
                    hasil = "Operator tidak valid";
            }

                // Ganti font menjadi Helvetica dan tebal (bold)
                doc.setFont("OpenSans", "bold");
                // Set ukuran font menjadi 18
                doc.setFontSize(18);
                // Tambahkan judul di tengah halaman
                doc.text("Hasil Perhitungan", 105, 20, null, null, "center");

                // Atur font untuk tanggal cetak ke Open Sans, ukuran kecil
                doc.setFont("OpenSans", "bold");

                doc.setFontSize(9);

            // Ambil teks tanggal
            const tanggalCetak = `Tanggal Cetak: ${new Date().toLocaleString('id-ID')}`;

            // Hitung panjang teks untuk posisi kanan (kurang lebih)
            const textWidth = doc.getTextWidth(tanggalCetak);

            // Posisi kanan (A4 lebar 210mm - margin 20)
            const xPos = 190 - textWidth;

            // Tampilkan tanggal cetak di kanan atas
            // Teks tanggal cetak - warna biru
            doc.setTextColor(0, 0, 255); // biru
            doc.text(tanggalCetak, xPos, 35);
            doc.setTextColor(0, 0, 0); // kembali ke hitam

            // Garis pemisah tetap seperti biasa
            doc.line(20, 38, 190, 38);

            // Kembalikan font dan ukuran ke default untuk isi konten
            doc.setFont("helvetica", "normal");
            doc.setFontSize(12);

            // Konten utama PDF
            doc.text("Angka 1", 20, 50);
            doc.text(`: ${angka1}`, 60, 50);

            doc.text("Operator", 20, 60);
            doc.text(`: ${operator}`, 60, 60);

            doc.text("Angka 2", 20, 70);
            doc.text(`: ${angka2}`, 60, 70);

            // Ubah warna teks jadi merah
            doc.setTextColor(255, 0, 0);
            doc.text("Hasil", 20, 80);
            doc.text(`: ${hasil}`, 60, 80);

            // Balikin ke hitam lagi biar yang bawah gak ikut merah
            doc.setTextColor(0, 0, 0);


                // Tambahkan garis penutup
                doc.line(20, 85, 190, 85);

                // Tambahkan catatan kecil di bawah (footer)
                doc.setFontSize(10); // Ukuran font kecil
                doc.setTextColor(100); // Warna teks abu-abu
                doc.text("Dicetak menggunakan Aplikasi Kalkulator", 105, 95, null, null, "center");

                // Simpan dan unduh file PDF dengan nama "hasil-perhitungan.pdf"
                doc.save("hasil-perhitungan.pdf");
            }

    </script>

<body>
  <div class="kalkulator-box">
    <!-- isi kalkulator kamu di sini -->
  </div>

  <!-- Footer -->
  <<footer style="position: absolute; bottom: 30px; left: 50%; transform: translateX(-50%); color: #ccc; font-size: 14px;">
  © 2025 Aplikasi Kalkulator | Dibuat oleh <strong>Firda Mareza</strong>
</footer>

</body>

</body>
</html>
