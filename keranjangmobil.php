<fieldset>
	<legend>Pesan </legend>
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
				<td>Nama</td>
				<td>:</td>
				<td><input type ="text" name="nama" value="" /></td>
			</tr>
			<tr>
				<td>Alamat</td>
				<td>:</td> 
				<td><input type ="text" name="alamat" value="" /></td>
			</tr>
				<td></td>
				<td></td>
				<td><input type ="submit" name="pesan" value="Pesan"/><input type ="reset" name="reset" value="reset"/></td>
			</tr>
		</table>
	</form>
	<?php
	$id_mobil=@$_POST['id_mobil'];
	$nama=@$_POST['nama'];
	$alamat=@$_POST['alamat'];
		
	$tambahpesanan=@$_POST['pesan'];
			
			if($tambahpesanan){
				if($id_mobil=="" || $nama=="" || $alamat==""){				
				?>
				<script type="text/javascript">
				alert("Data Harus Di INPUT!!");
				</script>
				<?php
					} else {
							mysql_query("insert into pesan_mobil values('$id_mobil','$nama','$alamat'") or die(mysql_error());
						
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
		}
?>
	</fieldset>
