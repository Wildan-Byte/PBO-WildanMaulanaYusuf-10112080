<?php
$pinjaman = $_POST['pinjaman'];
$lama = $_POST['lama_angsuran'];
$terlambat = $_POST['terlambat'];

$bunga = 10; // bunga konstan 10%

$nilai_bunga = ($bunga/100) * $pinjaman;
$total_pinjaman = $pinjaman + $nilai_bunga;

$angsuran = $total_pinjaman / $lama;

$denda = 0.0015 * $angsuran * $terlambat;

$total_bayar = $angsuran + $denda;
?>

<html>
<head>
    <title>hasil</title>
</head>
<body>

<h2>TOKO PEGADAIAN SYARIAH</h2>
<h3>jalan keadilan no 98</h3>
<h3>telpon :089166543377</h3>

<h3>program penghitungan besaran angsuran hutang</h3>

Besaran Pinjaman : Rp.<?php echo number_format($pinjaman,0,",","."); ?><br>
Masukan besar bunga (%) : <?php echo $bunga; ?><br>
Total Pinjaman : Rp.<?php echo number_format($total_pinjaman,0,",","."); ?><br>
Lama angsuran (bulan) : <?php echo $lama; ?><br>
Besaran angsuran : Rp.<?php echo number_format($angsuran,0,",","."); ?><br>

<br>
Ketentuan denda keterlambatan 0,15% per hari dari angsuran<br><br>

Keterlambatan Angsuran (Hari): <?php echo $terlambat; ?><br>
Denda Keterlambatan : <?php echo number_format($denda,0,",","."); ?><br>
Besaran Pembayaran : <?php echo number_format($total_bayar,0,",","."); ?><br>

<br><br>
<a href="tugas3.php">kembali</a>

</body>
</html>