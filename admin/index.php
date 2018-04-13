<?php
include("../ft_php/admin.ft.php");
session_start();
$mysqli = mysqli_connect("localhost", "root", "123456", "rush00");
if (is_admin($_SESSION['logged_on_user']) != 1)
{
	header('HTTP/1.0 401 Unauthorized');
	exit;
}
include "admin_users.php";
include "admin_products.php";
include "admin_categories.php";
include "admin_paniers.php";
echo "<head><link rel='stylesheet' href='admin.css'><link rel='stylesheet' href='../rush.css'></head>";
echo "<body>
	<div class=admin>
	<form action='index.php' method='get'>
		<button type='submit' name='disp' value='user'>Utilisateurs</button>
		<button type='submit' name='disp' value='product'>Produits</button>
		<button type='submit' name='disp' value='category'>Categories</button>
		<button type='submit' name='disp' value='panier'>Paniers</button>
		<button type='submit' name='disp' value='site'>Retour au site</button>
	</form>
	</div>";
if ($_GET['disp'] == 'user')
	admin_users();
else if ($_GET['disp'] == 'product')
	admin_products();
else if ($_GET['disp'] == 'category')
	admin_categories();
else if ($_GET['disp'] == 'panier')
	admin_paniers();
else if ($_GET['disp'] == 'site')
	header('Location: ../');
echo "</body>";
?>
