<?php
require 'koneksi.php'; // ini untuk menghubungkan file koneksi.php yang berisi kode untuk menghubungkan ke database MySQL
$username = $_POST["username"]; // Mengambil nilai username dari form pendaftaran
$password = $_POST["password"]; // Mengambil nilai password dari form pendaftaran

$query_sql = "INSERT INTO user (username, password) 
            VALUES ('$username', '$password')"; // Query SQL untuk memasukkan data akun baru ke dalam tabel akun

if (mysqli_query($conn, $query_sql)) { // Eksekusi query SQL dan jika berhasil, maka akan mengarahkan pengguna ke halaman index.html
    header("Location: login.php"); // Jika berhasil, pengguna diarahkan ke halaman index.html dan malakukan login
} else {
    echo "Pendaftaran gagal: " . mysqli_error($conn); // Jika gagal, tampilkan pesan kesalahan
}


?>