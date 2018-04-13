<?php
$mysqli = mysqli_connect("localhost", "root", "123456", "rush00");
if ($_GET['submit'] == 'Valider')
{
	if ($_GET['ID'] == '')
	{
		$query = mysqli_query($mysqli, "INSERT INTO product (ID, name, price, img) VALUES (NULL, '".$_GET['name']."', '".$_GET['price']."', '".$_GET['img']."')");
	}
	else
	{
		$query = mysqli_query($mysqli, "UPDATE product SET name='".$_GET['name']."',price='".$_GET['price']."',img='".$_GET['img']."' WHERE ID='".$_GET['ID']."'");
	}
}
else if ($_GET['submit'] == 'Supprimer')
	$query = mysqli_query($mysqli, "DELETE FROM product WHERE product.ID = ".$_GET['ID']);
header("Location: index.php?disp=product");
?>
