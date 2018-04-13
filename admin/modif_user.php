<?php
$mysqli = mysqli_connect("localhost", "root", "123456", "rush00");
$user_ID = $_GET['ID'];
$query = mysqli_query($mysqli, "SELECT user.* FROM user where user.ID = '".$user_ID."'");
$row = mysqli_fetch_assoc($query);
$admin = $row['admin'] ? 'checked' : '';
echo "<head><link rel='stylesheet' href='admin.css'><link rel='stylesheet' href='../rush.css'></head>";
echo "<body>
	<div class=modif>
	<form action='send_user.php' method='get'>
		<inline>Name</inline>
		<input type='text' name='name' value='".$row['name']."'>
		<br/>
		<inline>Admin</inline>
		<input type='checkbox' name='admin' ".$admin.">
		<input type='hidden' name='ID' value='".$row['ID']."'>
		<br/>
		<input type='submit' name='submit' value='Annuler'>
		<input type='submit' name='submit' value='Valider'>";
if ($row['ID'])
	echo "<input type='submit' name='submit' value='Supprimer'>";
echo "</form></div></body>";
?>
