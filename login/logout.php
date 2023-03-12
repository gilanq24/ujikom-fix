<?php 
	session_start();
	unset($_SESSION['userweb']);
	header("location:index.php");

	echo " <script>
                alert('Good! Delete kategori berhasil ...');
                document.location='../index.php';
 			</script>";

 ?>
