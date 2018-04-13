<?php
$mysqli = mysqli_connect("localhost", "root", "123456", "rush00");
$panier_ID = $_GET['ID'];
$query = mysqli_query($mysqli, "SELECT panier.* FROM panier where panier.ID = '".$panier_ID."'");
$row = mysqli_fetch_assoc($query);
echo "<head><link rel='stylesheet' href='admin.css'><link rel='stylesheet' href='../rush.css'></head>";
echo "<body>
	<div class=modif>
	<form action='send_panier.php' method='get'>
		<inline>Name</inline>
		<input type='text' name='name' value='".$row['name']."'>
		<br/>
		<inline>Price</inline>
		<input type='text' name='price' value=".$row['price'].">
		<br/>
		<inline>Image</inline>
		<input type='text' name='img' value=".$row['img'].">
		<br/>
		<input type='hidden' name='ID' value='".$row['ID']."'>
		<input type='submit' name='submit' value='Annuler'>
		<input type='submit' name='submit' value='Valider'>";
if ($row['ID'])
	echo "<input type='submit' name='submit' value='Supprimer'>";
echo "</form></div></body>";
?>
