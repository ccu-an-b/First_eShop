<?PHP
session_start();

function error()
{
	if ($_SESSION['incomplete'] == 1)
	{
		$_SESSION['incomplete'] = "";
		echo  "Champs incomplets !";
	}
	else if ($_SESSION['wrong_id'] == 1)
	{
		$_SESSION['wrong_id'] = "";
		echo "Mauvais identifiant et mot de passe";
	}
	else if ($_SESSION['exist'] == 1)
	{
		$_SESSION['exist'] = "";
		echo "Cet identifiant existe d&eacuteja";
	}
	else if ($_SESSION['wrong_pass'] == 1)
	{
		$_SESSION['wrong_pass'] = "";
		echo "Mauvais mot de passe";
	}
	else if ($_SESSION['modif_pass'] == 1)
	{
		$_SESSION['modif_pass'] = "";
		echo "Mot de passe modifi&eacute";
	}
	else if ($_SESSION['modif_log'] == 1)
	{
		$_SESSION['modif_log'] = "";
		echo "Identifiant modifi&eacute";
	}
	else if ($_SESSION['not_log'] == 1)
	{
		$_SESSION['not_log'] = "";
		echo "Vous devez vous identifier pour valider votre panier";
	}
}
?>
