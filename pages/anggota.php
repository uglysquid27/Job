<div id="label-page"><h3>Tampil Data Pasien</h3></div>
<div id="content">
	
	<p id="tombol-tambah-container"><a href="index.php?p=anggota-input" class="tombol">Tambah Data</a>
	<!-- <a target="_blank" href="pages/cetak.php"><img src="print.png" height="50px" height="50px"></a> -->
	<FORM CLASS="form-inline" METHOD="POST">
	<div align="right">
		<form method=post>
			<input type="text" name="pencarian">
			<input type="submit" name="search" value="search" class="tombol">
		</form>
	</FORM>
	</p>
	<table id="tabel-tampil">
		<tr>
			<!-- <th id="label-tampil-no">No</td> -->
			<th>No reg</th>
			<th>Nama</th>
			<th>Tangal Lahir</th>
			<th>Alamat</th>
			<th id="label-opsi">Opsi</th>
		</tr>
		

		
		<?php
		$batas = 20;
		extract($_GET);
		if(empty($hal)){
			$posisi = 0;
			$hal = 1;
			$nomor = 1;
		}
		else {
			$posisi = ($hal - 1) * $batas;
			$nomor = $posisi+1;
		}	
		if($_SERVER['REQUEST_METHOD'] == "POST"){
			$pencarian = trim(mysqli_real_escape_string($db, $_POST['pencarian']));
			if($pencarian != ""){
				$sql = "SELECT * FROM tb_pasien WHERE nm_pasien LIKE '%$pencarian%'
						OR id_pasien LIKE '%$pencarian%'
						OR alamat LIKE '%$pencarian%'";
				
				$query = $sql;
				$queryJml = $sql;	
						
			}
			else {
				$query = "SELECT * FROM tb_pasien ORDER BY id_pasien DESC LIMIT $posisi, $batas";
				$queryJml = "SELECT * FROM tb_pasien";
				$no = $posisi * 1;
			}			
		}
		else {
			$query = "SELECT * FROM tb_pasien ORDER BY id_pasien DESC LIMIT $posisi, $batas";
			$queryJml = "SELECT * FROM tb_pasien";
			$no = $posisi * 1;
		}
		
		//$sql="SELECT * FROM tbanggota ORDER BY idanggota DESC";
		$q_tampil_anggota = mysqli_query($db, $query);
		if(mysqli_num_rows($q_tampil_anggota)>0)
		{
		while($r_tampil_anggota=mysqli_fetch_array($q_tampil_anggota)){
			if(empty($r_tampil_anggota['foto'])or($r_tampil_anggota['foto']=='-'))
				$foto = "admin-no-photo.jpg";
			else
				$foto = $r_tampil_anggota['foto'];
		?>
		<tr>
			<!-- <td><?php echo $nomor; ?></td> -->
			<td width=70px height=70px><?php echo $r_tampil_anggota['id_pasien']; ?></td>
			<td width=140px><?php echo $r_tampil_anggota['nm_pasien']; ?></td>
			<td width=140px><?php echo $r_tampil_anggota['tgl_lahir']; ?></td>
			<td width=140px><?php echo $r_tampil_anggota['alamat']; ?></td>
			<td>
				<div class="tombol-opsi-container"><a href="index.php?p=anggota-edit&id=<?php echo $r_tampil_anggota['id_pasien'];?>" class="tombol">Lihat</a></div>
				<div class="tombol-opsi-container"><a href="proses/anggota-hapus.php?id=<?php echo $r_tampil_anggota['id_pasien']; ?>" onclick = "return confirm ('Apakah Anda Yakin Akan Menghapus Data Ini?')" class="tombol">Hapus</a></div>
				<div class="tombol-opsi-container"><a href="index.php?p=hasil-periksa&id=<?php echo $r_tampil_anggota['id_pasien'];?>" class="tombol">Hasil</a></div>
				<div class="tombol-opsi-container"><a href="index.php?p=sekarang-antri-input&id=<?php echo $r_tampil_anggota['id_pasien'];?>" class="tombol">Antri</a></div>
			</td>
		</tr>		
		<?php $nomor++; } 
		}
		else {
			echo "<tr><td colspan=6>Data Tidak Ditemukan</td></tr>";
		}?>		
	</table>
	<?php
	if(isset($_POST['pencarian'])){
	if($_POST['pencarian']!=''){
		echo "<div style=\"float:left;\">";
		$jml = mysqli_num_rows(mysqli_query($db, $queryJml));
		echo "Data Hasil Pencarian: <b>$jml</b>";
		echo "</div>";
	}
	}
	else{ ?>
		<div style="float: left;">		
		<?php
			$jml = mysqli_num_rows(mysqli_query($db, $queryJml));
			echo "Jumlah Data : <b>$jml</b>";
		?>			
		</div>		
		<div class="pagination">		
				<?php
				$jml_hal = ceil($jml/$batas);
				for($i=1; $i<=$jml_hal; $i++){
					if($i != $hal){
						echo "<a href=\"?p=anggota&hal=$i\">$i</a>";
					}
					else {
						echo "<a class=\"active\">$i</a>";
					}
				}
				?>
		</div>
	<?php
	}
	?>
</div>