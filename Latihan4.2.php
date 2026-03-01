<?php

class Mahasiswa {

    public $nama;
    public $kelas;
    public $mataKuliah;
    public $nilai;

    public function __construct($nama, $kelas, $mataKuliah, $nilai) {
        $this->nama = $nama;
        $this->kelas = $kelas;
        $this->mataKuliah = $mataKuliah;
        $this->nilai = $nilai;
    }

    public function statusKelulusan() {
        if ($this->nilai >= 60) {
            return "Lulus Kuis";
        } else {
            return "Tidak Lulus Kuis";
        }
    }
    public function tampilkanData() {
        echo "Nama : " . $this->nama . "<br>";
        echo "Kelas : " . $this->kelas . "<br>";
        echo "Mata Kuliah : " . $this->mataKuliah . "<br>";
        echo "Nilai : " . $this->nilai . "<br>";
        echo $this->statusKelulusan();
        echo "<hr>";
    }
}

$dataMahasiswa = [
    new Mahasiswa("Aditya", "SI 2", "Pemrograman Berorientasi Objek", 80),
    new Mahasiswa("Shinta", "SI 2", "Pemrograman Berorientasi Objek", 75),
    new Mahasiswa("Ineu", "SI 2", "Pemrograman Berorientasi Objek", 55)
];

foreach ($dataMahasiswa as $mhs) {
    $mhs->tampilkanData();
}

?>