<?PHP

session_start();

include("user.ft.php");

if ($_SESSION['logged_on_user'] == "")
	$user = $_SESSION['anonym'];
else
	$user = $_SESSION['logged_on_user'];
$mysqli = mysqli_connect("localhost", "root", "123456", "rush00");
$query = mysqli_query($mysqli, "SELECT user.ID FROM user WHERE user.name = '".$user."'");
$user_id = mysqli_fetch_assoc($query)['ID'];
$query = mysqli_query($mysqli, "SELECT panier.ID FROM panier WHERE panier.ID_user = '".$user_id."' AND panier.current = 1");
$panier_id = mysqli_fetch_assoc($query)['ID'];
if ($_POST['del'] == 'del')
{
	$query = mysqli_query($mysqli, "DELETE FROM panier_product WHERE ID_product = '".$_POST['ID']."' AND ID_panier = '".$panier_id."'");
	var_dump($query);
}
else if ($_POST['modif'] == 'modif')
{
	mysqli_query($mysqli, "UPDATE panier_product SET count='".$_POST['count']."' WHERE ID_PRODUCT='".$_POST['ID']."' AND ID_PANIER='".$panier_id."'");
}
header("Location: ../panier.php");

?>
