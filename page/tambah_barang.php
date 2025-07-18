<div class="row">
    <h2>Tambah Barang</h2>
    <div class="col-lg-4">
        <form action="" method="post" class="form">
            <div class="form-group">
                <label>Nama Barang</label>
                <input type="text" name="nama_barang" class="form-control" placeholder="Masukkan nama barang...">
            </div>

            <div class="form-group">
                <label>Stok</label>
                <input type="number" name="stok" class="form-control">
            </div>
            <div class="form-group">
                <label>Harga</label>
                <input type="number" name="harga" class="form-control">
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
                $sql = "INSERT INTO barang (nama_barang, harga, stok) VALUES ('$nama_barang', '$harga', '$stok')";
                $query =  mysqli_query($koneksi, $sql);
                if($query){
                    echo "<script>alert('Berhasil Menambahkan Barang!'); window.location.href='?p=list_barang';</script>";
                } else {
                    echo "<script>alert('Gagal Menambahkan Barang!');</script>";
                }
            }
        ?>
    </div>
</div>