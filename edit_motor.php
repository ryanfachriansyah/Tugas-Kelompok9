<fieldset>
	<legend>Edit Katalog</legend>
	<?php
	$id_motor=@$_GET['id_motor'];
	$sql=mysql_query("select * from motor where id_motor='$id_motor'")or die (mysql_error());
	$data=mysql_fetch_array($sql);
	?>
	
	
	<form action="" method="post" enctype="multipart/form-data">
		<table>
			<tr>
				<td>Id motor</td>
				<td>:</td>
				<td><input type ="text" name="id_motor" value="<?php echo $data['id_motor']; ?>" disabled="disabled"/></td>
			</tr>
			<tr>
				<td>Merk Motor</td>
				<td>:</td>
				<td><input type ="text" name="merk_motor" value="<?php echo $data['merk_motor']; ?>" /></td>
			</tr>
			<tr>
				<td>Jenis Motor </td>
				<td>:</td> 
				<td><select name="jenis_motor" value="<?php echo $data['jenis_motor']; ?>">
				<option name="sport">Sport</option>
				<option name="bebek">Bebek</option>
				<option name="of road">Of Road</option>
				<option name="atv">ATV</option>
				</select></td>
			</tr>
			<tr>
				<td>harga</td>
				<td>:</td>
				<td><input type ="number_format" name="harga" value="<?php echo $data['harga']; ?>" /></td>
			</tr>
			<tr>
				<td>Tahun Pembuatan</td>
				<td>:</td>
				<td><input type ="number_format" name="thn_pembuatan" value="<?php echo $data['thn_pembuatan']; ?>" /></td>
			</tr>
			<tr>
				<td>Gambar</td>
				<td>:</td>
				<td><input type ="file" name="foto" /></td>
			</tr>
			<tr>
				<td></td>
				<td></td>
				<td><input type ="submit" name="update" value="Edit"/><input type ="reset" name="reset" value="reset"/></td>
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
		
	$update_motor =@$_POST['update'];
			
			if($update_motor){
				if($id_motor=="" || $merk_motor=="" || $jenis_motor=="" || $harga =="" || $thn_pembuatan=="" || $foto==""){				
				?>
				<script type="text/javascript">
				alert("Data Harus Di INPUT!!");
				</script>
				<?php
					} else {
						if($foto == ""){
							mysql_query("update motor set id_motor = '$id_motor', merk_motor = '$merk_motor', jenis_motor = '$jenis_motor', harga='$harga', thn_pembuatan='$thn_pembuatan' foto = '$foto' where id_mobil = '$id_mobil'") or die(mysql_error());
				?>
					<script type="text/javascript">
					alert("Data Berhasil Di Update!!");
					window.location.href="?page=mobil";
					</script>
				<?php 
					} else {
					$pindah =move_uploaded_file($sumber, $target.$foto);
						if($pindah){
mysql_query("update motor set id_motor = '$id_motor', merk_motor = '$merk_motor', jenis_motor = '$jenis_motor', harga='$harga', thn_pembuatan='$thn_pembuatan' foto = '$foto' where id_mobil = '$id_mobil'")or die(mysql_error());
				?>
					<script type="text/javascript">
					alert("Data Berhasil Di Update!");
					window.location.href="?page=mobil";
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
		}
?>
	</fieldset>
