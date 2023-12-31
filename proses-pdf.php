<?php
require('fpdf.php');
if(isset($_POST['buat'])){
    $pdf = new FPDF('l','mm','A5');
    $pdf->AddPage();
    $pdf->SetFont('Arial','B',16);
    $pdf->Cell(190,7,'INSTITUT TEKNOLOGI SUMERU',0,1,'C');
    $pdf->SetFont('Arial','B',12);
    $pdf->Cell(190,7,'DAFTAR MAHASISWA DEPARTEMEN SISTEM GACHA',0,1,'C');

    $pdf->Cell(10,7,'',0,1);

    $pdf->SetFont('Arial','B',10);
    $pdf->Cell(20,6,'NIM',1,0);
    $pdf->Cell(85,6,'NAMA MAHASISWA',1,0);
    $pdf->Cell(30,6,'NO HP',1,0);
    $pdf->Cell(35,6,'TANGGAL LAHIR',1,1);

    $pdf->SetFont('Arial','',10);

    include('koneksi.php');
    $mahasiswa = mysqli_query($db, "select * from mahasiswa");
    if($mahasiswa) {
        while ($row = mysqli_fetch_array($mahasiswa)){
            $pdf->Cell(20,6,$row['nim'],1,0);
            $pdf->Cell(85,6,$row['nama_lengkap'],1,0);
            $pdf->Cell(30,6,$row['no_hp'],1,0);
            $pdf->Cell(35,6,$row['tanggal_lahir'],1,1); 
        }
    }
    else {
        die("Gagal mengakses tabel...");
    }

    $pdf->Output('D', 'report.pdf');
}
else {
    die("Pembuatan file laporan PDF gagal...");
}
?>
