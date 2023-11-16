<!-- File ini berisi koneksi dengan database yang telah di import ke phpMyAdmin kalian -->


<?php
// Buatlah variable untuk connect ke database yang telah di import ke phpMyAdmin
$dbhost = "localhost:3308";
$dbuser = "root"; // username anda
$dbname = "modul3_wad";
$dbpass = "";

$connect = mysqli_connect("$dbhost", "$dbuser", "$dbpass", "$dbname");
// 
  
// Buatlah perkondisian jika tidak bisa terkoneksi ke database maka akan mengeluarkan errornya

if($connect){
    echo "<h1>Koneksi Berhasil</h1>";
}
else{
    echo "<h1>Koneksi Tidak Berhasil !!!</h1>";
}
// 
?>