<?php  
    include "../config/koneksi.php";
    $id_pesanan = $_GET['id_pesanan'];
    if(empty($id_pesanan)){
        header('location : ../index.php?p=pesanan');
    }

    $sql = "UPDATE pesanan SET status='1' WHERE id_pesanan='$id_pesanan'";
    $query = mysqli_query($koneksi, $sql);
    if($query){
        ?>  
        <script>alert('Berhasil Mengubah Status!');</script>  
        <script type="text/javascript">
            window.location.href="../index.php?p=pesanan";
        </script>
        <?php
    }else{
        ?>  
        <script>alert('Gagal Mengubah Status!');</script>  
        <script type="text/javascript">
            window.location.href="../index.php?p=pesanan";
        </script>
        <?php
    }
?>