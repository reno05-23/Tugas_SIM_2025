<?php
function rupiah($angka) {
    if ($angka === null) {
        $angka = 0;
    }
    $hasil = "Rp." . number_format($angka, 2, ',', '.');
    return $hasil;
}
?>