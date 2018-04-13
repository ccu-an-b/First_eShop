<?php
$mysqli = mysqli_connect("localhost", "root", "123456", "rush00");
if ($_GET['submit'] == 'Valider')
{
	$adm = $_GET['admin'] == 'on' ? 1 : 0;
	if ($_GET['ID'] == '')
	{
		$query = mysqli_query($mysqli, "INSERT INTO user (ID, name, passwd, admin) VALUES (NULL, '".$_GET['name']."', 'pass', '".$adm."')");
	}
	else
	{
		$query = mysqli_query($mysqli, "UPDATE user SET name='".$_GET['name']."',admin='".$adm."' WHERE ID='".$_GET['ID']."'");
	}
}
else if ($_GET['submit'] == 'Supprimer')
	$query = mysqli_query($mysqli, "DELETE FROM user WHERE user.ID = ".$_GET['ID']);
header("Location: index.php?disp=user");
?>
