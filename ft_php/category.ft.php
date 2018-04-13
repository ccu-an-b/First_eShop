<?php

function categories_print() {
	echo "<table class='category'><tr>";
	$mysqli = mysqli_connect("localhost", "root", "123456", "rush00");
	$query = mysqli_query($mysqli, "SELECT category.name FROM category");
	while ($row = mysqli_fetch_assoc($query))
	{
		echo "<td><a href='product.php?category=".$row['name']."'>".$row['name']."</td></a>";
	}
	echo "</tr></table>";
}

?>
