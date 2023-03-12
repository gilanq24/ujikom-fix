<?php 

session_start();


if (!isset($_SESSION['userweb'])) {
	header("Location:login/index.php");
}else{

	header("Location:Admin/home.php");

}

?>