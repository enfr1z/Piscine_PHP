<?php
	function validate() {
		if ($_POST["login"] === "" ||
			$_POST["oldpw"] === "" ||
			$_POST["newpw"] === "" ||
			$_POST["submit"] !== "OK")
			return false;
		else
			return true;
	}
	function check_user($session_data, $user) {
		if ($session_data["login"] === $user["login"] &&
			$session_data["passwd"] === $user["oldpw"] &&
			$session_data["passwd"] !== $user["newpw"])
			return true;
		else
			return false;
	}
	if (!validate())
	{
		echo "ERROR\n";
		exit (1);
	}
	$session_data = unserialize(file_get_contents("../private/passwd"));
	$user = [
		"login" => $_POST["login"],
		"oldpw" => hash("whirlpool", $_POST["oldpw"]),
		"newpw" => hash("whirlpool", $_POST["newpw"])
	];
	foreach ($session_data as &$data) {
		if ($data["login"] === $user["login"]) {
			if (check_user($data, $user)) {

				$data["passwd"] = $user["newpw"];
				file_put_contents("../private/passwd", serialize($session_data));
				echo "OK\n";
				exit (0);
			} else {
				echo "ERROR\n";
				exit (1);
			}
		}
	}
?>