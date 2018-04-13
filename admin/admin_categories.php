<?php
function admin_categories() {
	$mysqli = mysqli_connect("localhost", "root", "123456", "rush00");
	$query = mysqli_query($mysqli, "SELECT category.* FROM category");
	echo "<div class=list>";
	echo "<div class='elem cat'>
		<p class=name>Categorie</p>
		<form action='modif_category.php' method='get'>
		<button type='submit' name='product' value=''>Nouveau</button>
		</form>
		</div>\n";
	while ($row = mysqli_fetch_assoc($query)) {
		echo "<div class='elem cat'>
			<p class=name>".$row['name']."</p>
			<form action='modif_category.php' method='get'>
			<button type='submit' name='ID' value='".$row['ID']."'>Modifier</button>
			</form>
			</div>\n";
	}
	echo "</div>";
}
?>
