<?php
    include "../login/koneksi.php";
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
    }
    else {
        die ("Error. ID Selected! ");    
    }
    $query    =mysqli_query($koneksi, "SELECT * FROM tb_kategori WHERE id='$id'");
    $data    =mysqli_fetch_array($query);
    $notnama_kategori    =$data['nama_kategori'];
    
    if (isset($_POST['ubah'])){
    $nama_kategori =$_POST['nama_kategori'];
    
    $ceknama_kategori    =mysqli_num_rows (mysqli_query($koneksi, "SELECT nama_kategori FROM tb_kategori WHERE nama_kategori='$_POST[nama_kategori]' AND nama_kategori!='$nama_kategori'"));
    
    if($ceknama_kategori > 0) {
    ?>
        <script language="JavaScript">
            alert('Oops! Duplikat kode ...');
            document.location='../Admin/kategori_buku.php?id_siswa=<?=$nama_kategori?>';
        </script>
        }
    <?php
    }
    else{
        $update =mysqli_query($koneksi, "UPDATE tb_kategori SET nama_kategori='$nama_kategori'WHERE id='$id'");
        ?>
            <script language="JavaScript">
            alert('Good! Edit kategori <?=$notnama_kategori?> Berhasil ...');
            document.location='../Admin/kategori_buku.php';
            </script>
        <?php
    }
}         
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN"
        crossorigin="anonymous">
  <title></title>
</head>
<body>
<style>
    *{
  padding: 0;
  margin: 0;
  list-style: none;
  text-decoration: none;

}
body {
  font-family: 'Roboto', sans-serif;
  background-color: #DFCDC3;
}
.sidebar {
  position: fixed;
  left: 0px;
  width: 250px;
  height: 100%;
  background: #1A1A1A;
  transition: all .5s ease;
}
.sidebar header {
  font-size: 19px;
  color: white;
  line-height: 40px;
  font-weight: bolder;
  text-align: center;
  background: #1A1A1A;
  user-select: none;
  margin-top: -30px;
}
.sidebar header p{
  font-size: 20px;
  color: black;
  line-height: 70px;
  text-align: center;
  background: #1A1A1A;
  user-select: none;
  display: block;
  height: 100%;
  width: 100%;
  line-height: 65px;
  font-size: 15px;
  color: white;
  padding-left: 10px;
  box-sizing: border-box;
  border-bottom: 1px solid black;
  border-top: 1px solid black;


  }
.sidebar ul a{
  display: block;
  height: 100%;
  width: 100%;
  line-height: 65px;
  font-size: 15px;
  color: white;
  padding-left: 10px;
  box-sizing: border-box;
  border-bottom: 1px solid black;
  transition: .4s;
}
ul li:hover a{
  padding-left: 50px;
  color: ;
  background-color: #719192;
}
.sidebar ul a i{
  margin-right: 10px;
 }
 #check{
  display: none;
}

tr {
  background-color: royalblue;
  height: 40px
}
tbody tr td{
  height: 50px;
  background-color: white;
}
  </style>
    <div class="sidebar">
      <br>
      <br>
    <header>SISTEM PERPUSTAKAAN SMK BINA PUTRA&nbsp;
      <img src="../image/arya.jpg" style="width:80px;height:80px;margin-top: 10px;">
     <p>Menu Admin</p>
    </header>
  <ul>
      <li><a href="../Admin/home.php?menu=home"><span class="navIcon"><i class="fa fa-home"></i></span>&nbsp;&nbsp;Home</a></li>
      <li><a href="../Adminkategori_buku.php?menu=kategori_buku"><span class="navIcon"><i class="fa fa-archive"></i></span>&nbsp;&nbsp;Kategori Buku</a></li>
      <li><a href="../Admin/buku.php?menu=buku"><span class="navIcon"><i class="fa fa-book"></i></span>&nbsp;&nbsp;Buku</a></li>
      <li><a href="../Admin/siswa.php?menu=siswa"><span class="navIcon"><i class="fa fa-user"></i></span>&nbsp;&nbsp;Siswa</a></li>
      <li><a href="../Admin/pinjaman.php?menu=pinjaman"><span class="navIcon"><i class="fa fa-credit-card"></i></span>&nbsp;&nbsp;Pinjaman</a></li>
      <li><a href="../Admin/laporan.php?menu=laporan"><span class="navIcon"><i class="fa fa-bar-chart-o"></i></span>&nbsp;&nbsp;Laporan</a></li>
      
  </ul>
</div>
 <section></section>
 <br>
 <p align="center" style="margin-top:1px; margin-left: 1200px">Anda Login Sebagai {(Admin)} <button style="width: 60px;margin-left:10px;background-color:orangered ;height:25px"><a href="../login/index.php" style="font-size: 15px;color: white;">Logout</a></button></p>
    <h3 style="margin-left: 300px;margin-top: 175px;">Edit Kategori</h3>
    <br>
    <div class="panel panel-primary" style="margin-left:300px;">
<div class="panel-heading">
</div>
<div class="panel-body">
   
                            <div class="row">
                                <div class="col-md-12">
                                    <form method="POST">
                                        <div class="form-group">
                                            <label>kode Kategori</label><input value="<?php echo $data ['kode'] ?>" readonly style="margin-left:54px;margin-top: -15px;width:300px ;">
                                        </div>
                                        <br>
                                        <div class="form-group">
                                            <label>Nama Kategori
                                            <input  type="text" name="nama_kategori" list="nama_kategori" style="width: 300px;margin-left: 41px;height: 20px;" />
                                            
                                        </label>

                                        </div>
                                        <br>
                                    <input type="submit" name="ubah" value="Simpan" class="btn btn-primary"style="margin-left:152px;width: 100px;height: 25px;">
                                    <button style="background-color: royalblue; margin-left:99px;height: 25px;width: 100px;"><a href="../Admin/kategori_buku.php" style="color:white;">Batal</button>
                                </div>
                            </div>

                        </form>
                        </div>
</div>
</div>
</div>


</body>
</html>

