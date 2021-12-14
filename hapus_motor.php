<?php
	$id_motor=@$_GET['id_motor'];
	mysql_query("delete from motor where id_motor='$id_motor'") or die (mysql_error());
?>
<script type="text/javascript">
	window.location.href="?page=motor";
</script>