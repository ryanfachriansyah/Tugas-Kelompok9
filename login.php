 <?php
	@session_start();
	include "inc/koneksi.php";
	
	if(@$_SESSION['admin'] || @$_SESSION['']){
		header("location:index.php");
	}else{
?>
<html>
<head>
<title>Halaman Login</title>
<style type="text/css">
body{
	font-family:arial;
	font-size:16px;
	background-image: url("images/16.JPG");
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
			Silahkan login
		</div>
		
		<div id="inputan">
			<form action="" method="post">
				<div>
					<input type="text" name="username" placeholder="username" class="lg" />
				</div>
				
				<div style="margin-top:10px;">
					<input type="password" name="password" placeholder="password" class="lg" />
				</div>
				
				<div style="margin-top:10px;">
					<input type="submit" name="login" value="Login" class="btn" />
				</div >
				<div style="margin-top:10px;">Belum Punya akun ? <a href="daftarlogin.php">Klik Disini</a></div>
				
</form>
<?php
				$username=@$_POST['username'];
				$password=@$_POST['password'];
				$login=@$_POST['login'];
				
				if($login){
					if($username=="" || $password==""){
						?><script type="text/javascript">alert("username/password tidak boleh kosong");</script><?php
					}else{
						$sql=mysql_query("select * from user where username='$username' and password='$password'") or die (mysql_error());
						$data=mysql_fetch_array($sql);
						$cek=mysql_num_rows($sql);
						if($cek >=1){
							if($data['level']=="admin"){
								@$_SESSION['admin']=$data['nama'];
								//header("Location:index.php");
								?>
								<script language=javascript>
									document.location.href="admin.php";</script> 
								<?php
							}else if($data['level']==""){
								@$_SESSION['']=$data['nama'];
								//header("Location:index.php");
								?>
								<script language=javascript>
									document.location.href="index.php";</script> 
								<?php
								
							}
						}else{
							echo "login gagal";
						}
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