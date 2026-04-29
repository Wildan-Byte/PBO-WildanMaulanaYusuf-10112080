<?php
class Manusia {
    // Properti (menggunakan public alih-alih var)
    public $nama = "Ardi";
    public $kelas = "SI 2";

    // Method
    public function tampilkan_nama() {
        return $this->nama;
    }

    public function tampilkan_kelas() {
        return $this->kelas;
    }
}

// Instansiasi class Manusia
$manusia = new Manusia();

// Memanggil method
echo "Nama : " . $manusia->tampilkan_nama() . "<br />";
echo "Kelas : " . $manusia->tampilkan_kelas();
?>