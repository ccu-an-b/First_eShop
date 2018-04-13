<?PHP

session_start();

include("user.ft.php");

if ($_POST['newlog'] && $_POST['passwd'] && $_POST['submit'] == 'Modifier')
{
	if (client_ok($_SESSION['logged_on_user'], $_POST['passwd']) == true)
	{
		new_log($_SESSION['logged_on_user'], $_POST['newlog']);
		$_SESSION['modif_log'] = 1;
		$_SESSION['logged_on_user'] = $_POST['newlog'];
		header("Location: ../account.php");
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
