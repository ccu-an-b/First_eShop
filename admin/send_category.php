<?php
$mysqli = mysqli_connect("localhost", "root", "123456", "rush00");
if ($_GET['submit'] == 'Valider')
{
	if ($_GET['ID'] == '')
		$query = mysqli_query($mysqli, "INSERT INTO category (ID, name) VALUES (NULL, '".$_GET['name']."')");
	else
		$query = mysqli_query($mysqli, "UPDATE category SET name='".$_GET['name']."' WHERE ID='".$_GET['ID']."'");

	$query = mysqli_query($mysqli, "SELECT product_category.* FROM product_category WHERE product_category.ID_category =".$_GET['ID']);
	$array = mysqli_fetch_all($query);
	foreach ($_GET as $key => $val)
	{
		if ($val == "on" && !in_array($key, array_column($array, 1)))
			mysqli_query($mysqli, "INSERT INTO product_category (ID_category, ID_product) VALUE ('".$_GET['ID']."', '".$key."')");
	}
	foreach ($array as $elem)
	{
		if (!$_GET[$elem[1]])
		{
			mysqli_query($mysqli, "DELETE FROM product_category WHERE product_category.ID_category = ".$_GET['ID']." && product_category.ID_product = $elem[1]");
		}
	}
}
else if ($_GET['submit'] == 'Supprimer')
	$query = mysqli_query($mysqli, "DELETE FROM category WHERE category.ID = ".$_GET['ID']);
header("Location: index.php?disp=category");
?>
