<?php 
include "../login/koneksi.php";
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
      <li><a href="buku.php?menu=buku"><span class="navIcon"><i class="fa fa-book"></i></span>&nbsp;&nbsp;Buku</a></li>
      <li><a href="siswa.php?menu=siswa"><span class="navIcon"><i class="fa fa-user"></i></span>&nbsp;&nbsp;Siswa</a></li>
      <li><a href="pinjaman.php?menu=pinjaman"><span class="navIcon"><i class="fa fa-credit-card"></i></span>&nbsp;&nbsp;Pinjaman</a></li>
      <li><a href="laporan.php?menu=laporan"><span class="navIcon"><i class="fa fa-bar-chart-o"></i></span>&nbsp;&nbsp;Laporan</a></li>
      
  </ul>  
</div>
 <section></section>
 <br>
 <p align="center" style="margin-top:1px; margin-left: 1200px">Anda Login Sebagai {(Admin)} <button style="width: 60px;margin-left:10px;background-color:orangered ;height:25px"><a href="../login/index.php" style="font-size: 15px;color: white;">Logout</a></button></p>
	<h3 style="margin-left: 300px;margin-top: -140px;"></h3>	
	<b>
	<center style="margin-left: -432px;margin-top: 300px;">
	<?php 
	 if(isset($_POST['filter'])) {
	 	$tanggal1 = mysqli_real_escape_string($koneksi,$_POST['tanggal1']);
		$tanggal2 = mysqli_real_escape_string($koneksi,$_POST['tanggal2']);
		echo "Laporan Dari Tanggal ".$tanggal1." Sampai Tanggal ".$tanggal2." ";
	 }
	?>
	</center>
	</b>
	<table border="1" cellspacing="0" cellspacing="5" style="margin-left:300px;height: 50px; margin-top: 30px; "width= "1200" >
		<tr bgcolor="blue">
			<td align="center" style="height: 30px;background-color: royalblue;">Tgl Peminjaman</td>
			<td align="center" style="height: 30px;background-color: royalblue;">Nama Siswa</td>
			<td align="center" style="height: 30px;background-color: royalblue;">Judul Buku</td>

		</tr>
		<?php 
		$no = 1;
		if(isset($_POST['filter'])) {
				$tanggal1 = mysqli_real_escape_string($koneksi, $_POST['tanggal1']);
				$tanggal2 = mysqli_real_escape_string($koneksi, $_POST['tanggal2']);
				$query = mysqli_query($koneksi,"SELECT * FROM pinjaman WHERE tanggal between '$tanggal1' and '$tanggal2'ORDER BY kode ASC");				

		}else{
				$query = mysqli_query($koneksi,"SELECT * FROM pinjaman");
		}
		$total=0;
		while ($r=$tampil = mysqli_fetch_array($query)) {
      
		?>
		<tr>
			
			<td align="center" bgcolor="white"><?= $tampil['tanggal']; ?></td>
			<td align="center" bgcolor="white"><?= $tampil['nama_siswa']; ?></td>
			<td align="center" bgcolor="white"><?= $tampil['judul_buku']; ?></td>
		</tr>
		<?php } ?>
		<tr>
      <?php  
      include "../login/koneksi.php";

      $data_barang = mysqli_query($koneksi,"SELECT * FROM pinjaman");
      $jumlah_barang = mysqli_num_rows($data_barang);


      ?>
			<td colspan="2" align="center" style="height: 30px;">Grand Total</td>
      <td  align="center" > <?php echo $jumlah_barang . " Expl";  ?></td>
			
		</tr>
	</table>
	<p>
		<br>
<button style="background-color: royalblue; margin-left:300px;width: 100px;height: 25px;"><a href="laporan.php" style="color:white;">Kembali</button>
</p>


</body>
</html>