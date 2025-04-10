<!-- Bagian yang dihapus: <div class="log-icon">... -->
<!-- Tombol Log(x) juga dihapus -->
<!-- Fungsi hitungLog() dihapus -->

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <link rel="icon" href="img/icon.png" type="image/png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>APLIKASI KALKULATOR</title>
    <style>
        /* ... (gaya tetap sama, hanya bagian log-icon yang dihapus) ... */
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
        .kalkulator:hover {
            transform: scale(1.02);
            box-shadow: 0px 6px 25px rgba(255, 255, 255, 0.2);
        }
        h2 {
            color: #fff;
            margin-bottom: 15px;
            font-size: 22px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }
        .input-group {
            display: flex;
            justify-content: space-between;
            gap: 10px;
        }
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
        .input-field:focus, .select-field:hover {
            border-color: #00ff99;
            box-shadow: 0px 0px 10px rgba(0, 255, 153, 0.5);
        }
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
            box-shadow: 0px 4px 10px rgba(0, 255, 153, 0.3);
        }
        .button:hover {
            background: linear-gradient(90deg, #00cc77, #009955);
            transform: scale(1.05);
            box-shadow: 0px 6px 15px rgba(0, 255, 153, 0.5);
        }
        .hasil {
            color: #fff;
            font-size: 20px;
            font-weight: bold;
            margin-top: 15px;
        }
        .select-field option[value="+"] { color: green; }
        .select-field option[value="-"] { color: red; }
        .select-field option[value="*"] { color: blue; }
        .select-field option[value="/"] { color: orange; }
        @media print {
            body * {
                visibility: hidden;
            }
            #print-area, #print-area * {
                visibility: visible;
                position: absolute;
                left: 50%;
                top: 50%;
                transform: translate(-50%, -50%);
                font-size: 24px;
                text-align: center;
            }
        }
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

        /* Saat cetak, hanya tampilkan hasil */
        @media print {
            body * {
                visibility: hidden;
            }
            #print-area, #print-area * {
                visibility: visible;
                position: absolute;
                left: 50%;
                top: 50%;
                transform: translate(-50%, -50%);
                font-size: 24px;
                text-align: center;
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
            let angka1 = parseFloat(document.getElementById("angka1").value);
            let angka2 = parseFloat(document.getElementById("angka2").value);
            let operator = document.getElementById("operator").value;
            let hasil;

            if (isNaN(angka1) || isNaN(angka2)) {
                hasil = "Masukkan angka dengan benar!";
                document.getElementById("hasil").innerHTML = hasil;
                document.getElementById("print-area").innerHTML = hasil;
                return;
            }

            switch (operator) {
                case "+": hasil = angka1 + angka2; break;
                case "-": hasil = angka1 - angka2; break;
                case "*": hasil = angka1 * angka2; break;
                case "/": hasil = angka2 !== 0 ? angka1 / angka2 : "Tidak bisa dibagi 0"; break;
                default: hasil = "Operator tidak valid";
            }

            let tampilanHasil = `${angka1} ${operator} ${angka2} = ${hasil}`;
            document.getElementById("hasil").innerHTML = tampilanHasil;
            document.getElementById("print-area").innerHTML = tampilanHasil;
            document.getElementById("print-area").style.display = "none";
            document.getElementById("angka1").focus();

            // Kirim data ke database via PHP
                        fetch("simpan.php", {
                method: "POST",
                headers: {
                    "Content-Type": "application/x-www-form-urlencoded"
                },
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
            const { jsPDF } = window.jspdf;
            const doc = new jsPDF();
            let content = document.getElementById("print-area").innerText;
            doc.text(content, 10, 10);
            doc.save("hasil-perhitungan.pdf");
        }
    </script>
</body>
</html>
