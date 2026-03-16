<?php

class BangunRuang {
    public $hasil = [];

    public function hitung($jenis, $sisi, $jariJari, $tinggi) {
        $volume = 0;

        if ($jenis == "Bola") {
            $volume = (4/3) * 3.14159265359 * pow($jariJari, 3);
        } 
        else if ($jenis == "Kerucut") {
            $volume = (1/3) * 3.14159265359 * pow($jariJari, 2) * $tinggi;
        } 
        else if ($jenis == "Limas Segi Empat") {
            $volume = (1/3) * ($sisi * $sisi) * $tinggi;
        } 
        else if ($jenis == "Kubus") {
            $volume = pow($sisi, 3);
        } 
        else if ($jenis == "Tabung") {
            $volume = 3.14159265359 * pow($jariJari, 2) * $tinggi;
        }

        $this->hasil[] = [
            'nama' => $jenis,
            'sisi' => $sisi,
            'r'    => $jariJari,
            't'    => $tinggi,
            'vol'  => $volume
        ];
    }
}

$kalkulator = new BangunRuang();

$kalkulator->hitung("Bola", 0, 7, 0);
$kalkulator->hitung("Kerucut", 0, 14, 10);
$kalkulator->hitung("Limas Segi Empat", 8, 0, 24);
$kalkulator->hitung("Kubus", 30, 0, 0);
$kalkulator->hitung("Tabung", 0, 7, 10);

?>

<!DOCTYPE html>
<html>
<head>
    <title>Tugas PHP Bangun Ruang</title>
    <style>
        table { width: 100%; border-collapse: collapse; font-family: Arial, sans-serif; }
        th { background-color: #0000FF; color: white; padding: 10px; border: 1px solid #ddd; }
        td { padding: 8px; border: 1px solid #ddd; text-align: left; }
    </style>
</head>
<body>

    <table>
        <thead>
            <tr>
                <th>Jenis Bangun Ruang</th>
                <th>Sisi</th>
                <th>Jari-jari</th>
                <th>Tinggi</th>
                <th>Volume</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            foreach ($kalkulator->hasil as $data) : 
            ?>
                <tr>
                    <td><?= $data['nama']; ?></td>
                    <td><?= $data['sisi']; ?></td>
                    <td><?= $data['r']; ?></td>
                    <td><?= $data['t']; ?></td>
                    <td><?= $data['vol']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</body>
</html>