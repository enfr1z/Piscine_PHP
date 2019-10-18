<?php
	
	function set_cookie() {
		setcookie($_GET["name"], $_GET["value"], time()+3600);
	}
	
	function get_cookie() {
		echo $_COOKIE[$_GET["name"]] . "\n";
	}
	
	function del_cookie() {
		setcookie($_GET["name"], $_GET["value"], time()-1);
	}
	
	switch ($_GET["action"]) {
		case "set":
			set_cookie();
			break ;
		case  "get":
			get_cookie();
			break ;
		case "del":
			del_cookie();
			break;
	}
?>