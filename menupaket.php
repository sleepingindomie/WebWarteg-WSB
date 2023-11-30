<!DOCTYPE html>
<html>
<head>
    <title>Menu Paket</title>
    <link href='https://fonts.googleapis.com/css?family=Playfair+Display:400,700,400italic,700italic|Merriweather:300,400italic,300italic,400,700italic' rel='stylesheet' type='text/css'>
    <style>
        /* CSS tambahan untuk mempercantik tampilan tabel */
        body {
            background-image: url('wood_1.png');
            background-repeat: repeat;
            font-family: 'Playfair Display', serif;
            margin: 0;
            padding: 20px;
            text-align: center;
        }
        
        h2 {
            font-family: 'Playfair Display', serif;
            font-size: 24px;
            color: white; /* Ubah warna font menjadi putih */
            opacity: 0; /* Menyembunyikan elemen */
            transform: translateY(100px); /* Membawa elemen 100px dari bawah */
            transition: opacity 1s ease, transform 1s ease; /* Efek transisi */
        }
        
        h3 {
            font-family: 'Merriweather', serif;
            font-size: 18px;
            margin-bottom: 30px;
            color: white; /* Ubah warna font menjadi putih */
            opacity: 0; /* Menyembunyikan elemen */
            transform: translateY(100px); /* Membawa elemen 100px dari bawah */
            transition: opacity 1s ease, transform 1s ease; /* Efek transisi */
        }
        
        table {
            background-color: rgba(255, 255, 255, 0.7);
            margin: 0 auto;
            border-collapse: collapse;
            width: 100%;
            max-width: 800px;
            opacity: 0; /* Menyembunyikan elemen */
            transform: translateY(100px); /* Membawa elemen 100px dari bawah */
            transition: opacity 1s ease, transform 1s ease; /* Efek transisi */
        }
        
        table th, table td {
            padding: 10px;
            border: 1px solid rgba(0, 0, 0, 0.3);
        }
        
        .fade-in-up {
            opacity: 0;
            transform: translateY(20px);
            transition: opacity 1s ease, transform 1s ease;
        }
        
        .orange-link {
            color: orange;
        }
    </style>
    <link href='https://fonts.googleapis.com/css?family=Playfair+Display:400,700,400italic,700italic|Merriweather:300,400italic,300italic,400,700italic' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="css/animate.css">
</head>
<body>
    <h2 id="menu-title">Menu Paket WSB</h2>
    <h3 id="menu-subtitle">Kualitas Bintang Lima, Harga Kaki Lima</h3>
    
    <table id="menu-table">
        <tr>
            <th>Paket</th>
            <th>Makanan</th>
            <th>Minuman</th>
            <th>Harga</th>
        </tr>
        <?php

        // Membuat koneksi
        $koneksi = new mysqli("localhost", "root", "", "wsb");

        // Memeriksa koneksi
        if ($koneksi->connect_error) {
            die("Koneksi database gagal: " . $koneksi->connect_error);
        }

        // Mengambil data dari tabel menu
        $sql = "SELECT no, makanan, minuman, harga FROM menu";
        $result = $koneksi->query($sql);

        // Memeriksa apakah terdapat data
        if ($result->num_rows > 0) {
            // Menampilkan data dari setiap baris
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                    <td>" . $row["no"] . "</td>
                    <td>" . $row["makanan"] . "</td>
                    <td>" . $row["minuman"] . "</td>
                    <td>" . $row["harga"] . "</td>
                </tr>";
            }
        } else {
            echo "<tr><td colspan='4'>Tidak ada data menu.</td></tr>";
        }

        // Menutup koneksi
        $koneksi->close();
        ?>
    </table>
    
    <a href="index.php" class="js-gotop fade-in-up orange-link">Kembali ke Menu Utama</a>

    <script>
        // Fungsi animasi fade-in-up
        function fadeinup(element) {
            let op = 0; // Nilai opacity awal (0 = transparan)
            let pos = 20; // Nilai posisi awal (20 = 20px dari bawah)

            let timer = setInterval(function () {
                if (op >= 1 && pos <= 0) {
                    clearInterval(timer);
                }

                element.style.opacity = op;
                element.style.transform = `translateY(-${pos}px)`;
                op += 0.02; // Nilai penambahan opacity
                pos -= 1; // Nilai pengurangan posisi
            }, 10); // Interval waktu animasi (ms)
        }

        // Memanggil fungsi fadeinup untuk elemen menu-title dan menu-subtitle
        fadeinup(document.getElementById("menu-title"));
        fadeinup(document.getElementById("menu-subtitle"));

        // Memanggil fungsi fadeinup untuk elemen menu-table
        setTimeout(function () {
            fadeinup(document.getElementById("menu-table"));
        }, 1000); // Menunda pemanggilan fungsi selama 1 detik (1000 ms)

        // Memanggil fungsi fadeinup untuk elemen js-gotop
        setTimeout(function () {
            fadeinup(document.querySelector(".js-gotop"));
        }, 2000); // Menunda pemanggilan fungsi selama 2 detik (2000 ms)
    </script>
</body>
</html>
