<?php
$hari_ini = date('Y-m-d');
?>
<div id="label-page"><h3>Input Data Antrian</h3></div>
<div id="content">
	<form action="proses/sekarang-input-proses.php" method="post" enctype="multipart/form-data">
	
	<table id="tabel-input">
		<tr>
			<td class="label-formulir">ID Pasien</td>
			<td class="isian-formulir"><input type="text" name="id_pasien" class="isian-formulir isian-formulir-border" required></td>
		</tr>
		<tr>
			<td class="label-formulir">Tanggal</td>
			<td class="isian-formulir"><input type="date" name="tanggal" class="isian-formulir isian-formulir-border" value = "<?php echo $hari_ini;?>" required></td>
		</tr>
		
		<tr>
			<td class="label-formulir"></td>
			<td class="isian-formulir"><input type="submit" name="simpan" value="Simpan" class="tombol"></td>
		</tr>
	</table>
	</form>
</div>