<?php
include "Orang.php";
include "visibility.php";
include "Nilai.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Praktikum 2</title>
</head>
<body>
    <h1>Praktikum 2</h1>
    <div>
        <?php
        $Reno = new Orang();
        $Reno->nama = "M. Reno Novriansyah";

        $Reno->ucapsalam();

        echo"<br>";

        $Novi = new Orang();
        $Novi->nama = "Noviana Safitri";
        $Novi->ucapsalam();

        echo "<br>";

        $Visibility = new Visibility();
        $Visibility->tampilkanproperty();

        echo "Ini Akses Diluar Kelas <br>";
        echo "Public : " . $Visibility->public . '<br>';
        //echo "protected : " . $Visibility->protected . '<br>';
        //echo "private : " . $Visibility->private . '<br>';

        echo '<br> <br>';
        
        echo "Nilai Pemrograman Web: <br>";
        $nilai = new Nilai();
        $nilai->settugas(79);
        $nilai->setuts(90);
        $nilai->settugas(89);

        echo "Nilai UTS : " . $nilai->getuts() . "<br";
        echo "Nilai UAS : " . $nilai->getuas() . "<br";
        echo "Nilai Tugas : " . $nilai->gettugas() . "<br";
        echo "Total Nilai : " . $nilai->hitungtotal() . "<br";

        ?>
    </div>
</body>
</html>