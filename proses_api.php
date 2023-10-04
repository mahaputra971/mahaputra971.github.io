<?php 
     //Awal Execution API
     $awal_api = microtime(true);

     // Data yang akan dikirim sebagai permintaan ke API
     $data = array('bilangan' => $angka); // Ganti dengan bilangan yang ingin dihitung kuadratnya
 
     // URL tempat Flask app berjalan
     $apiUrl = 'http://localhost:5000/kuadrat'; // Sesuaikan dengan URL Flask app Anda
 
     // Menginisialisasi cURL session
     $ch = curl_init($apiUrl);
 
     // Mengatur opsi cURL untuk mengirim data JSON dalam permintaan POST
     curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
     curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
     curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
     curl_setopt($ch, CURLOPT_HTTPHEADER, array(
         'Content-Type: application/json',
         'Content-Length: ' . strlen(json_encode($data))
     ));
 
     // Melakukan permintaan ke API Flask
     $response = curl_exec($ch);
 
     // Memeriksa apakah permintaan berhasil
     if ($response === FALSE) {
         die('Gagal mengakses API.');
     }
     else{
        //  echo "Berhasil mengakses API\n";
     }
 
     // Menguraikan respons JSON dari API
     $hasilKuadrat = json_decode($response);
     
     // Menampilkan hasil perhitungan kuadrat
     if (isset($hasilKuadrat->hasil_kuadrat)) {
         echo "Hasil akar kuadrat dari " . $data['bilangan'] . " adalah: " . $hasilKuadrat->hasil_kuadrat;
     } else {
         echo "Permintaan gagal. Error: " . $hasilKuadrat->error;
     }
     
     // menyimpan nilai
     $hasilKuadrat = $hasilKuadrat->hasil_kuadrat;

     // Menutup session cURL
     curl_close($ch);
 
     //Akhir excution API
     $akhir_api = microtime(true);
     $lama = $akhir_api - $awal_api;
     echo "\nLama eksekusi script API adalah: ".$lama." microsecond\n\n";
?>