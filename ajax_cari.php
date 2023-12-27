<table class="tableku">
	<tr>
		<th width="1%">No</th>
		<th>Nama</th>
		<th>Alamat</th>
		<th>Pegawai</th>
	</tr>
	<tr>
		<?php 
		include 'koneksi.php';
		$cari = $_POST['cari'];
		$no = 1;
		$pegawai = mysqli_query($koneksi,"select * from pegawai where (pegawai_nama like '%$cari%') or (pegawai_alamat like '%$cari%') or pegawai_hp like '%$cari%'");
		while($p = mysqli_fetch_array($pegawai)){
			?>
			<tr>
				<td><?php echo $no++ ?></td>
				<td><?php echo $p['pegawai_nama'] ?></td>
				<td><?php echo $p['pegawai_alamat'] ?></td>
				<td><?php echo $p['pegawai_hp'] ?></td>
			</tr>
			<?php
		}
		?>
	</tr>
</table>