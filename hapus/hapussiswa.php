<?php
    include "../login/koneksi.php";
    if (isset($_GET['id'])) {
        $id    =$_GET['id'];
    }
    else{
        echo "Oops! No ID Selected";
    }
    
    if (!empty($id) && $id != "") {
        $hapus =mysqli_query($koneksi, "DELETE FROM siswa WHERE id='$id'");
            ?>
                <script language="JavaScript">
                alert('Good! Delete data pelanggan berhasil ...');
                document.location='../Admin/siswa.php';
                </script>
            <?php        
    }
?>