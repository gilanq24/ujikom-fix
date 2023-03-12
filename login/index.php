<?php 
    session_start();
    include "koneksi.php";
 ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Sistem Perpustakaan</title>
</head>
<body bgcolor="DFCDC3">
    <form method="post">
        <center>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <div style="background-color:#719192 ; border: 3px solid #000000; height: 200px; margin: 10px 0px;padding: 100px; text-align: left; width: 400px;">
        <img src="../image/arya.jpg" style="width:100px;height:100px; margin-left: 150px; margin-top: -100px;">
        <h2 align="center">LOGIN SISTEM PERPUSTAKAAN</h2>
        <br>
        <label>User code:</label>
        <input type="text" name="fusername" style="width:300px;"><br>
        <br>
        <label>Password:</label>
        <input type="password" name="fpassword" style="width:300px;margin-left: 3px;"><br>
        <br>
        <button type="submit" name="fmasuk" style="margin-left: 71px; width: 100px;">Login</button>

    </div>
    </form>
</center>
    <center> 
    <?php 
        if (isset($_POST['fmasuk'])) {
            $username = $_POST['fusername'];
            $password = $_POST['fpassword'];
            $qry = mysqli_query($koneksi,"SELECT * FROM tb_user WHERE username = '$username' AND password = md5('$password')");
            $cek = mysqli_num_rows($qry);
            if ($cek==1) {
                $_SESSION['userweb']=$username;
                header("location:../Admin/home.php");
                exit;
            }
            else {
                echo "Maaf Username Atau Password Salah";
            }
        }
     ?>
    
    </center>
</body>
</html>