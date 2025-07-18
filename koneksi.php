<?php

$servername = "localhost";  // $servername adalah variabel yang menyimpan nama server database // biasanya localhost
$database = "kasir";   // $database adalah variabel yang menyimpan nama database yang akan digunakan 
$username = "root";  // $username adalah variabel yang menyimpan nama pengguna untuk mengakses database
$password = ""; // $password adalah variabel yang menyimpan kata sandi untuk mengakses database, dikarenakan ini adalah localhost, maka biasanya tidak ada password

$koneksi = mysqli_connect($servername, $username, $password, $database); // mysqli_connect() digunakan untuk membuat koneksi ke database MySQL dengan parameter server, username, password, dan nama database

if (!$koneksi) { // Mengecek apakah koneksi berhasil atau tidak
    die("Connection failed: " . mysqli_connect_error()); // Jika koneksi gagal, program akan berhenti dan menampilkan pesan kesalahan
}
// } else { // Jika koneksi berhasil, program akan melanjutkan
//     echo "Connected successfully"; // Menampilkan pesan bahwa koneksi berhasil
// }

// function rupiah($angka) {
//     if ($angka === null) {
//         $angka = 0;
//     }
//     $hasil = "Rp." . number_format($angka, 2, ',', '.');
//     return $hasil;
// }
?>


