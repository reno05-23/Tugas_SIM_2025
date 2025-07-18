<?php
$id_transaksi = $_GET['id_transaksi'];
include "../config/koneksi.php";
include "../config/fungsi.php";
$sql = "SELECT * FROM transaksi 
            LEFT JOIN pesanan ON pesanan.id_pesanan = transaksi.id_pesanan
            LEFT JOIN pelanggan ON  pesanan.id_pelanggan = pelanggan.id_pelanggan
            LEFT JOIN barang ON pesanan.id_barang = barang.id_barang
            WHERE id_transaksi = '$id_transaksi'";
$query = mysqli_query($koneksi, $sql);
$cek = mysqli_num_rows($query);
if ($cek > 0) {
    $data = mysqli_fetch_array($query);
} else {
    echo "<script>alert('Data tidak ditemukan!');</script>";
    echo "<script>window.location.href='?p=transaksi';</script>";
}
// print_r($data);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Struk SIBO</title>
    <style type="text/css">
        body {
            font-family: monospace;
        }
        .cetak {
            width: 40%;
            height: auto;
            border: 1px solid #000;
            padding: 20px;
        }
    </style>
</head>

<body style="margin: 0 auto;">
    <center>

        <div class="cetak">
            <h2 style="margin: 0;">SIBO KASIR</h2><br>
            <span>Jl. Raya No. 123, Kota</span><br>
            <?php date_default_timezone_set('Asia/Jakarta'); ?>
            <span> <?= date('d-m-Y') . ", " . date('H:i:s') ?> WIB</span><br>
        <table style="float: none;" width="100%" border="0" cellpadding="10" cellspacing="0">
            <tr>
                <td colspan="4">Nama : <?= $data['nama_pelanggan']?></td>
            </tr>
            <tr>
                <td  style="border-bottom: 1px solid #000;"><?= $data ['nama_barang']?></td>
                <td  style="border-bottom: 1px solid #000;"><?= rupiah($data ['harga'])?></td>
                <td  style="border-bottom: 1px solid #000;"><?= $data ['jumlah']?>x</td>
                <td style="border-bottom: 1px solid #000;"><?= rupiah($data ['total'])?></td>
            </tr>
            <tr>
                <td colspan="3">Uang Bayar</td>
                <td> <?= rupiah($data['bayar'])?></td>
            </tr>
            <tr>
                <td colspan="3">Uang Kembalian</td>
                <td> <?= rupiah($data['kembalian'])?></td>
            </tr>
            <tr>
                <td colspan="4" style="text-align: center; font-weight: bold;">Terima Kasih sudah berbelanja di toko kami...</td>
            </tr>
        </table>
        </div>

    </center>
    <script>
        window.print();
    </script>

</body>

</html>