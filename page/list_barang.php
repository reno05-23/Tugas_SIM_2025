<?php  
    include "../koneksi.php";
?>

<h2>Data Barang</h2>
<br>

<a class="btn btn-primary btn-md" href="?p=tambah_barang"><span class="glyphicon glyphicon-plus"></span></a>

<div style="float: right;">
    <form method="get" class="form-inline">
        <input type="hidden" name="p" value="list_barang">
        <input type="text" name="cari" class="form-control" placeholder="Cari Barang...">
        <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-search"></span></button>
    </form>
</div>




<br>
<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Barang</th>
            <th>Harga</th>
            <th>Stok</th>
            <th>Tanggal Ditambahkan</th>
            <th>Tanggal Diubah</th>
            <th>Opsi</th>
        </tr>
    </thead>
    <tbody>
        <?php
        @$cari = $_GET['cari'];
        $q_cari = "";
        if (!empty($cari)) {
            $q_cari = " and nama_barang like '%" . $cari . "%'";
        }

        $pembagian = 5; // Jumlah data per halaman
        $page = isset($_GET['page']) ? (int) $_GET['page'] : 1; // Halaman yang diminta
        $mulai = $page > 1 ? $page * $pembagian - $pembagian : 0; // Hitung offset
        
        $sql = "SELECT * FROM barang WHERE 1=1 $q_cari LIMIT $mulai,$pembagian";
        // Pastikan koneksi database sudah di-include atau didefinisikan sebelumnya
        // Contoh: include '../koneksi.php';
        // atau
        // $koneksi = mysqli_connect('localhost', 'username', 'password', 'database');
        
        $query = mysqli_query($koneksi, $sql);
        $cek = mysqli_num_rows($query);
        // untuk mencari total data
        $sql_total = "SELECT * FROM barang";
        $q_total = mysqli_query($koneksi, $sql_total);
        $total = mysqli_num_rows($q_total); // Hitung total data
        $jumlahhalaman = ceil($total / $pembagian); // Hitung jumlah halaman
        if ($cek > 0) {
            $no = $mulai + 1; // Inisialisasi nomor urut
            while ($data = mysqli_fetch_array($query)) {
                ?>
                <tr>
                    <td class="text-center"> <?= $no++ ?></td>
                    <td class="text-justify"> <?= $data['nama_barang'] ?></td>
                    <td class="text-center"> <?= rupiah($data['harga']) ?></td>
                    <td class="text-center"> <?= $data['stok'] ?></td>
                    <td class="text-center"> <?= $data['created_at'] ?></td>
                    <td class="text-center"> <?= $data['update_at'] ?></td>
                    <td>
                        <a onclick="return confirm('Yakin Mau Mengahapus Data Barang?')" class="btn btn-danger btn-sm"
                            href="page/hapus_barang.php?idbarang=<?= $data['id_barang'] ?>"><span
                                class="glyphicon glyphicon-trash"></span></a>
                        <a class="btn btn-info btn-sm" href="?p=edit_barang&idbarang=<?= $data['id_barang'] ?>"><span
                                class="glyphicon glyphicon-edit"></span></a>
                    </td>
                </tr>
                <?php
            }
        } else {
            ?>
            <tr>
                <td colspan="6" class="text-center">
                    Tidak Ada Data Barang!
                </td>
            </tr>
            <?php
        }
        ?>
        <!-- <tr>
            <td>1</td>
            <td>Oli Enduro Racing</td>
            <td>Rp. 90.000,00</td>
            <td>01-06-2025</td>
            <td>04-06-2025</td>
           
        </tr> -->
    </tbody>
</table>
<div class="float-left">
    Jumlah : <?= $total ?> Data Barang
</div>
<div style="float: right;" class="">
    <nav aria-label="Page navigation">
        <ul class="pagination">
            <li>
                <a href="?p=list_barang&page=<?= $page -1 ?>" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                </a>
            </li>
            <?php
            for ($i = 1; $i <= $jumlahhalaman; $i++) {
                ?>
                <li class="<?= ($i == (isset($_GET['page']) ? $_GET['page'] : 1) ? 'active' : '') ?>"><a href="?p=list_barang&page=<?= $i ?>"> <?= $i ?> </a></li>

                <?php
            }
            ?>


            <!-- <li><a href="#">1</a></li>
            <li><a href="#">2</a></li>
            <li><a href="#">3</a></li>
            <li><a href="#">4</a></li>
            <li><a href="#">5</a></li> -->

            <li>
            <a href="?p=list_barang&page=<?= $page +1 ?>" aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
            </a>
            </li>
        </ul>
    </nav>

</div>