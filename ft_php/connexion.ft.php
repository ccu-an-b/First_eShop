<?PHP

session_start();

function is_connected($user)
{
	if ($user != "")
		return true;
	else
		return false;
}		

function connexion_title($user)
{
	if (is_connected($user) != "")
		echo "D&eacuteconnexion";
	else
		echo "Connexion";
}

function connexion_link($user)
{
	if (is_connected($user) == "")
		echo "connexion.php";
	else
		echo "deconnexion.php";
}

function logout()
{
	$_SESSION['logged_on_user'] = "";
	$_SESSION['total'] = 0;
	
	 return "";
}

?>
