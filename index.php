<?php
	@session_start();
	include "inc/koneksi.php";
	
	if(@$_SESSION['admin']){
?>


<!DOCTYPE HTML>
<html>
<head>
	<title>Jaya Motor's</title>
<style type = "text/css">
body{
	font-family:arial;
	font-size:12px;
	background-image: url("images/16.jpg");
	background-position: center;
}

#canvas{
	width :1200px;
	height: 825px;
	margin:0 auto;
	border:1px solid silver;
}
#header{
	font-family:Arial;
	background-color:#FFFFFF
	font-size:100px;
	padding: 90px;
	width: 1020px;
	height: 15px;
	text-align:center;
	background-image:url(images/15.jpg);
	background-position: center;
}
#menu{
	background-color:red;
}
#menu ul{
	list-style:none;
	margin:0;
	padding:0;
}
#menu ul li.utama{
	display:inline-table;
}
#menu ul li:hover{
	background-color:red;
}
#menu ul li a{
	display:block;
	text-decoration:none;
	line-height:40px;
	padding:0 10px;
	color:#fff;
}
.utama ul{
	display:none;
	position:absolute;
	z-index:2;
}
.utama:hover ul{
	display:block;
}
.utama ul li{
	display:block;
	background-color:red;
	width:140px;
}
#isi{
	min-height:700px;
	padding:20px;
	background-image: url("");
	background-position: center;
	background-color:white;
}


.style1 {
	color: #9933CC;
	font-weight: bold;
}
.style2 {color: #FF0000}
.style3 {color: #FFFF00}
</style>
</head>
<body>
	<div id="canvas">
		<div id="header">
		<font color="white" face="Times New Roman"></font>
		<font color="white" face="Times New Roman"></font>		</div>
		
		<div id="menu">
			<ul>
				<li class="utama"><a href="admin.php">Beranda</a>
				<li class="utama"><a href="?page=mobil">Mobil</a>
				</li>
				<li class="utama"><a href="?page=motor">Motor</a>
				</li>
				<li class="utama" style="float:right";><a href="logout.php">Logout</a></li>
			</ul>
		</div>
		<div id="isi">
			<?php
				$page=@$_GET['page'];
				$action=@$_GET['action'];
				if($page=="mobil"){
					if($action==""){
						include"inc/mobil1.php";
					}else if($action=="keranjang"){
						include"inc/keranjangmobil.php";
					}
				}else if($page=="motor"){
					if($action==""){
						include"inc/motor1.php";
					}else if($action=="keranjang"){
						include"inc/keranjangmotor.php";
					}
				}
			?>
		    <span class="style3"></span></div>
	  
	</div>
</body>
	</html>
<?php
}else{
	header("location:login.php");
}
?>