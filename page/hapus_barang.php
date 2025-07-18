<?php 

    include "../koneksi.php";

    $idbarang = $_GET['idbarang'];
    // echo $idbarang;
    $sql = "DELETE FROM barang WHERE id_barang='$idbarang'";
    $query = mysqli_query($koneksi, $sql);
    if($query){
        echo "<script>alert('Berhasil Menghapus Barang!'); window.location.href='../index.php?p=list_barang';</script>";
    } else {
        echo "<script>alert('Gagal Menghapus Barang!'); window.location.href='../index.php?p=list_barang';</script>";
    }
?>