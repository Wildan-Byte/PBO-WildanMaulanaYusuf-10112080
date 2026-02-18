<?php
$nama  = $_POST['nama'];
$harga = $_POST['harga'];

echo "<h2>Data Produk</h2>";
echo "Nama Produk : " . $nama . "<br>";
echo "Harga  Rp : " . $harga;

$nama  = htmlspecialchars($_POST['nama']);
$harga = htmlspecialchars($_POST['harga']);

?>
