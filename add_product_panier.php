<?php
$mysqli = mysqli_connect("localhost", "root", "123456", "rush00");
$query = mysqli_query($mysqli, "SELECT panier.ID FROM panier INNER JOIN USER ON panier.ID_user = USER.ID WHERE USER.name = '".$_GET['user']."' && panier.current = 1");
$panier_ID = mysqli_fetch_assoc($query)['ID'];
if (!$panier_ID)
{
	$query = mysqli_query($mysqli, "SELECT user.ID FROM user WHERE user.name = '".$_GET['user']."'");
	$user_ID = mysqli_fetch_assoc($query)['ID'];
	$query = mysqli_query($mysqli, "INSERT INTO panier (ID, ID_user, current) VALUES (NULL, '".$user_ID."', 1)");
	$query = mysqli_query($mysqli, "SELECT panier.ID FROM panier INNER JOIN USER ON panier.ID_user = USER.ID WHERE USER.name = '".$_GET['user']."' && panier.current = 1");
	$panier_ID = mysqli_fetch_assoc($query)['ID'];
}
$product_name = $_GET['product'];
$query = mysqli_query($mysqli, "SELECT product.ID FROM product WHERE product.name = '".$product_name."'");
$product_ID = mysqli_fetch_assoc($query)['ID'];
$query = mysqli_query($mysqli,"SELECT panier_product.count FROM panier_product INNER JOIN product ON panier_product.ID_product = product.ID INNER JOIN panier ON panier_product.ID_panier = panier.ID INNER JOIN USER ON panier.ID_user = USER.ID WHERE USER.name = '".$_GET['user']."' && panier.current = 1 && product.name = '".$product_name."'");
$var = mysqli_fetch_assoc($query)['count'];
if ($var)
{
	$var+= $_GET['count'];
	$query = mysqli_query($mysqli, "UPDATE panier_product SET count='".$var."' WHERE ID_panier = '".$panier_ID."' && ID_product = '".$product_ID."'");
}
else
{
	$query = mysqli_query($mysqli, "INSERT INTO panier_product (ID_panier, ID_product, count, status) VALUES ('".$panier_ID."', '".$product_ID."', '".$_GET['count']."', NULL)");
}
header('Location: ' . $_SERVER['HTTP_REFERER']);
?>
