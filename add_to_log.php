<?php 
    $conn = mysqli_connect("localhost", "root", "", "dbTest");
    global $conn;

    date_default_timezone_set('Asia/Jakarta');
    $date = date('y-m-d H:i:s');
    $query = "INSERT INTO log
				VALUES
			  ('', '$tipe', '$angka', '$hasilKuadrat', '$lama','$date')
			";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);

    
?>