<?php
function admin_paniers() {
	$mysqli = mysqli_connect("localhost", "root", "123456", "rush00");
	$query = mysqli_query($mysqli, "SELECT panier.*, user.name FROM panier INNER JOIN USER ON panier.ID_user = USER.ID");
	echo "<div class=list>";
	echo "<div class='elem pan'>
		<p class=name>Panier</p>
		<p class=user>User</p>
		<p class=archive>En cours</p>
		<form action='modif_panier.php' method='get'>
		<button style='visibility:hidden' type='submit' name='panier' value=''>Nouveau</button>
		</form>
		</div>\n";
	while ($row = mysqli_fetch_assoc($query)) {
		echo "<div class='elem pan'>
			<p class=name>".$row['ID']."</p>
			<p class=user>".$row['name']."</p>
			<p class=archive>".$row['current']."</p>
			<form action='send_panier.php' method='get'>
			<button type='submit' name='panier' value='".$row['ID']."'>Supprimer</button>
			</form>
			</div>\n";
	}
	echo "</div>";
}
?>
