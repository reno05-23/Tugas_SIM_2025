<?php
date_default_timezone_set('Asia/Jakarta');
$hari_ini = date('Y-m-d');
?>


<div class="col-lg-8">
    <div class="panel panel-info">
        <div class="panel-heading">Data Transaksi</div>
        <div class="panel-body">
            <form action="" method="GET" class="form-inline">
                <input type="hidden" name="p" value="laporan">
                <div class="form-group">
                    <label>Tanggal Awal</label><br>
                    <input type="date" name="tglDari" class="form-control"
                        value="<?= !empty($_GET['tglDari']) ? $_GET['tglDari'] : $hari_ini ?>">
                </div>
                <div class="form-group">
                    <label>Tanggal Akhir</label><br>
                    <input type="date" name="tglAkhir" class="form-control"
                        value="<?= !empty($_GET['tglAkhir']) ? $_GET['tglAkhir'] : $hari_ini ?>">
                </div>
                <div class="form-group">
                    <br>
                    <input type="submit" name="cari" value="Filter" class="btn btn-sm btn-primary">
                    <a href="page/laporanpdf.php?tglDari=<?= !empty($_GET['tglDari']) ? $_GET['tglDari'] : $hari_ini ?>&tglAkhir=<?= !empty($_GET['tglAkhir']) ? $_GET['tglAkhir'] : $hari_ini ?>"
                        target="_blank" class="btn btn-sm btn-success">Cetak</a>
                </div>
            </form>
            <br>
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Barang</th>
                        <th>Jumlah</th>
                        <th>Tanggal</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                    $cari = "";
                    @$tglDari = $_GET['tglDari'];
                    @$tglAkhir = $_GET['tglAkhir'];
                    if (!empty($tglDari)) {
                        $cari .= "and date(transaksi.create_at) >= '" . $tglDari . "'";
                    }
                    if (!empty($tglAkhir)) {
                        $cari .= "and date(transaksi.create_at) <= '" . $tglAkhir . "'";
                    }
                    if (empty($tglDari) && empty(($tglAkhir))) {
                        $cari .= "and date(transaksi.create_at) >= '" . $hari_ini . "' and date(transaksi.create_at) >= '" . $hari_ini . "'";


                    }
                    $sql = "SELECT *, transaksi.create_at as tgl FROM transaksi 
                            LEFT JOIN pesanan ON pesanan.id_pesanan = transaksi.id_pesanan
                            LEFT JOIN pelanggan ON  pesanan.id_pelanggan = pelanggan.id_pelanggan
                            LEFT JOIN barang ON pesanan.id_barang = barang.id_barang WHERE 1=1 $cari";
                    // echo $sql; // Uncomment this line for debugging if needed
                    $query = mysqli_query($koneksi, $sql);
                    $cek = mysqli_num_rows($query);
                    if ($cek > 0) {
                        $no = 1;
                        while ($data = mysqli_fetch_array($query)) {
                            ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $data['nama_pelanggan'] ?></td>
                                <td><?= $data['nama_barang'] ?></td>
                                <td class="text-center"><?= $data['jumlah'] ?></td>
                                <td><?= $data['tgl'] ?></td>
                                <td><?= rupiah($data['total']) ?></td>
                            </tr>
                            <?php
                        }

                    } else {
                        ?>
                        <tr>
                            <td colspan="6" class="text-center">Tidak ada data transaksi</td>
                        </tr>

                        <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="col-lg-4">
    <div class="panel panel-success">
        <div class="panel-heading">Total Hari Ini</div>
        <div class="panel-body">
            <h2>
                <?php
                $total = "SELECT sum(total) as jumlah FROM transaksi WHERE date(create_at) = '" . $hari_ini . "' ";
                $q = mysqli_query($koneksi, $total);
                $data = mysqli_fetch_array($q);
                echo rupiah($data['jumlah']);
                ?>
            </h2>
        </div>
    </div>
    <div class="panel panel-success">
        <div class="panel-heading">Total 30 Hari Terakhir</div>
        <div class="panel-body">
            <h2>
                <?php
                $tgl_awal = mktime(0, 0, 0, date("m"), date("d") - 27, date("Y"));
                $tgl_awal = date('Y-m-d', $tgl_awal);
                $total = "SELECT sum(total) as jumlah FROM transaksi WHERE date(create_at)>='" . $tgl_awal . "' and date(create_at) <= '" . $hari_ini . "' ";
                $q = mysqli_query($koneksi, $total);
                $data = mysqli_fetch_array($q);
                echo rupiah($data['jumlah']);
                ?>
            </h2>
        </div>
    </div>
    <div class="panel panel-success">
        <div class="panel-heading">Total Selama ini</div>
        <div class="panel-body">
            <h2>
                <?php
                $total = "SELECT sum(total) as jumlah FROM transaksi";
                $q = mysqli_query($koneksi, $total);
                $data = mysqli_fetch_array($q);
                echo rupiah($data['jumlah']);
                ?>
            </h2>
        </div>
    </div>
</div>