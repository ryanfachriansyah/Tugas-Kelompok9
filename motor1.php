<fieldset>
	<legend><font face="cooper">Katalog Motor</font></legend>
	
	<div style="margin-bottom:15px;" align="right">
		<form action="" method="post">
			<input type="text" name="inputan_pencarian" placeholder="Masukkan id_motor / merk_motor" style="width:200px; padding:5px;"/>
			<input type="submit" name="cari" value="cari" style="padding:5px;" />
			
		</form>
	</div>
	<table width ="100%" border="1px" style="border-collapse:collapse;">
		<tr style="background-color:#fc0;">
			<th> id_motor</th>
			<th> merk_motor</th>
			<th> jenis_motor</th>
			<th> harga</th>
			<th> thn_pembuatan</th>
			<th> foto</th>
			<th></th>
		</tr>
		<?php
		$inputan_pencarian=@$_POST['inputan_pencarian'];
		$cari_mobil=@$_POST['cari'];
		if($cari_mobil){
			if($inputan_pencarian != ""){
				$sql=mysql_query ("select * from motor where id_motor like '%$inputan_pencarian%' or merk_motor like '%$inputan_pencarian%'") or die (mysql_error());
			}else{
				$sql=mysql_query("select * from motor") or die (mysql_error());
			}
		}else{
			$sql=mysql_query("select * from motor") or die (mysql_error());
		}
		
		$cek=mysql_num_rows($sql);
		if($cek<1){
			?>
				<tr>
					<td colspan="10" align="center" style="padding:10px;"> Data Tidak Ditemukan</td>
				</tr>
			<?php
			
		}else{
		while($data=mysql_fetch_array($sql)){
		
		?>
		
		
		<tr>
			<td><?php echo $data['id_motor'];?></td>
			<td><?php echo $data['merk_motor'];?></td>
			<td><?php echo $data['jenis_motor'];?></td>
			<td><?php echo $data['harga'];?></td>
			<td><?php echo $data['thn_pembuatan']?></td>
			<td align="center"><img src="images/<?php echo $data['foto'];?>" width="75px"/></td>
			<td align="center">
				<a href="?page=motor&action=edit&id_motor=<?php echo $data['id_motor'];?>"><button>Edit</button></a>
				<a onclick="return confirm('yakin data akan dihapus???')" href="?page=motor&action=hapus&id_motor=<?php echo $data['id_motor'];?>"><button>Hapus</button></a>
			</td>
		</tr>
		<?php
		}
		}
		?>
		</table>
		
	</fieldset>	