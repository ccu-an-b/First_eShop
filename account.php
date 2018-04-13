<?PHP

session_start();
include("./ft_php/user_name.ft.php");
include("./ft_php/panier.ft.php");
include("./ft_php/connexion.ft.php");
include("./ft_php/error.ft.php");
include("./ft_php/category.ft.php");
include("./ft_php/admin.ft.php");
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
		<h3>Votre Compte</h3>
		<h4><?php error(); ?></h4>
		<table class="connexion">
			<tr>
				<td style="text-align:center"><h2>Modifier votre mot de passe</h2></td>
				<td style="text-align:center"><h2>Modifier votre identifiant</h2></td>
			</tr>
			<tr>
				<td>
					<form action="./ft_php/modif_pass.ft.php" method="post">
						<table class="connexion_form">
							<tr>
								<td>Ancien</td>
								<td><input type="password" name="oldpass">
							</tr>
							<tr>
								<td>Nouveau</td>
								<td><input type="password" name="newpass">
							</tr>
							<tr>
								<td></td>
								<td><input type="submit" name="submit" value="Modifier"></td>	
							</tr>
						</table>
						</form>
				</td>
				<td>
				<form action="./ft_php/modif_log.ft.php"  method="post">
						<table class="connexion_form">
							<tr>
								<td>Nouveau</td>
								<td><input type="text" name="newlog">
							</tr>
							<tr>
								<td>Mot de passe</td>
								<td><input type="password" name="passwd">
							</tr>
							<tr>
								<td></td>
								<td><input  type="submit" name="submit" value="Modifier"></td>	
							</tr>
						</table>
					</form>
				</td>
			</tr>
			<tr>
				<td style="text-align:center"><h2>Supprimer votre compte</h2></td>
				</tr>

			<tr>
				<td>
						<form action="./ft_php/modif_del.ft.php"  method="post">
						<table class="connexion_form">
							<tr>
								<td>Mot de passe</td>
								<td><input type="password" name="passwd">
							</tr>
								<tr>
								<td></td>
								<td><input  type="submit" name="submit" value="Supprimer"></td>	
							</tr>
						</table>
					</form>

				</td>
			</tr>
	</div>
</body>
</html>
