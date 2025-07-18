<?php
// Add database connection
$koneksi = mysqli_connect("localhost", "root", "", "kasir");
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $sql = "SELECT * FROM user WHERE username = '$username'";
    $query = mysqli_query($koneksi, $sql);
    $cek = mysqli_num_rows($query);

    if ($cek > 0) {
        $data = mysqli_fetch_array($query);
        $password = md5($password);
    //    echo $password;
        $pass_db = $data['password'];
        if($password == $pass_db){
            $_SESSION['username'] = $username;
            $_SESSION['level'] = $data['level'];
            $_SESSION['id_user'] = $data['id_user'];
            ?>  
                <script type="text/javascript">
                    window.location.href="index.php";
                </script>
            <?php
        }else {
            echo "<script>alert('Password salah!');</script>";
        }


    } else {
        echo "<script>alert('Username atau Password salah!');</script>";
    }
}

?>

<!DOCTYPE html> 
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login SIBO</title>  <!--//ini untuk title judul di halaman atas web-->
     <link href="https://cdn.jsdelivr.net/npm/remixicon@4.5.0/fonts/remixicon.css" rel="stylesheet" />   <!--//ini untuk link icon -->
    <link rel="stylesheet" href="stylelogin.css" media="screen" title="no title" />  <!--//ini untuk link css -->
</head>

<body>
    <video autoplay muted loop id="bgvideo">  <!--//ini untuk video background yang akan digunakan di halaman login, id bgvideo ini digunakan untuk mengeditnya di css-->
        <source src="source/vidiologin.mp4" type="video/mp4">  <!--//ini untuk source video yang akan digunakan di halaman login, ganti namafilevideo.mp4 dengan nama file video yang ingin digunakan-->
    </video>
    <div class="input">
        <h1>LOGIN</h1>  <!--//ini untuk judul -->
        <h1 class="sibo">SIBO</h1> <!--//ini untuk judul SIBO -->
        <form action="login.php" method="POST">  <!--ini fungsinya form action untuk menautkan atau mengkonfigurasi file login.php agar terhubung dengan file ini yang dimana pada file login.php itu adalah file berisi script untuk connect ke database-->
            <div class="box-input">  <!--ini untuk class box-input yang akan digunakan mngeditnya di css-->
                <i class="ri-user-fill"></i>  <!--//ini untuk icon user yang akan digunakan di form input, icon ini didapatkan pada remixcon.com-->
                <input type="text" name="username" placeholder="username"> <!--//ini untuk inputan username, name ini digunakan untuk menghubungkan ke file login.php, dan placeholdernya untuk memberikan gambaran inputan ini itu harus diisi seperti apa-->
            </div>
            <div class="box-input">
                <i class="ri-lock-fill"></i>
                <input type="password" name="password" placeholder="password">
            </div>
            <a href="">  <!--ini untuk tautan ke halaman index.php, jika sudah login maka akan diarahkan ke halaman index.php-->
                <button type="submit" name="login" class="btn-input">Login</button> <!--//ini untuk button login, name ini digunakan untuk menghubungkan ke file login.php, dan class btn-input ini digunakan untuk mengeditnya di css-->
            </a>
            <div class="bottom"> <!--ini untuk class bottom yang akan digunakan mngeditnya di css-->
                <p>Belum Punya Akun? <!--//ini untuk teks yang akan ditampilkan di bawah form login-->
                    <a href="register.html">Register Disini</a> <!--//ini untuk tautan ke halaman register.html, jika belum punya akun maka akan diarahkan ke halaman register.html-->
                </p>
            </div>
        </form>
    </div>

</body>

</html>