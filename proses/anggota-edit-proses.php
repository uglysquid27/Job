<?php
include'../koneksi.php';

$id_pasien=$_POST['id_pasien'];
$nm_pasien=$_POST['nm_pasien'];
$tgl_lahir=$_POST['tgl_lahir'];
$alamat=$_POST['alamat'];

If(isset($_POST['simpan'])){
	
	mysqli_query($db,
		"UPDATE tb_pasien
		SET nm_pasien='$nm_pasien', tgl_lahir='$tgl_lahir', alamat='$alamat'
		WHERE id_pasien='$id_pasien'"
	);
	header("location:../index.php?p=anggota");
}
?>
