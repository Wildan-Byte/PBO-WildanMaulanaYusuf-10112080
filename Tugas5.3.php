<?php
$diskon = 0;
$total = 0;

if(isset($_POST['hitung'])){

    $kartu = $_POST['kartu'];
    $belanja = $_POST['belanja'];

    switch($kartu){

        case "ya":
            if($belanja > 500000){
                $diskon = 50000;
            }
            elseif($belanja > 100000){
                $diskon = 15000;
            }
            else{
                $diskon = 0;
            }
        break;

        case "tidak":
            if($belanja > 100000){
                $diskon = 5000;
            }
            else{
                $diskon = 0;
            }
        break;
    }

    $total = $belanja - $diskon;
}
?>

<html>
<head>
<title>Program Diskon Belanja</title>
</head>

<body>

<h2>Program Diskon Belanja</h2>

<form method="POST">

Apakah Memiliki Kartu Member?
<br>
<select name="kartu">
<option value="ya">Ya</option>
<option value="tidak">Tidak</option>
</select>

<br><br>

Total Belanja :
<br>
<input type="number" name="belanja">

<br><br>

<input type="submit" name="hitung" value="Hitung">

</form>

<br>

<?php
if(isset($_POST['hitung'])){
    echo "Total Belanja : Rp $belanja <br>";
    echo "Diskon : Rp $diskon <br>";
    echo "Total Bayar : Rp $total";
}
?>

</body>
</html>