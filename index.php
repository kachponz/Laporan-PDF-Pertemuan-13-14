<?php include("koneksi.php"); ?>

<!DOCTYPE html>
<html>
<head>
    <title>List Mahasiswa Institut Teknologi Sumeru</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins">
</head>

<body>
    <div class="container">
        <header>
            <h2>INSTITUT TEKNOLOGI SUMERU</h2>
            <h3>DAFTAR MAHASISWA DEPARTEMEN SISTEM GACHA</h3>
        </header>

        <br>

        <table border="1" style="margin-left:auto;margin-right:auto;">
        <thead>
            <tr>
                <th>NIM</th>
                <th>NAMA MAHASISWA</th>
                <th>NO HP</th>
                <th>TANGGAL LAHIR</th>
            </tr>
        </thead>
        <tbody style="text-align: left;">

            <?php
            $sql = "SELECT * FROM mahasiswa";
            $query = mysqli_query($db, $sql);

            while($mahasiswa = mysqli_fetch_array($query)){
                echo "<tr>";

                echo "<td>".$mahasiswa['nim']."</td>";
                echo "<td>".$mahasiswa['nama_lengkap']."</td>";
                echo "<td>".$mahasiswa['no_hp']."</td>";
                echo "<td>".$mahasiswa['tanggal_lahir']."</td>";

                echo "</tr>";
            }
            ?>

        </tbody>
        </table>

        <p>Total: <?php echo mysqli_num_rows($query) ?></p>
        <form action="proses-pdf.php" method="POST">
            <input type="submit" value="Membuat Laporan PDF" name="buat">
        </form>
    </div>
</body>
</html>