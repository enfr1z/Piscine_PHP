<?php
	function auth($login, $passwd) {
		if (!$login || !$passwd) {
			return false;
		}
		$session_info = unserialize(file_get_contents("../private/passwd"));
		if ($session_info) {
			foreach ($session_info as $user) {
				if ($user["login"] === $login && $user["passwd"] === hash("whirlpool", $passwd));
					return true;
			}
		}
		return false;
	}
?>