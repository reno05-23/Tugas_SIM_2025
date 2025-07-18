# 📚 Tugas_SIM — Sistem Informasi Manajemen Aplikasi Sibo

**Tugas_SIM** adalah aplikas SIBO yang dimana aplikasi ini untuk membantu suatu toko bengkel yang menjual semua sprepart kendaraan roda 2. Aplikasi ini dikembangkan menggunakan **PHP Native**, **MySQL**, serta didukung oleh tampilan modern menggunakan **Bootstrap 5**.

> 🚀 untuk melihat aplikasinya secara realtime atau online, https://renoaries.ftiunwaha.my.id/SIBO/
untuk username dan password agar bisa mengakses aplikasi ini adalah:
> username: admin
password: admin.

untuk menggunakan aplikasi langkah-langkahnya sebagai berikut :
1. akses https://renoaries.ftiunwaha.my.id/SIBO/
2. setelah itu akan otomatis masuk ke tampilan dashboard, namun aplikasi ini belum dapat diakses dikarenakan belum "LOGIN"
3. Klick tombol "masuk" yang ada pada menu sidebar paling bawah lalu login masukkan username dan password
4. username: admin
5. password: admin
6. selanjutnya akan otomatis diarahkan ke tampilan dashboard yang dimana suda terhubung dengan database secara realtime
7. jika ingin melihat data karyawan tinggal pilih menu "Manajemen Karyawan"
8. jika ingin melihat data barang ke menu "List Barang" disini bisa menambahkan barang baru dengan menekan icon "+" diatas list barang" bisa juga
   untuk mengedit barang maupun menghapus barang
9. selanjutnya jika ingin menambahkan pesanan baru tinggal pilih menu "Pesanan" di menu ini admin bisa menginputkan data pesanan baru
   selanjutnya akan ada opsi tandai yang dimana ini berarti jika pelanggan sudah dilayani maka bisa klick tombol "Tandai" untuk memasukkan data pesanan ke transaksi
10. ke menu transaksi admin dapat klick tombol "Proses" lalu admin akan menginputkan uang pelanggan dan akan otomatis menghitung jumlah bayar dengan uang pelanggan
   lalu akan muncul output kemnbalian uang pelanggan, dan opsi cetak struk
11. selanjutnya data pesanan yang sudah dilakukan transkasi oleh admin akan otomatis masuk ke dalam menu laporan, yang dimana menu laporan ini dapat memfilter setiap tanggal
    jika ingin melihat laporan tiap tanggalnya, tersedia juga fitur cetak pdf, dan laporan ini juga sudah otomatis akan masuk ke database dan akan berubah setiap harinya tergantung ada tidaknya penjualan pada hari itu
---

## 🧩 Fitur Utama

- ✅ Login & Logout pengguna
- ✅ Manajemen data (CRUD) untuk tugas dan pengguna
- ✅ Tampilan dashboard admin dan user
- ✅ Validasi input menggunakan PHP dan JavaScript
- ✅ Database relasional dengan MySQL
- ✅ UI responsive dengan Bootstrap 5

---

## 🛠️ Teknologi yang Digunakan

- **HTML5** & **CSS**
- **Bootstrap 5**
- **JavaScript**
- **PHP Native**
- **MySQL Database**

---


---

## 🖥️ Cara Menjalankan Aplikasi Secara Lokal

1. **Clone repo ini ke komputer lokal**:
   ```bash
   git clone https://github.com/reno05-23/TuGas_SIM.git
Pindahkan folder ke dalam htdocs/ (XAMPP) atau www/ (Laragon).

Jalankan MySQL dan Apache melalui XAMPP / Laragon.

Buat database dan import file SQL:

Masuk ke phpMyAdmin

Buat database baru, misalnya db_sistem_tugas

Import file renoarie_sibo.sql atau kasir(3).sql sama saja

Edit file koneksi database jika perlu:
// koneksi/koneksi.php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "db_sistem_tugas";
Akses aplikasi melalui browser:
http://localhost/TuGas_SIM/
🧑‍💻 Tentang Proyek Ini
Proyek ini dibuat untuk keperluan pembelajaran dan latihan manajemen tugas berbasis web. Dirancang sebagai tugas akhir dari salah satu mata kuliah Sistem Informasi Manajemen.

📜 Lisensi
Project ini bebas digunakan untuk kebutuhan belajar dan pengembangan pribadi. Tidak disarankan untuk digunakan langsung dalam lingkungan produksi tanpa penyesuaian keamanan.

Dibuat oleh @reno05-23 — dengan semangat belajar & ngoding 😄


