<?php
class Tabungan {
    protected $nama;
    private $saldo;

    public function __construct($nama, $saldo) {
        $this->nama = $nama;
        $this->saldo = $saldo;
    }

    public function getNama() {
        return $this->nama;
    }

    public function getSaldo() {
        return $this->saldo;
    }

    public function setor($uang) {
        $this->saldo += $uang;
    }

    public function tarik($uang) {
        if ($uang <= $this->saldo) {
            $this->saldo -= $uang;
        } else {
            echo "Saldo tidak cukup!\n";
        }
    }

    public function update($nama, $saldo) {
        $this->nama = $nama;
        $this->saldo = $saldo;
    }
}

// CLASS ANAK
class Siswa1 extends Tabungan {}
class Siswa2 extends Tabungan {}
class Siswa3 extends Tabungan {}

// ARRAY DATA
$data = [
    new Siswa1("Wildan 1", 500000),
    new Siswa2("Wildan 2", 300000),
    new Siswa3("Wildan 3", 700000)
];

// FOPEN
$file = fopen("data.txt", "a");

// PROGRAM
do {

    echo "\n=== TABUNGAN SEKOLAH ===\n";

    foreach ($data as $i => $siswa) {
        echo ($i+1).". ".$siswa->getNama().
        " | Saldo : ".$siswa->getSaldo()."\n";
    }

    echo "\n1.Tambah";
    echo "\n2.Update";
    echo "\n3.Hapus";
    echo "\n4.Setor";
    echo "\n5.Tarik";
    echo "\n6.Keluar";
    echo "\nPilih : ";

    $menu = trim(fgets(STDIN));

    switch($menu) {

        // TAMBAH
        case 1:
            echo "Nama : ";
            $nama = trim(fgets(STDIN));

            echo "Saldo : ";
            $saldo = trim(fgets(STDIN));

            $data[] = new Tabungan($nama, $saldo);

            fwrite($file, "Tambah $nama\n");
            break;

        // UPDATE
        case 2:
            echo "Nomor siswa : ";
            $no = trim(fgets(STDIN));

            echo "Nama baru : ";
            $nama = trim(fgets(STDIN));

            echo "Saldo baru : ";
            $saldo = trim(fgets(STDIN));

            $data[$no-1]->update($nama, $saldo);

            fwrite($file, "Update $nama\n");
            break;

        // HAPUS
        case 3:
            echo "Nomor siswa : ";
            $no = trim(fgets(STDIN));

            unset($data[$no-1]);

            $data = array_values($data);

            echo "Data dihapus\n";
            break;

        // SETOR
        case 4:
            echo "Nomor siswa : ";
            $no = trim(fgets(STDIN));

            echo "Jumlah setor : ";
            $uang = trim(fgets(STDIN));

            $data[$no-1]->setor($uang);

            break;

        // TARIK
        case 5:
            echo "Nomor siswa : ";
            $no = trim(fgets(STDIN));

            echo "Jumlah tarik : ";
            $uang = trim(fgets(STDIN));

            $data[$no-1]->tarik($uang);

            break;

        // KELUAR
        case 6:
            echo "Program selesai";
            break;

        default:
            echo "Menu salah!";
    }

} while($menu != 6);

fclose($file);

?>