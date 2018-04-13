<?php

include("./ft_php/user_name.ft.php");
include("./ft_php/panier.ft.php");
include("./ft_php/connexion.ft.php");
include("./ft_php/category.ft.php");
include("./ft_php/admin.ft.php");
session_start();
panier_count();

?>

<html>
<head>
	<title>Evasion</title>
	<link href="https://fonts.googleapis.com/css?family=Quicksand:300" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Shadows+Into+Light" rel="stylesheet">
	<link rel="icon" href="./icons/favicon.ico" type="image/x-icon"/>
	<link rel="shortcut icon" href="./icons/favicon.ico" type="image/x-icon"/>
	<link rel="stylesheet" type="text/css" href="rush.css"/>
	<link href='http://fonts.googleapis.com/css?family=Cookie' rel='stylesheet' type='text/css'>

</head>

<body>
	<div class="header">
		<div class="logo" ><img style="width:100%" src="./icons/logo.png" style="float:left"></div>
		<a href="index.php"><h1>Evasion</h1></a>
		<table class="user">
			<tr>
				<td><?php echo admin_print($_SESSION['logged_on_user']);?></td>
				<td style="width:25"><a href="<?php connexion_link($_SESSION['logged_on_user']); ?>"><h2><?php connexion_title($_SESSION['logged_on_user']); ?></h2></a></td>
				<td style="width:25%"><a href="panier.php"><h2>Panier [<?php echo $_SESSION['panier_count']; ?>]</h2></a></td>
			</tr>
		</table>
	</div>
	<div>
	<div class="welcome">
		<div class="welcome_text"><?php whoami($_SESSION['logged_on_user']);?></div>
	</div>
	</div>
	<div class="banner">
		<?php categories_print();?><br/>
	</div>
	</br>
	<div class="main">
		<h3>Votre Panier</h3>
		<div class="panier">
<?PHP
if ($_SESSION['panier_count'] > 0)
{
	panier_print();
	echo "<h3>Co&ucirct total: ".$_SESSION['total']."€</h3>
			<form action='./ft_php/valid_panier.php' method='post'>
				<input type='submit' name='submit' value='Valider'>
			</form>";

}
	else if ($_SESSION['panier_check'] == 1)
		panier_check();
	else if ($_SESSION['panier_count'] == 0)
		panier_empty();
?>

		</div>		
	</div>
</body>
</html>
