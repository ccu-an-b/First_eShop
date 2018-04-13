<?php
function admin_users() {
	$mysqli = mysqli_connect("localhost", "root", "123456", "rush00");
	$query = mysqli_query($mysqli, "SELECT user.* FROM user");
	echo "<div class=list>";
	echo "<div class='elem user'>
		<p class=name>Utilisateur</p>
		<p class=admin>Admin</p>
		<form action='modif_user.php' method='get'>
		<button type='submit' name='user' value=''>Nouveau</button>
		</form>
		</div>\n";
	while ($row = mysqli_fetch_assoc($query)) {
		$adm = $row['admin'] ? 'X' : '';
		echo "<div class='elem user'>
			<p class=name>".$row['name']."</p>
			<p class=admin>".$adm."</p>
			<form action='modif_user.php' method='get'>
			<button type='submit' name='ID' value='".$row['ID']."'>Modifier</button>
			</form>
			</div>\n";
	}
	echo "</div>";
}
?>
