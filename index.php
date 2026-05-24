<!DOCTYPE html>
<html>
<head>
    <title>Membuat CRUD Dengan PHP Dan MySQL - Menampilkan data dari database</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="header-wrapper">
        <div class="judul">
            <h1>Membuat CRUD Dengan PHP Dan MySQL</h1>
            <h2>Menampilkan data dari database</h2>
        </div>

        <div class="menu">
            <ul>
                <li><a href="index.php">Home</a></li>
                <li>
                    <a href="#">Data Master</a>
                    <ul>
                        <li><a href="#">Data User</a></li>
                        <li><a href="#">Data Barang</a></li>
                        <li><a href="#">Data Customer</a></li>
                        <li><a href="#">Data Supplier</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#">Data Transaksi</a>
                    <ul>
                        <li><a href="#">Transaksi Pembelian</a></li>
                        <li><a href="#">Transaksi Penjualan</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#">Laporan</a>
                    <ul>
                        <li><a href="#">Laporan Data Barang</a></li>
                        <li><a href="#">Laporan Data Customer</a></li>
                        <li><a href="#">Laporan Data Supplier</a></li>
                        <li><a href="#">Laporan Transaksi Pembelian</a></li>
                        <li><a href="#">Laporan Transaksi Penjualan</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>

    <div class="container">
        <br/>

        <?php 
        if(isset($_GET['pesan'])){
            $pesan = $_GET['pesan'];
            if($pesan == "input"){
                echo "Data berhasil di input.";
            }else if($pesan == "update"){
                echo "Data berhasil di update.";
            }else if($pesan == "hapus"){
                echo "Data berhasil di hapus.";
            }
        }
        ?>
        <br/>
        <a class="tombol" href="input.php">+ Tambah Data Baru</a>

        <h3>Data user</h3>
        <table border="1" class="table">
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Pekerjaan</th>
                <th>Opsi</th>
            </tr>
            <?php 
            include "koneksi.php";

            // NOMOR 3: Implementasi Exception Handling pada query
            try {
                $query_mysql = mysqli_query($koneksi, "SELECT * FROM user");
                
                if (!$query_mysql) {
                    throw new Exception("Query Gagal: " . mysqli_error($koneksi));
                }

                $nomor = 1;
                while($data = mysqli_fetch_array($query_mysql)){
                ?>
                <tr>
                    <td><?php echo $nomor++; ?></td>
                    <td><?php echo $data['nama']; ?></td>
                    <td><?php echo $data['alamat']; ?></td>
                    <td><?php echo $data['pekerjaan']; ?></td>
                    <td>
                        <a class="edit" href="edit.php?id=<?php echo $data['id']; ?>">Edit</a> |
                        <a class="hapus" href="hapus.php?id=<?php echo $data['id']; ?>">Hapus</a>
                    </td>
                </tr>
                <?php 
                } 
            } catch (Exception $e) {
                // Menampilkan pesan jika terjadi error tanpa merusak tabel
                echo "<tr><td colspan='5' style='color:red; text-align:center;'>Terjadi kesalahan: " . $e->getMessage() . "</td></tr>";
            }
            ?>
        </table>
    </div>
</body>
</html>