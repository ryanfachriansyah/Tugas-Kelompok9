<?php
	$id_mobil=@$_GET['id_mobil'];
	mysql_query("delete from mobil where id_mobil='$id_mobil'") or die (mysql_error());
?>
<script type="text/javascript">
	window.location.href="?page=mobil";
</script>