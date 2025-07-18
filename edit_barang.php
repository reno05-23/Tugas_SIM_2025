<?php 
    $idbarang = $_GET['idbarang'];
    if(empty($idbarang)) {
        echo "<script>alert('ID Barang tidak ditemukan!'); window.location.href='?p=list_barang';</script>";
    }

    $sql = "SELECT * FROM barang WHERE id_barang='$idbarang'";
    $query = mysqli_query($koneksi, $sql);
    $cek = mysqli_num_rows($query);
    if($cek > 0) {
        $data = mysqli_fetch_array($query);
    } else {
        $data = null;
        echo "<script>alert('Data Barang tidak ditemukan!'); window.location.href='?p=list_barang';</script>";
    }
?>


<div class="row">
    <div class="col-lg-4">
        <form action="" method="post" class="form">
            <div class="form-group">
                <label>Nama Barang</label>
                <input type="text" name="nama_barang" class="form-control" placeholder="Masukkan nama menu..." value="<?= $data['nama_barang'] ?>">
            </div>

            <div class="form-group">
                <label>Harga</label>
                <input type="number" name="harga" class="form-control" value="<?= $data['harga'] ?>">
            </div>

            <div class="form-group">
                <label>Stok</label>
                <input type="number" name="stok" class="form-control" value="<?= $data['stok'] ?>">
            </div>
            

            <div class="form-group">
                <input type="submit" class="btn btn-md btn-primary" name="simpan" value="Simpan">
                <a href="?p=list_barang" class="btn btn-md btn-default">Kembali</a>
            </div>
        </form>

        <?php 
            if(isset($_POST['simpan'])){
                $nama_barang = $_POST['nama_barang'];
                $harga = $_POST['harga'];
                $stok = $_POST['stok'];
                $sql = "UPDATE barang SET nama_barang='$nama_barang', harga='$harga', stok='$stok' WHERE id_barang='$idbarang'";
                $query =  mysqli_query($koneksi, $sql);
                if($query){
                    echo "<script>alert('Berhasil Mengubah Barang!'); window.location.href='?p=list_barang';</script>";
                } else {
                    echo "<script>alert('Gagal Mengubah Barang!');</script>";
                }
            }
        
        ?>
    </div>
</div>