<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "kasir";

$conn = mysqli_connect($host, $username, $password, $database);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$nama = "";
$no_telepon = "";
$alamat = "";
$tgl_lahir = "";
$gaji = "";
$sukses = "";
$error = "";
// Jika tombol simpan ditekan

if (isset($_GET['op'])) {
    $op = $_GET['op'];
} else {
    $op = "";
}
// Jika tombol delete ditekan
if ($op == 'delete') {
    $id = $_GET['id'];
    $sql1 = "DELETE FROM montir WHERE id = '$id'";
    $q1 = mysqli_query($conn, $sql1);
    if ($q1) {
        $sukses = "Data berhasil dihapus";
    } else {
        $error = "Data gagal dihapus";
    }
}
// untuk edit data
// Jika tombol edit ditekan
if ($op == 'edit') {
    $id = $_GET['id'];
    $sql1 = "SELECT * FROM montir WHERE id = '$id'";
    $q1 = mysqli_query($conn, $sql1);
    $r1 = mysqli_fetch_array($q1);
    $nama = $r1['nama'];
    $no_telepon = $r1['no_telepon'];
    $alamat = $r1['alamat'];
    $tgl_lahir = $r1['tgl_lahir'];
    $gaji = $r1['gaji'];

    if ($nama == '') {
        $error = "Data tidak ditemukan";
    }
}

if (isset($_POST['simpan'])) {     //untuk CREATE
    $nama = $_POST['nama'];
    $no_telepon = $_POST['no_telepon'];
    $alamat = $_POST['alamat'];
    $tgl_lahir = $_POST['tgl_lahir'];
    $gaji = $_POST['gaji'];

    if ($nama && $no_telepon && $alamat && $tgl_lahir && $gaji) {
        if ($op == 'edit') {
            // Update data
            $sql1 = "UPDATE montir SET nama='$nama', no_telepon='$no_telepon', alamat='$alamat', tgl_lahir='$tgl_lahir', gaji='$gaji' WHERE id='$id'";
            $q1 = mysqli_query($conn, $sql1);
            if ($q1) {
                $sukses = "Data berhasil diupdate";
            } else {
                $error = "Data gagal diupdate";
            }
        } else {  //INSERT DATA BARU
            $sql1 = "INSERT INTO montir (nama, no_telepon, alamat, tgl_lahir, gaji) VALUES ('$nama', '$no_telepon', '$alamat', '$tgl_lahir', '$gaji')";
            $q1 = mysqli_query($conn, $sql1);
            if ($q1) {
                $sukses = "Data berhasil disimpan";
            } else {
                $error = "Data gagal disimpan";
            }
        }
    } else {
        $error = "Silahkan isi semua data";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Pelanggan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-..." crossorigin="anonymous">
    <style>
        body {
            background: #eee;
        }

        .mx-auto {
            width: 1000px;
        }

        .card {
            margin-top: 10px;
        }

        h1 {
            text-align: center;
            margin-top: 20px;
            margin-bottom: 20px;
            color: blue;
            text-shadow: #fff 2px 2px 4px;
        }
    </style>
</head>

<body>
    <div class="mx-auto">
        <!-- UNTUK MEMASUKKAN DATA -->
        <h1>Manajemen Karyawan</h1>
        <div class="card">

            <div class="card-header">
                Create atau Edit Data
            </div>
            <div class="card-body">
                <?php
                if ($error) {
                    ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $error ?>
                    </div>
                    <?php
                    header("refresh:2;url=index.php?p=karyawan"); //2 ini adalah 2 detik untuk refresh halaman
                }
                ?>
                <?php
                if ($sukses) {
                    ?>
                    <div class="alert alert-success" role="alert">
                        <?php echo $sukses ?>
                    </div>
                    <?php
                    header("refresh:2;url=index.php?p=karyawan"); //2 ini adalah 2 detik untuk refresh halaman
                }
                ?>
                <form action="" method="post">
                    <div class="mb-3 row">
                        <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $nama ?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="no_telepon" class="col-sm-2 col-form-label">No Telepon</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="no_telepon" name="no_telepon"
                                value="<?php echo $no_telepon ?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="alamat" name="alamat"
                                value="<?php echo $alamat ?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="tgl_lahir" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                        <div class="col-sm-10">
                            <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir"
                                value="<?php echo $tgl_lahir ?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="gaji" class="col-sm-2 col-form-label">Gaji</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="gaji" name="gaji" value="<?php echo $gaji ?>">
                        </div>
                    </div>
                    <div class="col-12">
                        <input type="submit" name="simpan" value="Simpan Data" class="btn btn-success">
                    </div>

                </form>
            </div>
        </div>
        <!-- UNTUK MENGELUARKAN DATA -->
        <div class="card">
            <div class="card-header text-white bg-secondary">
                Data Montir
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama</th>
                            <th scope="col">No.Telepon</th>
                            <th scope="col">Alamat</th>
                            <th scope="col">Tanggal Lahir</th>
                            <th scope="col">Gaji</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    <tbody>
                        <?php
                        $sql2 = "SELECT * FROM montir ";
                        $q2 = mysqli_query($conn, $sql2);
                        if (!$q2) {
                            die('Query Error: ' . mysqli_error($conn));
                        }
                        $urut = 1;
                        while ($r2 = mysqli_fetch_array($q2)) {
                            $id = $r2['id'];
                            $nama = $r2['nama'];
                            $no_telepon = $r2['no_telepon'];
                            $alamat = $r2['alamat'];
                            $tgl_lahir = $r2['tgl_lahir'];
                            $gaji = $r2['gaji'];

                            ?>
                            <tr>
                                <th scope="row"><?php echo $urut++ ?></th>
                                <td scope="row"><?php echo $nama ?></td>
                                <td scope="row"><?php echo $no_telepon ?></td>
                                <td scope="row"><?php echo $alamat ?></td>
                                <td scope="row"><?php echo $tgl_lahir ?></td>
                                <td scope="row"><?php echo $gaji ?></td>
                                <td scope="row">
                                    <a href="karyawan.php?op=edit&id=<?php echo $id ?>"><button type="button"
                                            class="btn btn-warning">Edit</button></a>
                                    <a href="karyawan.php?op=delete&id=<?php echo $id ?>"
                                        onclick="return confirm('Kamu yakin mau hapus datanya?')"><button type="button"
                                            class="btn btn-danger">Delete</button>
                                    </a>


                                </td>
                            </tr>
                            <?php
                        }

                        ?>
                    </tbody>
                    </thead>
                </table>

            </div>
        </div>
    </div>
    	<script src="script.js"></script>

</body>

</html>