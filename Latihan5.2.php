<?php

function formatRupiah($angka): string {
return "Rp " . number_format(num: $angka, decimals: 0, decimal_separator: ',', thousands_separator: '.');
}

class BelanjaWarung {

public $namaPembeli;
public $namaBarang;
public $hargaBarang;
public $jumlahBeli;

public function hitungSubtotal(): float|int {
return $this->hargaBarang * $this->jumlahBeli;
}

public function hitungDiskon($subtotal): float|int {
if ($subtotal > 100000) {
return $subtotal * 0.1;
}
return 0;
}

public function hitungTotal(): float|int {
$subtotal = $this->hitungSubtotal();
$diskon = $this->hitungDiskon(subtotal: $subtotal);
return $subtotal - $diskon;
}
}

$dataBelanja = [
[
"nama" => "Dudung",
"barang" => "Gula 1 Kg",
"harga" => 65000,
"jumlah" => 2
],
[
"nama" => "Wildan",
"barang" => "Minyak 1 L",
"harga" => 140000,
"jumlah" => 1
]
];

echo "

TRANSAKSI 1
";

$errors1 = [];

$nama = $dataBelanja[0]["nama"];
$barang = $dataBelanja[0]["barang"];
$harga = $dataBelanja[0]["harga"];
$jumlah = $dataBelanja[0]["jumlah"];

if (empty($nama)) {
$errors1[] = "Nama pembeli tidak boleh kosong.";
}

if ($harga <= 0) {
$errors1[] = "Harga harus lebih dari 0.";
}

if ($jumlah <= 0) {
$errors1[] = "Jumlah beli harus lebih dari 0.";
}

if (!empty($errors1)) {
foreach ($errors1 as $error) {
echo $error . "
";
}
} else {
$belanja1 = new BelanjaWarung();
$belanja1->namaPembeli = $nama;
$belanja1->namaBarang = $barang;
$belanja1->hargaBarang = $harga;
$belanja1->jumlahBeli = $jumlah;

$subtotal = $belanja1->hitungSubtotal();
$diskon = $belanja1->hitungDiskon(subtotal: $subtotal);
$total = $belanja1->hitungTotal();

echo "Pembeli : " . $belanja1->namaPembeli . "<br>
";
echo "Barang : " . $belanja1->namaBarang . "<br>
";
echo "Subtotal : " . formatRupiah(angka: $subtotal) . "<br>
";
echo "Diskon : " . formatRupiah(angka: $diskon) . "<br>
";
echo "Total Bayar: " . formatRupiah(angka: $total) . "</b><br><br>

";
}

echo "
TRANSAKSI 2
";

$errors2 = [];

$nama = $dataBelanja[1]["nama"];
$barang = $dataBelanja[1]["barang"];
$harga = $dataBelanja[1]["harga"];
$jumlah = $dataBelanja[1]["jumlah"];

if (empty($nama)) {
$errors2[] = "Nama pembeli tidak boleh kosong.";
}

if ($harga <= 0) {
$errors2[] = "Harga harus lebih dari 0.";
}

if ($jumlah <= 0) {
$errors2[] = "Jumlah beli harus lebih dari 0.";
}

if (!empty($errors2)) {
foreach ($errors2 as $error) {
echo $error . "
";
}
}
else {
$belanja2 = new BelanjaWarung();
$belanja2->namaPembeli = $nama;
$belanja2->namaBarang = $barang;
$belanja2->hargaBarang = $harga;
$belanja2->jumlahBeli = $jumlah;

$subtotal = $belanja2->hitungSubtotal();
$diskon = $belanja2->hitungDiskon(subtotal: $subtotal);
$total = $belanja2->hitungTotal();

echo "Pembeli : " . $belanja2->namaPembeli."<br>
";
echo "Barang : " . $belanja2->namaBarang."<br>
";
echo "Subtotal : " . formatRupiah(angka: $subtotal) . "<br>
";
echo "Diskon : " . formatRupiah(angka: $diskon) . "<br>
";
echo "Total Bayar : " . formatRupiah(angka: $total) . "</b><br><br>

";
}
?>