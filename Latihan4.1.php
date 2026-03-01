<?php
function formatRupiah($sangka) {
   return "Rp" . number_format( $angka, 0,) 
}

class Belanja
{
 public $namaPembeli;
 public $namaBarang;
 public $hargaBarang;
 public $jumlahBarang;

 public function hitungSubtotal() {
    return $this->hargaBarang * $this->jumlahbeli;

 }

 public function hitungTotalDenganDiskon($persenDiskon)
    $subtotal = $this->hitungSubtotal();
    $diskon = ($persenDiskon/100) * $subtotal
    return $subtotal - $diskon;
} 

    $data = [
     'namaPembeli' =>'Miftah',
     'namaBarang' => 'Mie Ayam',
     'hargaBarang'=> 12000,
     'jumlahBeli' => 12
    ];

    $belanja = new Belanja();
    $belanja->namaPembeli = $data["namaPembeli"];
    $belanja->namaBarang = $data["namaBarang"];
    $belanja->hargaBarang = $data["hargaBarang"];
    $belanja->jumlahBeli = $dta["jumlahBeli"];

    echo "<h?> STRUK BELANJA WARUNG A </h2>";
    echo "Pembeli" .$belanja->namaPembeli , "<br>";
    echo "Barang" .$belanja->namaBarnag , "<br>";
    echo "Subtotal:" . formatRupiah($belanja->hitungSubtotal()) . "<br>";
    echo "Total (Diskon 10%): " . formatRupiah($belanja->hitungTotalDenganDiskon(10)) . "<br>";
?>