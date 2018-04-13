<?PHP

function	client_exist($user)
{
	$mysqli = mysqli_connect("localhost", "root", "123456", "rush00");
	$sql = "SELECT * FROM user WHERE name ='".mysqli_real_escape_string($mysqli,$user)."'";
	$res = mysqli_query($mysqli, $sql);
	$res = mysqli_fetch_array($res);
	if ($res == false)
		return false;
	else
		return true;
}

function	client_ok($user, $passwd)
{
	$mysqli = mysqli_connect("localhost", "root", "123456", "rush00");
	$sql = "SELECT * FROM user WHERE name ='".mysqli_real_escape_string($mysqli, $user)."' and passwd = '" .mysqli_real_escape_string($mysqli, $passwd). "'";
	$res = mysqli_query($mysqli, $sql);
	$res = mysqli_fetch_array($res);

	if ($res == "")
		return false;
	else
		return true;
}

function new_anonym() {
	$mysqli = mysqli_connect("localhost", "root", "123456", "rush00");
	$query = mysqli_query($mysqli, "SELECT u.Id + 1 AS ID FROM user u LEFT JOIN user u1 ON u1.Id = u.Id + 1 WHERE u1.Id IS NULL ORDER BY u.Id LIMIT 0, 1");
	$next_ID = mysqli_fetch_assoc($query)['ID'];
	mysqli_query($mysqli, "INSERT INTO user (ID, name, passwd, admin) VALUES (".$next_ID.", 'anonym".$next_ID."', 'pass', '0')");
	return "anonym".$next_ID;
}

function new_user($login, $passwd) {
	$mysqli = mysqli_connect("localhost", "root", "123456", "rush00");
	mysqli_multi_query($mysqli, "INSERT INTO user (ID, name, passwd, admin) VALUES (NULL, '".mysqli_real_escape_string($mysqli,$login)."', '".mysqli_real_escape_string($mysqli,$passwd)."', '0'); SELECT user.name FROM user WHERE user.ID = LAST_INSERT_ID();");
	$query = mysqli_use_result($mysqli);
	mysqli_next_result($mysqli);
	$query = mysqli_fetch_assoc(mysqli_use_result($mysqli))['name'];
	return $query;
}

function	new_pass($user, $newpass)
{
	$mysqli = mysqli_connect("localhost", "root", "123456", "rush00");
	$sql = "UPDATE user SET passwd = '" .mysqli_real_escape_string($mysqli,$newpass). "' WHERE name = '" .mysqli_real_escape_string($mysqli,$user). "'";
	$res = mysqli_query($mysqli, $sql);
}

function	new_log($user, $newlog)
{
	$mysqli = mysqli_connect("localhost", "root", "123456", "rush00");
	$sql = "UPDATE user SET name = '" .mysqli_real_escape_string($mysqli,$newlog). "' WHERE name = '" .mysqli_real_escape_string($mysqli,$user). "'";
	$res = mysqli_query($mysqli, $sql);

}

function del_client($user)
{
	$mysqli = mysqli_connect("localhost", "root", "123456", "rush00");
	$query = mysqli_query($mysqli, "DELETE FROM user WHERE user.name = '".$user."'");
}
?>
