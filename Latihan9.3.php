<?php
// buat class komputer
class komputer {
    // Properti
    // Agar bisa diakses class anak (laptop), gunakan protected atau public
    protected $jenis_processor = "Intel Core i7-4790 3.6Ghz";
    protected $jenis_RAM = "DDR 4";
    public $jenis_VGA = "PCI Express";

    public function tampilkan_processor() {
        return $this->jenis_processor;
    }
    
    public function tampilkan_jenisprocessor() {
        return $this->jenis_processor;
    }
    
    // Harus public agar bisa dipanggil dari objek di luar class
    public function tampilkan_ram() {
        return $this->jenis_RAM;
    }
    
    // Harus public agar bisa dipanggil dari objek di luar class
    public function tampilkan_vga() {
        return $this->jenis_VGA;
    }
}

// buat class laptop
class laptop extends komputer {
    public function display_processor() {
        return $this->jenis_processor; // Bisa karena protected (warisan)
    }
    
    public function display_processor2() {
        return $this->tampilkan_processor(); // Memanggil method public
    }
    
    public function display_ram() {
        return $this->jenis_RAM; // Bisa karena protected (warisan)
    }
    
    public function display_ram2() {
        return $this->tampilkan_ram(); // Memanggil method public
    }
    
    public function display_vga() {
        return $this->jenis_VGA; // Bisa karena public
    }
}

// Instansiasi
$komputer = new komputer();
$laptop = new laptop();

// Menjalankan method
echo "Line 61 : " . $komputer->tampilkan_processor() . "<br />";
echo "Line 62 : " . $laptop->display_processor() . "<br />";
echo "Line 63 : " . $laptop->display_processor2() . "<br />";
echo "Line 64 : " . $laptop->tampilkan_jenisprocessor() . "<br />";
echo "Line 65 : " . $laptop->display_ram() . "<br />";
echo "Line 66 : " . $laptop->display_vga() . "<br />";
?>