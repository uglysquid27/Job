<?php
include'koneksi.php';
$tgl=date('Y-m-d');
session_start();
if(isset($_SESSION['sesi'])){
?>
<!doctype html>
<html>
<head>
	
	<title>Klinik Dr Arif</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body >
	<div id="container">
		<div id="header">
			<div id="logo-perpustakaan-container">
				<image id="logo-perpustakaan" src="image/doc.png" border=0 style="border:0; text-decoration:none; outline:none"> 
			</div>
			<div id="nama-alamat-perpustakaan-container">
				<div class="nama-alamat-perpustakaan">
					<h1> Dr. Arif Junaedi </h1>
				</div>
				<div class="nama-alamat-perpustakaan">
					<h4>Perum Istana Bedali Agung Blok Y8 No.1, Kec. Lawang, Malang, Jawa Timur, Telp: (0341)420957</h4>
				</div>
			</div>
		</div>
		<div id="header2">
			<div id="nama-user">Hai <?php echo$_SESSION['sesi']; ?>!</div>
		</div>
		<div id="sidebar">
			<a href="index.php?p=beranda">Beranda</a>
			<p class="label-navigasi">| Data Master</p>
			<ul>
				<li><a href="index.php?p=anggota">Data Pasien</a></li>
				<!-- <li><a href="index.php?=bulanIni">Penghasilan</a></li> -->
				<!-- <li><a href="index.php?p=obat">Data Obat</a></li> -->
			</ul>
			<p class="label-navigasi">| Data Rekap</p>
			<ul>
				<li><a href="index.php?p=sekarang">Pengunjung</a></li>
				<li><a href="index.php?p=hariIni">Hari ini</a></li>
				<li><a href="index.php?p=rekapTanggal">Rekap Tanggal</a></li>
			</ul>
			<p class="label-navigasi" style="color: white;">|</p>
			<a href="logout.php" class="logout">Logout</a>
		</div>
		<div id="content-container">
			    <div class="container">
		<div class="row"><br/><br/><br/>
			<div class="col-md-10 col-md-offset-1" style="background-image:url('../asanoer-background.jpg')">
				<div class="col-md-4 col-md-offset-4">
					<div class="panel panel-warning login-panel" style="background-color:rgba(255, 255, 255, 0.6);position:relative;">
						
						<div class="panel-footer">
							
						</div>
					</div>
				</div>
			</div>
		</div>
    </div>
		<?php
			$pages_dir='pages';
			if(!empty($_GET['p'])){
				$pages=scandir($pages_dir,0);
				unset($pages[0],$pages[1]);
				$p=$_GET['p'];
				if(in_array($p.'.php',$pages)){
					include($pages_dir.'/'.$p.'.php');
				}else{
					echo'Halaman Tidak Ditemukan';
				}
			}else{
				include($pages_dir.'/beranda.php');
			}
		?>
		</div>
		<div id="footer"></div>
	</div>
</body>
</html>
<?php
}
else {
	echo "<script>
		alert('Anda Harus Login Dahulu!');
	</script>";
	header('location:login.php');
}
?>