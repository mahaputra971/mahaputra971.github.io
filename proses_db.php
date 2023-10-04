<?php
    //Awal Execution DB
    $awal_db = microtime(true);

    $servername = "localhost";
    $database = "dbTest";
    $username = "root";
    $password = "";
    
    // membuat koneksi
    $conn = mysqli_connect($servername, $username, $password, $database);
    // mengecek koneksi
    if (!$conn) {
        die("Koneksi gagal: " . mysqli_connect_error());
    }
    // echo "Koneksi Database berhasil\n";

    // Mengeksekusi stored procedure
    $sql = "CALL perhitungan_kuadrat(?, @hasil)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $angka);
    $stmt->execute();

    // Mengambil hasil dari stored procedure
    $selectResult = $conn->query('SELECT @hasil as hasil');
    $row = $selectResult->fetch_assoc();
    $hasilKuadrat = $row['hasil'];

    echo "Hasil akar kuadrat dari $angka adalah: $hasilKuadrat";

    mysqli_close($conn);

    //Akhir excution DB
    $akhir_db = microtime(true);
    $lama = $akhir_db - $awal_db;
    echo "\nLama eksekusi script DB adalah: ".$lama." microsecond\n\n";

?>