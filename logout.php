<?php
session_start();
$_session['session_username']='';
unset($_session['session_username']);
session_unset();
session_destroy();
header("location:login.php");
echo "<script>alert('selamat datang Kasir ku');document.location.href='indexkasir.php'</script>";
?>