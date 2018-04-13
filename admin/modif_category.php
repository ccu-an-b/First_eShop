<?php
$mysqli = mysqli_connect("localhost", "root", "123456", "rush00");
$category_ID = $_GET['ID'];
$query = mysqli_query($mysqli, "SELECT product.* FROM product INNER JOIN product_category ON product_category.ID_product = product.ID WHERE product_category.ID_category = ".$category_ID);
while ($row = mysqli_fetch_assoc($query))
{
	$row['in'] = 'checked';
	$product[] = $row;
}
$query = mysqli_query($mysqli, "SELECT product.* FROM product WHERE product.ID NOT IN( SELECT product_category.ID_product FROM product_category WHERE product_category.ID_category = ".$category_ID.")");
while ($row = mysqli_fetch_assoc($query))
{
	$row['in'] = '';
	$product[] = $row;
}
if (!$_GET['ID'])
	$query = mysqli_query($mysqli, "SELECT product.* FROM product");
while ($row = mysqli_fetch_assoc($query))
{
	$row['in'] = '';
	$product[] = $row;
}
$query = mysqli_query($mysqli, "SELECT category.* FROM category WHERE category.ID = '".$category_ID."'");
$row = mysqli_fetch_assoc($query);
echo "<head><link rel='stylesheet' href='admin.css'><link rel='stylesheet' href='../rush.css'></head>";
echo "<body>
	<div class=modif>
	<form action='send_category.php' method='get'>
		<inline>Name</inline>
		<input type='text' name='name' value='".$row['name']."'>
		<br/>
		<inline>Produits</inline>
		<div class=checklist>";
foreach ($product as $row)
{
	echo "<inline>".$row['name']."</inline>";
	echo "<input type='checkbox' name='".$row['ID']."' ".$row['in']."><br/>";
}
echo "</div>
		<input type='hidden' name='ID' value='".$_GET['ID']."'>
		<input type='submit' name='submit' value='Annuler'>
		<input type='submit' name='submit' value='Valider'>";
if ($row['ID'])
	echo "<input type='submit' name='submit' value='Supprimer'>";
echo "</form></div></body>";
?>
