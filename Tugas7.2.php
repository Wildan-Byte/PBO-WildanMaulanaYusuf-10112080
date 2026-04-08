
<!DOCTYPE html>
<html lang="id">
<head>
    <title>Sistem Hitung Gaji Pegawai</title>
    <style>
        body { font-family: sans-serif; margin: 40px; background-color: #f4f4f4; }
        .container { background: white; padding: 20px; border-radius: 8px; box-shadow: 0 2px 5px rgba(0,0,0,0.1); max-width: 500px; }
        .result { margin-top: 20px; padding: 15px; background: #e7f3fe; border-left: 5px solid #2196F3; }
        input, select { width: 100%; padding: 10px; margin: 10px 0; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box; }
        button { background: #2196F3; color: white; padding: 10px 20px; border: none; border-radius: 4px; cursor: pointer; }
        button:hover { background: #0b7dda; }
    </style>
</head>
<body>

<div class="container">
    <h2>Form Hitung Gaji</h2>
    <form method="POST">
        <label>Nama Pegawai:</label>
        <input type="text" name="nama" required>

        <label>Jabatan:</label>
        <select name="jabatan" id="jabatan" onchange="togglePegawaiMingguan()" required>
            <option value="Programmer">Programmer</option>
            <option value="Direktur">Direktur</option>
            <option value="Pegawai Mingguan">Pegawai Mingguan</option>
        </select>

        <label>Gaji Pokok (Rp):</label>
        <input type="number" name="gaji_pokok" required>

        <label>Masa Kerja (Tahun):</label>
        <input type="number" name="masa_kerja" required>

        <div id="input_tambahan" style="display:none;">
            <hr>
            <label>Harga Barang (Rp):</label>
            <input type="number" name="harga_barang" value="0">
            <label>Target Stock:</label>
            <input type="number" name="stock_target" value="0">
            <label>Total Terjual:</label>
            <input type="number" name="total_penjualan" value="0">
        </div>

        <button type="submit" name="hitung">Hitung Total Gaji</button>
    </form>

    <?php

    class Employee {
        public $nama, $gaji_pokok, $masa_kerja;
        public function __construct($n, $g, $m) {
            $this->nama = $n; $this->gaji_pokok = $g; $this->masa_kerja = $m;
        }
    }

    class Programmer extends Employee {
        public function hitung() {
            $bonus = 0;
            if ($this->masa_kerja >= 1 && $this->masa_kerja <= 10) $bonus = 0.01 * $this->masa_kerja * $this->gaji_pokok;
            elseif ($this->masa_kerja > 10) $bonus = 0.02 * $this->masa_kerja * $this->gaji_pokok;
            return $this->gaji_pokok + $bonus;
        }
    }

    class Direktur extends Employee {
        public function hitung() {
            return $this->gaji_pokok + (0.5 * $this->masa_kerja * $this->gaji_pokok) + (0.1 * $this->masa_kerja * $this->gaji_pokok);
        }
    }

    class PegawaiMingguan extends Employee {
        public function hitung($harga, $target, $terjual) {
            $bonus_rate = ($terjual > (0.7 * $target)) ? 0.10 : 0.03;
            return $this->gaji_pokok + ($bonus_rate * $harga * $terjual);
        }
    }

    if (isset($_POST['hitung'])) {
        $nama = $_POST['nama'];
        $gaji = $_POST['gaji_pokok'];
        $masa = $_POST['masa_kerja'];
        $jabatan = $_POST['jabatan'];
        $total = 0;

        if ($jabatan == "Programmer") {
            $p = new Programmer($nama, $gaji, $masa);
            $total = $p->hitung();
        } elseif ($jabatan == "Direktur") {
            $d = new Direktur($nama, $gaji, $masa);
            $total = $d->hitung();
        } else {
            $pm = new PegawaiMingguan($nama, $gaji, $masa);
            $total = $pm->hitung($_POST['harga_barang'], $_POST['stock_target'], $_POST['total_penjualan']);
        }

        echo "<div class='result'>";
        echo "<strong>Hasil Perhitungan:</strong><br>";
        echo "Nama: $nama <br>";
        echo "Jabatan: $jabatan <br>";
        echo "Total Gaji: <strong>Rp " . number_format($total, 0, ',', '.') . "</strong>";
        echo "</div>";
    }
    ?>
</div>

<script>
    function togglePegawaiMingguan() {
        var jabatan = document.getElementById("jabatan").value;
        var inputTambahan = document.getElementById("input_tambahan");
        inputTambahan.style.display = (jabatan === "Pegawai Mingguan") ? "block" : "none";
    }
</script>

</body>
</html>