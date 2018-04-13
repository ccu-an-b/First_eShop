<?php
function products_print($category) {
	if (!$category)
		$category = 'cat1';
	echo "<h3>$category</h3>";
	$mysqli = mysqli_connect("localhost", "root", "123456", "rush00");
	$query = mysqli_query($mysqli, "SELECT product.* FROM product INNER JOIN product_category ON product.ID = product_category.ID_product INNER JOIN category ON category.ID = product_category.ID_category WHERE category.name = '".$category."'");
	echo "<div class=all_product>";
	$user = $_SESSION['logged_on_user'] ? $_SESSION['logged_on_user'] : $_SESSION['anonym'];
	while($row = mysqli_fetch_assoc($query)) {
		echo "<div class=product_aff>
			<div class=product>
			<img src='".$row['img']."'>
			<p class=info>".$row['name']." - ".$row['price']."€</div>
			<form action='add_product_panier.php' method='get'>
			<input type='hidden' name=user value='$user'</input>
			<input style='width:50px' type='number' name='count'  min='1'  value='1'>
			<button style= 'width:80px; height:21px;'type='submit' name='product' value='".$row['name']."'>Ajouter</button>
			</form></div>";
	}
	echo "</div>";
}
?>
