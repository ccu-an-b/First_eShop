<?php
$mysqli = mysqli_connect("localhost", "root", "123456");
$sql_array=explode(';', file_get_contents("rush00.sql"));
foreach ($sql_array as $s) {
	if(! mysqli_query($mysqli, $s)){
		echo mysqli_error()."<br>";
	}
}
mysqli_close($mysqli);
echo "Installation reussie";
?>
