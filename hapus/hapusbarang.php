<?php
    include "../login/koneksi.php";
    if (isset($_GET['id'])) {
        $id    =$_GET['id'];
    }
    else{
        echo "Oops! No ID Selected";
    }
    
    if (!empty($id) && $id != "") {
        $hapus =mysqli_query($koneksi, "DELETE FROM buku WHERE id='$id'");
            ?>
                <script language="JavaScript">
                alert('Good! Delete data bolu berhasil ...');
                document.location='../Admin/buku.php';
                </script>
            <?php        
    }
?>