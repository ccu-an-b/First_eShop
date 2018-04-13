<?PHP

session_start();

function panier_count()
{
	if ($_SESSION['logged_on_user'] == "")
		$user = $_SESSION['anonym'];
	else	
		$user = $_SESSION['logged_on_user'];
	$mysqli = mysqli_connect("localhost", "root", "123456", "rush00");
	$query = mysqli_query($mysqli, "SELECT product.*,panier_product.count FROM product INNER JOIN panier_product ON panier_product.ID_product = product.ID INNER JOIN panier ON panier.id = panier_product.ID_panier INNER JOIN user ON panier.ID_user = user.ID WHERE user.name = '".$user."' && panier.current = 1");
	$count = 0;
	while($row = mysqli_fetch_assoc($query))
		$count+= $row['count'];
	$_SESSION['panier_count'] = $count;
}

function panier_print()
{
	if ($_SESSION['logged_on_user'] == "")
		$user = $_SESSION['anonym'];
	else	
		$user = $_SESSION['logged_on_user'];
	$mysqli = mysqli_connect("localhost", "root", "123456", "rush00");
	$query = mysqli_query($mysqli, "SELECT product.*,panier_product.count FROM product INNER JOIN panier_product ON panier_product.ID_product = product.ID INNER JOIN panier ON panier.id = panier_product.ID_panier INNER JOIN user ON panier.ID_user = user.ID WHERE user.name = '".$user."' && panier.current = 1");
	$total = 0;
	while($row = mysqli_fetch_assoc($query))
	{
		if ($total == 0)
			echo "<div class='product' style=\"font-weight:bold\" ><p class=name style=\"margin-left:22%\">Produit</p><p style='margin-left=5%'>Prix<p class=count style='margin-left:5%;'>Quantit&eacute</p>Modifier</div></br>";
		echo "<div class=product>
			<img src='".$row['img']."'>
			<p class=name>".$row['name']."</p>
			<p class=price>".$row['price']."€</pr>
			<form action='./ft_php/modif_panier_cl.php' method='post'>
			<input type='number' name='count'  min='1' class='count' value=".$row['count']."></p>
			<button type='submit' name='modif' value='modif' style='margin-left:25%'>Ok</button>
			<button type='submit' name='del' value='del'>X</button>
			<input type='hidden' name='ID' value='".$row['ID']."'>	
			</form>
			 </div></br>";
		$_SESSION['total'] = $total + $row['price'] * $row['count'];
		$total = $_SESSION['total'];
	}
}

function panier_empty()
{
	echo "<div style=\"margin-left:10%;margin-right:10%\"></br></br><table class=\"connexion\"><tr><td style=\"text-align:center\"><h3>Votre Panier est vide<h3></td></tr></table></div></br></br>";

}

function panier_check()
{
	$_SESSION['total'] = 0;
	$_SESSION['panier_check'] = 0;
	echo "<div style=\"margin-left:10%;margin-right:10%\"></br></br><table class=\"connexion\"><tr><td style=\"text-align:center\"><h3>Votre Panier vient d'&ecirctre valid&eacute !<h3></td></tr></table></div></br></br>";
}

function panier_move($old, $new) {
	$mysqli = mysqli_connect("localhost", "root", "123456", "rush00");
	$query = mysqli_query($mysqli, "SELECT user.ID FROM user WHERE user.name = '".$old."'");
	$old = mysqli_fetch_assoc($query)['ID'];
	$query = mysqli_query($mysqli, "SELECT user.ID FROM user WHERE user.name = '".$new."'");
	$new = mysqli_fetch_assoc($query)['ID'];
	$query = mysqli_query($mysqli, "DELETE FROM panier WHERE panier.ID_user = '".$new."' AND panier.current = 1");
	$query = mysqli_query($mysqli, "UPDATE panier SET panier.ID_user = '".$new."' WHERE panier.ID_user = '".$old."'");
	echo $query;
}
?>
