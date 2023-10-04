<?php
$angka = 0;
$select_log = [];
require 'view_log.php';

if (isset($_POST["db"])) {
    $tipe = "Database (SP)";
    $inputAngka = $_POST["angka"];

    // Validasi apakah input adalah angka
    if (is_numeric($inputAngka)) {
        $angka = floatval($inputAngka);

        // Validasi apakah angka tersebut positif atau negatif
        if ($angka >= 0) {
            // Lakukan pemrosesan sesuai kebutuhan Anda
            require 'proses_db.php';
            require 'add_to_log.php';
        } else {
            echo "Angka harus positif.";
        }
    } else {
        echo "Input harus berupa angka.";
    }
} elseif (isset($_POST["api"])) {
    $tipe = "API Service (Flask)";
    $inputAngka = $_POST["angka"];

    // Validasi apakah input adalah angka
    if (is_numeric($inputAngka)) {
        $angka = floatval($inputAngka);

        // Validasi apakah angka tersebut positif atau negatif
        if ($angka >= 0) {
            // Lakukan pemrosesan sesuai kebutuhan Anda
            require 'proses_api.php';
            require 'add_to_log.php';
        } else {
            echo "Angka harus positif.";
        }
    } else {
        echo "Input harus berupa angka.";
    }
} elseif (isset($_POST["delete"])) {
    require 'remove_log.php';
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PPL - Perhitungan Akar</title>
</head>
<body>
    <h1>🧮Perhitungan Akar Kuadrat</h1>
    <form action="index.php" method="post">
        <label for="inputAngka">Masukkan Angka:</label>
        <input type="number" id="inputAngka" name="angka" required>
        <button type="submit" name="db">DB</button>
        <button type="submit" name="api">API</button>
    </form>

<h3 style="text-align:center">Riwayat Perhitungan</h3>
<table border="1" cellpadding="10" cellspacing="0">
	<tr>
		<th>No.</th>
		<th>Tipe</th>
		<th>Angka Input</th>
		<th>Angka Output</th>
		<th>Lama (microsecond)</th>
		<th>Waktu</th>
	</tr>

	<?php $i = 1; ?>
	<?php foreach( $select_log as $row ) : ?>
	<tr>
		<td><?= $i; ?></td>
		<td><?= $row["tipe"]; ?></td>
		<td><?= $row["angka_input"]; ?></td>
		<td><?= $row["angka_output"]; ?></td>
		<td><?= $row["lama"]; ?></td>
        <td><?= $row["waktu"]; ?></td>
	</tr>
	<?php $i++; ?>
	<?php endforeach; ?>
	
</table>

<form action="" method="post">
    <button type="submit" name="delete">DELETE RIWAYAT</button>
</form>

</body>
</html>