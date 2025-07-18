<?php

$sql_kode = "SELECT max(id_transaksi) as maxKode FROM transaksi";
$query_kode = mysqli_query($koneksi, $sql_kode);

$data_kode = mysqli_fetch_array($query_kode);
$id_transaksi = $data_kode['maxKode'];

if ($id_transaksi) {
    $noUrut = (int) substr($id_transaksi, 3, 3);
} else {
    $noUrut = 0;
}
$noUrut++;
$char = "TRX";

$kode_transaksi = $char . sprintf("%03s", $noUrut);



$id_pesanan = $_GET['id_pesanan'];
if (empty($id_pesanan)) {
    echo "<script>
        alert('ID Pesanan tidak ditemukan!');
        window.location.href = '?p=transaksi';
    </script>";
}
$d_pesanan = "SELECT * FROM pesanan LEFT JOIN pelanggan on pelanggan.id_pelanggan = pesanan.id_pelanggan
            LEFT JOIN barang on barang.id_barang = pesanan.id_barang WHERE id_pesanan = '$id_pesanan'";
$d_query = mysqli_query($koneksi, $d_pesanan);
$data = mysqli_fetch_array($d_query);

?>

<div class="col-lg-6 mx-auto float-none">
    <div class="panel panel-info">
        <div class="panel-heading">Input Pembayaran</div>
        <div class="panel-body">
            <div class="row">

                <form action="" method="post">
                    <input type="hidden" name="kode_transaksi" value="<?= $kode_transaksi ?>">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Nama Pelanggan</label>
                            <input type="text" name="nama_pelanggan" class="form-control"
                                value="<?= $data['nama_pelanggan'] ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label>Barang</label>
                            <input type="text" name="nama_barang" class="form-control"
                                value="<?= $data['nama_barang'] ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label>Harga</label>
                            <input type="text" name="" class="form-control" value="<?= $data['harga'] ?>" readonly>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Jumlah</label>
                            <input type="text" name="" class="form-control" value="<?= $data['jumlah'] ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label>Total Bayar</label>
                            <input type="text" name="total" class="form-control"
                                value="<?= $data['harga'] * $data['jumlah'] ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label>Uang Pelanggan</label>
                            <input type="number" <?= ($data['status'] == '2' ? 'readonly="readonly"' : '') ?> name="bayar"
                                class="form-control">
                        </div>
                        <input type="submit" <?= ($data['status'] == '2' ? 'disabled="disabled"' : '') ?> name="simpan"
                            value="Simpan" class="btn btn-sm btn-primary">
                    </div>
                </form>
            </div>
            <br>
            <div class="row">
                <?php

                //  echo $kode_transaksi;
                
                if (isset($_POST['simpan'])) {
                    $total = $_POST['total'];
                    $bayar = $_POST['bayar'];
                    $kode = $_POST['kode_transaksi'];
                    $id_barang = $data['id_barang'];
                    $jumlah = $data['jumlah'];

                    $cek_stok = mysqli_query($koneksi, "SELECT stok FROM barang WHERE id_barang='$id_barang'");
                    $stok_barang = mysqli_fetch_assoc($cek_stok)['stok'];
                    if ($stok_barang < $jumlah) {
                        echo "<script>
                         alert('Stok barang tidak cukup!');
                         window.location.href = '?p=detail_transaksi&id_pesanan=$id_pesanan';
                        </script>";
                        exit;
                    }
                    if ($bayar < $total) {
                        echo "<script>
                        alert('Uang Pelanggan tidak cukup!');
                        window.location.href = '?p=detail_transaksi&id_pesanan=$id_pesanan';
                    </script>";
                    } else {
                        $kembalian = $bayar - $total;
                        $sql_insert = "INSERT INTO transaksi SET id_transaksi = '$kode', 
                        id_pesanan = '$id_pesanan', 
                        total = '$total', 
                        bayar = '$bayar',
                        kembalian = '$kembalian'";
                        $query_insert = mysqli_query($koneksi, $sql_insert);
                        if ($query_insert) {
                            $update_stok = "UPDATE barang SET stok = stok - $jumlah WHERE id_barang = '$id_barang'";
                            mysqli_query($koneksi, $update_stok);

                            $update = "UPDATE pesanan SET status = '2' WHERE id_pesanan = '$id_pesanan'";
                            $query_update = mysqli_query($koneksi, $update);
                            if ($query_update) {
                                ?>
                                <div class="col-lg-12">
                                    <p>Uang Kembalian : <?= rupiah($kembalian) ?></p>
                                    <span style="float: right;"><a target="_blank" href="page/struk.php?id_transaksi=<?= $kode ?>">Cetak
                                            Struk</a></span>
                                </div>
                                <?php

                            }
                        }
                    }
                }
                ?>
                <a href="?p=transaksi" class="btn btn-sm btn-default">Kembali</a>
            </div>
        </div>
    </div>
</div>