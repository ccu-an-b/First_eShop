<?PHP

session_start();

include("user.ft.php");
include("panier.ft.php");

if ($_POST['login'] && $_POST['passwd'] && $_POST['submit'] == 'S\'inscrire')
{
	if ($res =client_exist($_POST['login']) == false)
	{		
		new_user($_POST['login'], $_POST['passwd']);
		if ($_POST['keep'] == 'on')
			echo panier_move($_SESSION['anonym'], $_POST['login']);
		$_SESSION['logged_on_user'] = $_POST['login'];
		$_SESSION['anonym'] = '';
		header("Location: ../account.php");
	}
	else
	{
		$_SESSION['exist'] = 1;
		header("Location: ../connexion.php");
	}

}
else
{
	$_SESSION['incomplete'] = 1;
	header("Location: ../connexion.php");
}
?>
