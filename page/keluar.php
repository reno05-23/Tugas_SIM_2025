<?php 
    session_start();
    // Hapus semua session  
    session_destroy();
    ?>
    <script type="text/javascript">
        window.location.href = "../index.php?p=login";
    </script>

    <?php
?>