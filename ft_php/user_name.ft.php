<?php
function whoami($user)
{
	if ($user != "")
		echo "<a href=\"account.php\"><p style=\"font-weight: bold;text-transform:uppercase; font-family: 'Shadows Into Light', cursive; font-size: 3vw; color:#FF7644\"> Bienvenue $user </p></a>";
	else
		echo "<p style=\"font-weight: bold; font-size: 3vw; color:#FF7644;font-family: 'Shadows Into Light', cursive;\">Quelle sera votre prochaine destination?</p>";

}
?>
