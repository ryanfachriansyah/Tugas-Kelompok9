<br />
<fieldset>
	<legend>Tambah Katalog</legend>
	<form action="" method="post" enctype="multipart/form-data">
		<table>
			<tr>
				<td>Id motor</td>
				<td>:</td>
				<td><input type ="text" name="id_motor" /></td>
			</tr>
			<tr>
				<td>Merk Motor</td>
				<td>:</td>
				<td><input type ="text" name="merk_motor" /></td>
			</tr>
			<tr>
				<td>Jenis Motor </td>
				<td>:</td> 
				<td>
				<select name="jenis_motor">
				<option name="sport">Sport</option>
				<option name="bebek">Bebek</option>
				<option name="of road">Of Road</option>
				<option name="atv">ATV</option>
				</select></td>
			</tr>
			<tr>
				<td>harga</td>
				<td>:</td>
				<td><input type ="number_format" name="harga" /></td>
			</tr>
			<tr>
				<td>Tahun Pembuatan</td>
				<td>:</td>
				<td><input type ="number_format" name="thn_pembuatan" /></td>
			</tr>
			<tr>
				<td>Gambar</td>
				<td>:</td>
				<td><input type ="file" name="foto" /></td>
			</tr>
			<tr>
				<td></td>
				<td></td>
				<td><input type ="submit" name="tambah" value="Tambah"/><input type ="reset" name="reset" value="reset"/></td>
			</tr>
		</table>
	</form>
	<?php
	$id_motor=@$_POST['id_motor'];
	$merk_motor=@$_POST['merk_motor'];
	$jenis_motor=@$_POST['jenis_motor'];
	$harga=@$_POST['harga'];
	$thn_pembuatan=@$_POST['thn_pembuatan'];
	$sumber=@$_FILES['foto']['tmp_name'];
	$target='images/';
	$foto=@$_FILES['foto']['name'];
		
	$tambah_motor=@$_POST['tambah'];
	
	if($tambah_motor){
		if($id_motor=="" || $merk_motor=="" || $jenis_motor=="" || $harga =="" || $thn_pembuatan=="" || $foto==""){				
		?>
				<script type="text/javascript">
				alert("Data Harus Di INPUT!!");
				</script>
				<?php
					} else {
					$pindah =move_uploaded_file($sumber, $target.$foto);
						if($pindah){
					mysql_query("insert into motor values('$id_motor','$merk_motor','$jenis_motor','$harga','$thn_pembuatan','$foto')")or die(mysql_error());
				?>
				<script type="text/javascript">
				alert("Selamat!! Data Berhasil Di Tambah!");
				window.location.href="?page=motor";
				</script>
				<?php	
				} else {
					?>
					<script type="text/javascript">
					alert("Gambar Gagal Di Upload");
					</script>
					<?php
					}	
				}
			}
			?>
<center><font face="Mistral" color="#000000"><h4><marquee direction="left">Silahkan Mengisi Data-data yang sudah Kami Sediakan :)</center>
</marquee></font></h4>
</fieldset>