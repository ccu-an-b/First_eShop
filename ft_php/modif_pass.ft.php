<?PHP

session_start();

include("user.ft.php");

if ($_POST['oldpass'] && $_POST['newpass'] && $_POST['submit'] == 'Modifier')
{
	if (client_ok($_SESSION['logged_on_user'], $_POST['oldpass']) == true)
	{
		new_pass($_SESSION['logged_on_user'], $_POST['newpass']);
		$_SESSION['modif_pass'] = 1;
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
