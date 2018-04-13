<?PHP

session_start();

include("user.ft.php");

if ($_POST['passwd'] &&  $_POST['submit'] == 'Supprimer')
{
	if (client_ok($_SESSION['logged_on_user'], $_POST['passwd']) == true)
	{
		del_client($_SESSION['logged_on_user']);
		header("Location: ../deconnexion.php");
	}
	else
	{	
		$_SESSION['wrong_pass'] = 1;
		header("Location: ../account.php");
	}
}
else
{
	$_SESSION['incomplete'] = 1;
	header("Location: ../account.php");
}

?>
