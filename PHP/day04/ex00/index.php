<?php
	session_start();
	if ($_GET["submit"] == "OK") {
		$_SESSION["login"] = $_GET["login"];
		$_SESSION["passwd"] = $_GET["passwd"];
	}
?>

<html><body>
<form method="get" action=".">
    Username: <input type="text" name="login" value="<?=$_SESSION["login"]?>"/>
    <br />
    Password: <input type="password" name="password" value="<?=$_SESSION["passwd"]?>"/>
    <input type="button" name="submit" value="OK">
</form>
</body></html>