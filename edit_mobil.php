<fieldset>
	<legend>Edit Katalog</legend>
	<?php
	$id_mobil=@$_GET['id_mobil'];
	$sql=mysql_query("select * from mobil where id_mobil='$id_mobil'")or die (mysql_error());
	$data=mysql_fetch_array($sql);
	?>
	
	
	<form action="" method="post" enctype="multipart/form-data">
		<table>
			<tr>
				<td>Id mobil</td>
				<td>:</td>
				<td><input type ="text" name="id_mobil" value="<?php echo $data['id_mobil']; ?>" disabled="disabled"/></td>
			</tr>
			<tr>
				<td>Merk Mobil</td>
				<td>:</td>
				<td><input type ="text" name="merk_mobil" value="<?php echo $data['merk_mobil']; ?>" /></td>
			</tr>
			<tr>
				<td>Jenis Mobil </td>
				<td>:</td> 
				<td><select name="jenis_mobil" value="<?php echo $data['jenis_mobil']; ?>">
        <option name="sport">Sport</option>
        <option name="suv">SUV</option>
		<option name="of road">Of Road</option>
		<option name="sedan">Sedan</option>
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
	$id_mobil=@$_POST['id_mobil'];
	$merk_mobil=@$_POST['merk_mobil'];
	$jenis_mobil=@$_POST['jenis_mobil'];
	$harga=@$_POST['harga'];
	$thn_pembuatan=@$_POST['thn_pembuatan'];
	$sumber=@$_FILES['foto']['tmp_name'];
	$target='images/';
	$foto=@$_FILES['foto']['name'];
		
	$update_mobil =@$_POST['update'];
			
			if($update_mobil){
				if($id_mobil=="" || $merk_mobil=="" || $jenis_mobil=="" || $harga =="" || $thn_pembuatan=="" || $foto==""){				
				?>
				<script type="text/javascript">
				alert("Data Harus Di INPUT!!");
				</script>
				<?php
					} else {
						if($foto == ""){
							mysql_query("update mobil set id_mobil = '$id_mobil', merk_mobil = '$merk_mobil', jenis_mobil = '$jenis_mobil', harga='$harga', thn_pembuatan='$thn_pembuatan' foto = '$foto' where id_mobil = '$id_mobil'") or die(mysql_error());
				?>
					<script type="text/javascript">
					alert("Data Berhasil Di Update!!");
					window.location.href="?page=mobil";
					</script>
				<?php 
					} else {
					$pindah =move_uploaded_file($sumber, $target.$foto);
						if($pindah){
mysql_query("update mobil set id_mobil = '$id_mobil', merk_mobil = '$merk_mobil', jenis_mobil = '$jenis_mobil', harga='$harga', thn_pembuatan='$thn_pembuatan' foto = '$foto' where id_mobil = '$id_mobil'")or die(mysql_error());
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
