                  <?php
    include "../login/koneksi.php";
    if (isset($_POST['ubah'])){
    $kode    =$_POST['kode'];
    $nis =$_POST['nis'];
    $nama_siswa   =$_POST['nama_siswa'];
    $kode_buku   =$_POST['kode_buku'];
    $judul_buku  =$_POST['judul_buku'];
    $tanggal    =$_POST['tanggal'];
    $waktu    =$_POST['waktu']

        $insert =mysqli_query($koneksi, "INSERT INTO peminjaman (kode,nis,nama_siswa,kode_buku,judul_buku,tanggal,waktu) VALUES ('$kode','$nis','$nama_siswa','$kode_buku','$judul_buku','$tanggal','$waktu')");
    

        ?>
            <script language="JavaScript">
            alert('Good! Input Data Peminjaman Berhasil ...');
            document.location='pinjaman.php';
            </script>
        
        <?php
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
      <li><a href="home.php?menu=home"><span class="navIcon"><i class="fa fa-home"></i></span>&nbsp;&nbsp;Home</a></li>
      <li><a href="kategori_buku.php?menu=kategori_buku"><span class="navIcon"><i class="fa fa-archive"></i></span>&nbsp;&nbsp;Kategori Buku</a></li>
      <li><a href="buku.php?menu=buku"><sp an class="navIcon"><i class="fa fa-book"></i></span>&nbsp;&nbsp;Buku</a></li>
      <li><a href="siswa.php?menu=siswa"><span class="navIcon"><i class="fa fa-user"></i></span>&nbsp;&nbsp;Siswa</a></li>
      <li><a href="pinjaman.php?menu=pinjaman"><span class="navIcon"><i class="fa fa-credit-card"></i></span>&nbsp;&nbsp;Pinjaman</a></li>
      <li><a href="laporan.php?menu=laporan"><span class="navIcon"><i class="fa fa-bar-chart-o"></i></span>&nbsp;&nbsp;Laporan</a></li>
      
  </ul>  
</div>
 <section></section>
 <br>
 <p align="center" style="margin-top:1px; margin-left: 1200px">Anda Login Sebagai {(Admin)} <button style="width: 60px;margin-left:10px;background-color:orangered ;height:25px"><a href="../login/index.php" style="font-size: 15px;color: white;">Logout</a></button></p>
  <h3 style="margin-left: 300px;margin-top:10px;font-size: 2em;">Master Penjualan</h3>
  <br>
  <?php

  include "../login/koneksi.php";

  $query = mysqli_query($koneksi, "SELECT max(kode) as kodeTerbesar FROM pinjaman");
  $data = mysqli_fetch_array($query);
  $kodeBarang = $data['kodeTerbesar'];
  $urutan = (int) substr($kodeBarang, 5, 5);
  $urutan++;
  $huruf = "T-";
  $kodeBarang = $huruf . sprintf("%05s", $urutan);
  echo $kodeBarang;
  ?>  
  <form method="POST" style="margin-left:300px;">
    <br>
    <label>Kode Barang</label>
    <input type="text" name="kode"  required="required" value="<?php echo $kodeBarang ?>" readonly style="margin-left:65px;" >
    <br>
    <br>
    <label>NIS </label>  
                     <?php   
                          include "../login/koneksi.php";  
                      ?>  
                     <select name="nis" id="nis"  class="form-control" onchange='changeValue(this.value)' required style="margin-left:132px;width: 165px;">
                     <option value="">Pilih/Ketik NIS</option> 
                          <?php   
                          $query = mysqli_query($koneksi, "SELECT * from siswa order by nis ASC");  
                          $result = mysqli_query($koneksi, "SELECT * from siswa");  
                          $a       = "var nama_siswa = new Array();\n;";  
                          while ($data = mysqli_fetch_array($result)) {  
                               echo '<option name="nis" value="'.$data['nis'] . '">' . $data['nis'] . '</option>';   
                          $a .= "nama_siswa['" . $data['nis'] . "'] = {nama_siswa:'" . addslashes($data['nama_siswa'])."'};\n";  
                            
                          }  
                          ?>  
                     </select>  
                
                <br>
                <br> 
                 
                     <label>Nama Siswa </label>  
                   <input type="text" name="nama_siswa" value="--AUTO FILL--" id="nama_siswa" readonly style="margin-left:68px;">  
                  
                
                <script type="text/javascript">   
                          <?php   
                          echo $a ;  ?>  
                          function changeValue(id){  
                            document.getElementById('nama_siswa').value = nama_siswa[id].nama_siswa;  
                              
                          }  
                          </script>
                          <br>
                          <br>
                          <label>Kode Buku </label> 
                           
                     <?php   
                          include "../login/koneksi.php";  
                      ?>  
                     <select name="kode_buku" id="kode" class="form-control" onchange='changeValues(this.value)' required style="margin-left:80px;width: 165px;">
                      <option value="">Pilih/Ketik Kode</option>  
                          <?php   
                          $query = mysqli_query($koneksi, "SELECT * from buku order by kode ASC");  
                          $result = mysqli_query($koneksi, "SELECT * from buku");  
                          $a          = "var judul_buku = new Array();\n;";  
                          while ($data = mysqli_fetch_array($result)) {  
                               echo '<option name="kode" value="'.$data['kode'] . '">' . $data['kode'] . '</option>';   
                          $a .= "judul_buku['" . $data['kode'] . "'] = {judul_buku:'" . addslashes($data['judul_buku'])."'};\n";  
                            
                          }  
                          ?>  
                     </select>  
                
                <br>
                <br> 
               
                     <label>Judul Buku </label>

                     <input type="text" name="judul_buku" value="--AUTO FILL--" id="judul_buku" readonly style="margin-left:79px;"> 
               
                
                <script type="text/javascript">   
                          <?php   
                          echo $a ;  ?>  
                          function changeValues(id){  
                            document.getElementById('judul_buku').value = judul_buku[id].judul_buku;  
                              
                          }  
                          </script>
                          <br>
                          <br>
                          <label>Waktu Peminjaman</label>
                          <input type="curent_timestamp" name="tanggal" value="<?php date_default_timezone_set('Asia/jakarta'); echo date('Y-m-d H:i:s'); ?>" readonly style="width: 160px;margin-left: 20px;" ><input type="curent_timestamp" name="waktu" <?php date_default_timezone_set('Asia/jakarta'); echo date('H:i:s'); ?> >
                          
                          <input type="submit" name="ubah" value="Simpan" class="btn btn-primary"style="margin-left:145px;width: 100px;height: 25px;">  
 
</body>
</html>