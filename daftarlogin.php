 <?php
	@session_start();
	include "inc/koneksi.php";
	
	if(@$_SESSION['admin'] ){
		header("location:login.php");
	}else{
?>
<html>
<head>
<title>Halaman Daftar</title>
<style type="text/css">
body{
	font-family:arial;
	font-size:16px;
	background-image: url("images/images.JPG");
	background-position: center;
}
#utama{
	width:300px;
	margin:0 auto;
	margin-top:12%;
	background-color:yellow
}
#judul{
	padding:15px;
	text-align:center;
	color:#fff;
	font-size:20px;
	background-color:green;
	border-top-right-radius:10px;
	border-top-left-radius:10px;
	border-bottom:3px solid #FF3399;
}
#inputan{
	background-color:red;
	padding:20px;
	border-bottom-right-radius:10px;
	border-bottom-left-radius:10px;
}
input{
	padding:10px;
	border:0;
}
.lg{
	width:240px;
}
.btn{
	background-color:#00CCFF;
	border-radius:10px;
	color:#fff;
}
.btn:hover{
	background-color:#FF3399;
	cursor:pointer;
}
</style>
</head>
<body>
	<div id="utama">
		<div id="judul">
			Silahkan Daftar
		</div>
		
		<div id="inputan">
			<form action="" method="post">
				<div>
					<input type="text" name="nama" placeholder="nama" class="lg" />
				</div>
				
				<div style="margin-top:10px;">
					<input type="text" name="username" placeholder="username" class="lg" />
				</div>
				
				<div style="margin-top:10px;">
					<input type="password" name="password" placeholder="password" class="lg" />
				</div>
				
				<div style="margin-top:10px;">
					<input type="submit" name="simpan" value="Daftar" class="btn" /><p> Sudah punya Akun? silahkan <a href="login.php">login</a></p>
				</div>
				
</form>
<?php
if($_POST){
	$nama=$_POST['nama'];
	$username=$_POST['username'];
	$password=$_POST['password'];
	$simpan=mysql_query("insert into user values(Null,'$nama','$username','$password','tamu')") or die ("gagal menyimpan");
if($simpan){
		echo "<script>alert('Selamat datang Silahkan Login');document.location.href='login.php'</script>";
}
}
?>
		</div>
	</div>
</body>
</html>
<?php
}
?>