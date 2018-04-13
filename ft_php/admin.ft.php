<?php

function is_admin($login) {
	if ($login == '')
		return 0;
	$mysqli = mysqli_connect("localhost", "root", "123456", "rush00");
	$query = mysqli_query($mysqli, "SELECT user.admin FROM user WHERE user.name = '".$login."'");
	return (mysqli_fetch_assoc($query)['admin'] == 1);
}

function admin_print($login) {
	if ($login != '' && is_admin($login))
		return "<td><a href='admin/index.php'><h2>Administration</h2></a></td>";
}
?>
