<?php
	$login = "zaz";
	$password = "jaimelespetitsponeys";
	if ($_SERVER["PHP_AUTH_USER"] === $login &&
		$_SERVER["PHP_AUTH_PW"] === $password) {
		header("HTTP/1.0 200 Authorized");
		$img = base64_encode(file_get_contents("../img/42.png"));
		echo "<html><body>\n";
		echo "Hello $login<br />\n";
		echo "<img src='data:image/png;base64, $img'>\n";
		echo "</body></html>\n";
	}
	else {
		header("WWW-Authenticate: Basic realm=\"Member area\"");
		header("HTTP/1.0 401 Unauthorized");
		echo "<html><body>That area is accessible for members only</body></html>\n";
	}
?>