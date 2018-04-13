<?PHP

session_start();

include("user.ft.php");
include("panier.ft.php");

if ($_POST['login'] && $_POST['passwd'] && $_POST['submit'] == 'Se connecter')
{
	if (client_ok($_POST['login'], $_POST['passwd']) == true)
	{
		if ($_POST['keep'] == 'on')
			echo panier_move($_SESSION['anonym'], $_POST['login']);
		$_SESSION['logged_on_user'] = $_POST['login'];
		$_SESSION['anonym'] = '';
		header("Location: ../account.php");
	}
	else
	{	
		$_SESSION['wrong_id'] = 1;
		header("Location: ../connexion.php");
	}
}
else
{
	$_SESSION['incomplete'] = 1;
	header("Location: ../connexion.php");
}

?>
