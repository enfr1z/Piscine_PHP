<?php
	if ($_POST["login"] === "" || $_POST["passwd"] === "" || $_POST["submit"] !== "OK") {
		echo "ERROR\n";
		exit (1);
	}
	if (!file_exists("../private") || !file_exists("../private/passwd")) {
		mkdir("../private");
	}
	if (file_exists("../private/passwd")) {
		$session_data = unserialize(file_get_contents("../private/passwd"));
		foreach ($session_data as $user)
			if ($user["login"] === $_POST["login"]) {
				echo "ERROR\n";
				exit (1);
		}
	}
	$user = [
		"login" => $_POST["login"],
		"passwd" => hash("whirlpool", $_POST["passwd"])
	];
	$session_data[] = $user;
	file_put_contents("../private/passwd", serialize($session_data));
	header('Location: index.html');
	echo  "OK\n";
?>