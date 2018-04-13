<?php
function admin_products() {
	$mysqli = mysqli_connect("localhost", "root", "123456", "rush00");
	$query = mysqli_query($mysqli, "SELECT product.* FROM product");
	echo "<div class=list>";
	echo "<div class='elem product'>
		<p class=name>Produit</p>
		<p class=price>Prix</p>
		<p class=img>Image</p>
		<form action='modif_product.php' method='get'>
		<button type='submit' name='product' value=''>Nouveau</button>
		</form>
		</div>\n";
	while ($row = mysqli_fetch_assoc($query)) {
		echo "<div class='elem product'>
			<p class=name>".$row['name']."</p>
			<p class=price>".$row['price']."€</p>
			<img src=".$row['img'].">
			<form action='modif_product.php' method='get'>
			<button type='submit' name='ID' value='".$row['ID']."'>Modifier</button>
			</form>
			</div>\n";
	}
	echo "</div>";
}
?>
