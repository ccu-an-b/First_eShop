<?php

session_start();

if ($_SESSION['logged_on_user'] == "" && $_POST['submit'] == 'Valider')
{
	$_SESSION['not_log'] = 1;
	header("Location: ../connexion.php");
}
else
{	
	$mysqli = mysqli_connect("localhost", "root", "123456", "rush00");
	$query = mysqli_query($mysqli,"UPDATE panier INNER JOIN USER ON panier.ID_user = USER.ID SET CURRENT = 0 WHERE USER.name = '" .$_SESSION['logged_on_user']. "'");
	$_SESSION['panier_count'] = "";
	$_SESSION['panier_check'] = 1;
	header("Location: ../panier.php");
}
?>

