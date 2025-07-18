<?php
require_once __DIR__ . '/../vendor/autoload.php'; // path ke autoload composer
include '../config/koneksi.php'; // sesuaikan path koneksi

$hari_ini = date('Y-m-d');
$tglDari = isset($_GET['tglDari']) ? $_GET['tglDari'] : $hari_ini;
$tglAkhir = isset($_GET['tglAkhir']) ? $_GET['tglAkhir'] : $hari_ini;

$cari = "";
if (!empty($tglDari)) {
    $cari .= "and date(transaksi.create_at) >= '".$tglDari."'";
}
if (!empty($tglAkhir)) {
    $cari .= "and date(transaksi.create_at) <= '".$tglAkhir."'";
}
if (empty($tglDari) && empty($tglAkhir)) {
    $cari .= "and date(transaksi.create_at) >= '".$hari_ini."' and date(transaksi.create_at) >= '".$hari_ini."'";
}

$sql = "SELECT *, transaksi.create_at as tgl FROM transaksi 
        LEFT JOIN pesanan ON pesanan.id_pesanan = transaksi.id_pesanan
        LEFT JOIN pelanggan ON  pesanan.id_pelanggan = pelanggan.id_pelanggan
        LEFT JOIN barang ON pesanan.id_barang = barang.id_barang WHERE 1=1 $cari";
$query = mysqli_query($koneksi, $sql);

$html = '
<h2 style="text-align:center;">Laporan Data Transaksi</h2>
<p>Periode: '.$tglDari.' s/d '.$tglAkhir.'</p>
<table border="1" cellpadding="5" cellspacing="0" width="100%">
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
    <tbody>';
$no = 1;
$total_semua = 0;
if(mysqli_num_rows($query) > 0){
    while($data = mysqli_fetch_array($query)){
        $html .= '<tr>
            <td>'.$no++.'</td>
            <td>'.$data['nama_pelanggan'].'</td>
            <td>'.$data['nama_barang'].'</td>
            <td align="center">'.$data['jumlah'].'</td>
            <td>'.$data['tgl'].'</td>
            <td>Rp. '.number_format($data['total'], 0, ',', '.').'</td>
        </tr>';
        $total_semua += $data['total'];
    }
    $html .= '<tr>
        <td colspan="5" align="right"><b>Total</b></td>
        <td><b>Rp. '.number_format($total_semua, 0, ',', '.').'</b></td>
    </tr>';
} else {
    $html .= '<tr>
        <td colspan="6" align="center">Tidak ada data transaksi</td>
    </tr>';
}
$html .= '</tbody></table>';

// Buat PDF
$mpdf = new \Mpdf\Mpdf(['format' => 'A4']);
$mpdf->WriteHTML($html);
$mpdf->Output('Laporan-Transaksi.pdf', 'I');