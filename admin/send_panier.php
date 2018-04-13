<?php
$mysqli = mysqli_connect("localhost", "root", "123456", "rush00");
$query = mysqli_query($mysqli, "DELETE FROM panier WHERE panier.ID = ".$_GET['panier']);
header("Location: index.php?disp=panier");
?>
