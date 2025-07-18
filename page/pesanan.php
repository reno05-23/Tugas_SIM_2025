<?php 
    date_default_timezone_set('Asia/Jakarta');
    $sql = "SELECT max(id_pelanggan) as maxKode FROM pelanggan";
    $query = mysqli_query($koneksi, $sql);

    $data = mysqli_fetch_array($query);
    $id_pelanggan = $data['maxKode'];

    if ($id_pelanggan) {
        $noUrut = (int) substr($id_pelanggan, 3, 3);
    } else {
        $noUrut = 0;
    }
    $noUrut++;
    $char = "PLG";

    $kode_pelanggan = $char . sprintf("%03s", $noUrut);

?>


<div class="row">
    <div class="col-lg-3 ">
        <div class="panel panel-primary">
            <div class="panel-heading">Form Pesanan</div>
            <div class="panel-body">
                <form action="" method="post">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>ID Pelanggan</label>
                            <input type="text" name="id_pelanggan" class="form-control" readonly="readonly" value="<?= $kode_pelanggan ?>">
                        </div>
                        <div class="form-group">
                            <label>Nama Pelanggan</label>
                            <input type="text" name="nama_pelanggan" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Jenis Kelamin</label>
                            <select name="jenis_kelamin" class="form-control">
                                <option value="">-Jenis Kelamin-</option>
                                <option value="L">-Laki-Laki-</option>
                                <option value="P">-Perempuan-</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>No Telepon</label>
                            <input type="number" name="no_hp" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Alamat</label>
                            <textarea name="alamat" class="form-control"></textarea>
                        </div>
                    </div>


                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Barang</label>
                            <select name="id_barang" class="form-control">
                                <option value="">- Pilih Barang -</option>
                                <?php 
                                    $sql_barang = "SELECT * FROM barang";
                                    $query_barang = mysqli_query($koneksi, $sql_barang);
                                    while($barang = mysqli_fetch_array($query_barang)) {
                                        ?>  
                                            <option value="<?= $barang['id_barang'] ?>"><?= $barang['nama_barang'] ?></option>
                                        <?php
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Jumlah</label>
                            <input type="number" name="jumlah" class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="submit" name="simpan" class="btn btn-md btn-primary" value="Simpan">
                        </div>
                    </div>
                </form>
                <?php 
                    if(isset($_POST['simpan'])){
                        $id_pelanggan = $_POST['id_pelanggan'];
                        $nama_pelanggan = $_POST['nama_pelanggan'];
                        $jenis_kelamin = $_POST['jenis_kelamin'];
                        $no_hp = $_POST['no_hp'];
                        $alamat = $_POST['alamat'];
                        $id_barang = $_POST['id_barang'];
                        $jumlah = $_POST['jumlah'];

                        $sql_pelanggan = "INSERT INTO pelanggan SET id_pelanggan = '$id_pelanggan', 
                            nama_pelanggan = '$nama_pelanggan', 
                            jenis_kelamin = '$jenis_kelamin', 
                            no_hp = '$no_hp', 
                            alamat = '$alamat'";
                        $query_input = mysqli_query($koneksi, $sql_pelanggan);
                        if($query_input){
                            $sql_pesanan = "INSERT INTO pesanan SET id_barang='$id_barang', 
                                id_pelanggan = '$id_pelanggan', 
                                jumlah = '$jumlah', 
                                id_user = '$id_user',
                                status = '0',
                                tanggal_pesanan = NOW()";
                            $query_pesan = mysqli_query($koneksi, $sql_pesanan);
                            if($query_pesan){
                                echo "<script>alert('Berhasil menyimpan data pelanggan!');</script>";
                                echo "<script>window.location.href='?p=pesanan';</script>";
                        }else {
                            echo "<script>alert('Gagal menyimpan data pelanggan!');</script>";
                        }

                        
                    }
                }
                ?>
            </div>
        </div>
    </div>

    <div class="col-lg-7">
        <div class="panel panel-primary">
            <div class="panel-heading">
                Daftar Pesanan Hari Ini
            </div>
            <div class="panel-body">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Pelanggan</th>
                            <th>Menu</th>
                            <th>Jumlah</th>
                            <th>Status</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $hari_ini = date('Y-m-d');
                            $d_pesanan = "SELECT * FROM pesanan LEFT JOIN pelanggan on pelanggan.id_pelanggan = pesanan.id_pelanggan
                                LEFT JOIN barang on barang.id_barang = pesanan.id_barang WHERE date(tanggal_pesanan) = '$hari_ini'";
                            $d_query = mysqli_query($koneksi, $d_pesanan);
                            $cek = mysqli_num_rows($d_query);
                            if($cek > 0){
                                $no = 1;
                                while($data_d = mysqli_fetch_array($d_query)){
                                    ?>  
                                        <tr>
                                            <td class="text-center"> <?= $no++ ?> </td>
                                            <td> <?= $data_d['nama_pelanggan'] ?> </td>
                                            <td> <?= $data_d['nama_barang'] ?> </td>
                                            <td class="text-center"> <?= $data_d['jumlah'] ?> </td>
                                            <td>
                                                <?php 
                                                    if($data_d['status'] == '0'){
                                                        echo "<label class='label label-danger'>Belum</label>";
                                                    }elseif($data_d['status'] == '1'){
                                                        echo "<label class='label label-warning'>Selesai</label>";
                                                    }else {
                                                        echo "<label class='label label-success'>Lunas</label>";
                                                    }
                                                ?>
                                            </td>
                                            <td>
                                            <?php if($data_d['status'] == '0') { ?>
                                                <a onclick="return confirm('Yakin?')" href="page/tandai.php?id_pesanan=<?= $data_d['id_pesanan'] ?>" class="btn btn-primary btn-sm">Tandai</a>
                                            <?php } ?>
                                            </td>
                                        </tr>
                                    <?php
                                }

                            }else {
                                ?>  
                                    <tr>
                                        <td colspan="6" class="text-center">Tidak ada data pesanan</td>
                                    </tr>
                                <?php
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>