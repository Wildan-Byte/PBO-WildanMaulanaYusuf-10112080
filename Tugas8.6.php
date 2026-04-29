<?php

class Karyawan {
    public $nama;
    public $golongan;
    public $jamLembur;
    public $totalGaji;
    
    public function __construct($nama, $golongan, $jamLembur) {
        $this->nama = $nama;
        $this->golongan = $golongan;
        $this->jamLembur = $jamLembur;
        $this->totalGaji = $this->hitungTotalGaji();
    }

    public function getGajiPokok($gol) {
        $daftarGaji = [
            "Ib" => 1250000, "Ic" => 1300000, "Id" => 1350000,
            "IIa" => 2000000, "IIb" => 2100000, "IIc" => 2200000, "IId" => 2300000,
            "IIIa" => 2400000, "IIIb" => 2500000, "IIIc" => 2600000, "IIId" => 2700000,
            "IVa" => 2800000, "IVb" => 2900000, "IVc" => 3000000, "IVd" => 3100000
        ];
        return isset($daftarGaji[$gol]) ? $daftarGaji[$gol] : 0;
    }

    public function hitungTotalGaji() {
        $gajiPokok = $this->getGajiPokok($this->golongan);
        $biayaLembur = $this->jamLembur * 15000;
        return $gajiPokok + $biayaLembur;
    }

    public function __destruct() {
    }
}

$daftarKaryawan = [
    new Karyawan("Winny", "IIb", 30),
    new Karyawan("Stendy", "IIIc", 32),
    new Karyawan("Alfred", "IVb", 30)
];

while (true) {
    echo "\n====== MENU GAJI KARYAWAN ======\n";
    echo "1. Tampilkan Data\n";
    echo "2. Tambah Data\n";
    echo "3. Update Data\n";
    echo "4. Hapus Data\n";
    echo "5. Keluar\n";
    echo "Pilih menu: ";
    
    $menu = trim(fgets(STDIN));

    if ($menu == "1") {
        // READ
        echo "\n====== DATA GAJI KARYAWAN ======\n";
        echo "No | Nama | Golongan | Jam Lembur | Total Gaji\n";
        foreach ($daftarKaryawan as $key => $k) {
            echo ($key+1) . " | " . $k->nama . " | " . $k->golongan . " | " . $k->jamLembur . " | Rp" . number_format($k->totalGaji, 0, ',', '.') . "\n";
        }
    } 
    elseif ($menu == "2") {
        // CREATE
        echo "Nama: "; $nama = trim(fgets(STDIN));
        echo "Golongan: "; $gol = trim(fgets(STDIN));
        echo "Jam Lembur: "; $lembur = trim(fgets(STDIN));
        $daftarKaryawan[] = new Karyawan($nama, $gol, (int)$lembur);
        echo "Data berhasil ditambahkan!\n";
    } 
    elseif ($menu == "3") {
        // UPDATE
        echo "Masukkan nomor urut yang akan diupdate: ";
        $no = (int)trim(fgets(STDIN)) - 1;
        if (isset($daftarKaryawan[$no])) {
            echo "Nama Baru: "; $nama = trim(fgets(STDIN));
            echo "Golongan Baru: "; $gol = trim(fgets(STDIN));
            echo "Jam Lembur Baru: "; $lembur = trim(fgets(STDIN));
            $daftarKaryawan[$no] = new Karyawan($nama, $gol, (int)$lembur);
            echo "Data berhasil diupdate!\n";
        }
    } 
    elseif ($menu == "4") {
        // DELETE
        echo "Masukkan nomor urut yang akan dihapus: ";
        $no = (int)trim(fgets(STDIN)) - 1;
        if (isset($daftarKaryawan[$no])) {
            unset($daftarKaryawan[$no]); // Memicu __destruct
            $daftarKaryawan = array_values($daftarKaryawan); // Reset index array
            echo "Data berhasil dihapus!\n";
        }
    } 
    elseif ($menu == "5") {
        echo "Keluar program...\n";
        break;
    } 
    else {
        echo "Pilihan tidak valid!\n";
    }
}
?>