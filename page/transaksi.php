<div class="col-lg-8 mx-auto float-none">
    <div class="panel panel-info">
        <div class="panel-heading"><b>Data Pesanan yang Belum Lunas</b></div>
        <div class="panel-body">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Pelanggan</th>
                        <th>Barang</th>
                        <th>Jumlah</th>
                        <th>Status</th>
                        <th>Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $d_pesanan = "SELECT * FROM pesanan LEFT JOIN pelanggan on pelanggan.id_pelanggan = pesanan.id_pelanggan
                                LEFT JOIN barang on barang.id_barang = pesanan.id_barang WHERE pesanan.status = '1'";
                    $d_query = mysqli_query($koneksi, $d_pesanan);
                    $cek = mysqli_num_rows($d_query);
                    if ($cek > 0) {
                        $no = 1;
                        while ($data_d = mysqli_fetch_array($d_query)) {
                            ?>
                            <tr>
                                <td class="text-center"> <?= $no++ ?> </td>
                                <td> <?= $data_d['nama_pelanggan'] ?> </td>
                                <td> <?= $data_d['nama_barang'] ?> </td>
                                <td class="text-center"> <?= $data_d['jumlah'] ?> </td>
                                <td>
                                    <?php
                                    if ($data_d['status'] == '0') {
                                        echo "<label class='label label-danger'>Belum</label>";
                                    } elseif ($data_d['status'] == '1') {
                                        echo "<label class='label label-warning'>Selesai</label>";
                                    } else {
                                        echo "<label class='label label-success'>Lunas</label>";
                                    }
                                    ?>
                                </td>
                                <td>
                                    <a
                                        href="?p=detail_transaksi&id_pesanan=<?= $data_d['id_pesanan'] ?>"
                                        class="btn btn-primary btn-sm">Proses
                                    </a>
                                </td>
                            </tr>
                            <?php
                        }

                    } else {
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