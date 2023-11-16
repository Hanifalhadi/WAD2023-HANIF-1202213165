<!-- Pada file ini kalian membuat coding untuk logika create / menambahkan mobil pada showroom -->

<?php
// (1) Jangan lupa sertakan koneksi database dari yang sudah kalian buat yaa
include('connect.php');

// 

// (2) Buatlah perkondisian untuk memeriksa apakah permintaan saat ini menggunakan metode POST
if ($_SERVER["REQUEST_METHOD"] == "POST");


// 

// (3) Jika sudah coba deh kalian ambil data dari form (CLUE : pakai POST)

    // a. Ambil data nama mobil
    $namamobil = $_POST["nama_mobil"];
    // b. Ambil data brand mobil
    $brandmobil = $_POST["brand_mobil"];
    // c. Ambil data warna mobil
    $warnamobil = $_POST["warna_mobil"];
    // d. Ambil data tipe mobil
    $tipemobil = $_POST["tipe_mobil"];
    // e. Ambil data harga mobil
    $hargamobil = $_POST["harga_mobil"];
    // (4) Kalau sudah, kita lanjut Query / Menambahkan data pada SQL (Disini ada perintah untuk SQL), Masukkan ke tabel showroom_mobil (include setiap nama column)
    $query = mysqli_query($connect, "INSERT INTO showroom_mobil(nama_mobil, brand_mobil, warna_mobil, tipe_mobil, harga_mobil)
    VALUES('$namamobil', '$brandmobil', '$warnamobil', '$tipemobil', '$hargamobil')");

    // (5) Buatkan kondisi jika eksekusi query berhasil
    if($query) {
        echo "<script>alert('Data telah ditambahkan')</script>";
        echo "<meta  http-equiv='refresh' content='1 url=home.php'>" ;
    }
    // (6) Jika terdapat kesalahan, buatkan eksekusi query gagalnya 
    else {
        echo "<script>alert('Gagal ditambahkan')</script>";
        echo "<meta  http-equiv='refresh' content='1 url=home.php'>";
    }
// (7) Tutup koneksi ke database setelah selesai menggunakan database
mysqli_close($connect);
?>