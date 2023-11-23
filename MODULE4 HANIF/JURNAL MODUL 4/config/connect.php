<!-- File ini berisi koneksi dengan database MySQL -->
<?php 

// (1) Buatlah variable untuk connect ke database yang telah di import ke phpMyAdmin
$dbhost = "localhost:3308";
$dbuser = "root"; 
$dbname = "modul4_wad";
$dbpass = "";

$db = mysqli_connect("$dbhost", "$dbuser", "$dbpass", "$dbname");
// 

// (2) Buatlah perkondisian untuk menampilkan pesan error ketika database gagal terkoneksi
if ($db){
    echo "<h1>Koneksi Berhasil</h1>";
}
else{
    echo "<h1>Koneksi Tidak Berhasil !!!</h1>";
// 
}   
?>