<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Mobil</title>
</head>
<body>
    <?php include("navbar.php") ?>
    <center>
        <div class="container">
            <h1>List Mobil</h1>

            <?php
            include("connect.php");

            // Buatlah query untuk mengambil data dari database (gunakan query SELECT)

            $query = "SELECT * FROM showroom_mobil";
            

            // Buatlah perkondisian dimana: 
            // 1. a. Apabila ada data dalam database, maka outputnya adalah semua data dalam database akan ditampilkan dalam bentuk tabel 
            //       (gunakan num_rows > 0, while, dan mysqli_fetch_assoc())
            
            
            //    b. Untuk setiap data yang ditampilkan, buatlah sebuah button atau link yang akan mengarahkan web ke halaman 
            //       form_detail_mobil.php dimana halaman tersebut akan menunjukkan seluruh data dari satu mobil berdasarkan id
        

            // 2. Apabila tidak ada data dalam database, maka outputnya adalah pesan 'tidak ada data dalam tabel'

            //<!--  **********************  1  **************************     -->
                    if ($result = mysqli_query($connect,$query)) {
                        echo "<table border='2'>
                            <tr>
                            <th>ID MOBIL</th>
                            <th>NAMA MOBIL</th>
                            <th>BRAND MOBIL</th>
                            <th>WARNA MOBIL</th>
                            <th>TIPE MOBIL</th>
                            <th>HARGA MOBIL</th>";
                    }
                    // Lakukan looping while pada hasil dari query di atas
                    while ($row = mysqli_fetch_assoc($result)){
                        echo 
                        "<tr><td>" .$row['id']."</td>".
                        "<td>" .$row['nama_mobil']."</td>".
                        "<td>" .$row['brand_mobil']."</td>".
                        "<td>" .$row['warna_mobil']."</td>".
                        "<td>" .$row['tipe_mobil']."</td>".
                        "<td>" .$row['harga_mobil']."</td></tr>";
                        
                        }
        


            //<!--  **********************  1  **************************     -->

            //<!--  **********************  2  **************************     -->

            
            

            
            
            //<!--  **********************  2  **************************     -->
            ?>
        </div>
    </center>
</body>
</html>
