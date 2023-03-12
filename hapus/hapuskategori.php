<?php
    include "../login/koneksi.php";
    if (isset($_GET['id'])) {
        $id    =$_GET['id'];
    }
    else{
        echo "Oops! No ID Selected";
    }
    
    if (!empty($id) && $id != "") {
        $hapus =mysqli_query($koneksi, "DELETE FROM tb_kategori WHERE id='$id'");
            ?>
                <script language="JavaScript">
                alert('Good! Delete kategori berhasil ...');
                document.location='../Admin/kategori_buku.php';
                </script>
            <?php        
    }
?>