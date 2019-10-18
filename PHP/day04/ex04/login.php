<?php
	require_once('auth.php');
	
	session_start();
	if ($_POST['login'] && $_POST['passwd'] && auth($_POST["login"], $_POST["passwd"])) {
		$_SESSION['logged_on_user'] = $_POST['login'];
		echo "OK\n";
	}
	else {
		$_SESSION['logged_on_user'] = "";
		echo "ERROR\n";
	    exit(1);
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>42chat</title>
</head>
<body>
<h1>
    42chat
</h1>

<a href="logout.php" style="float: right">Logout</a>

<iframe name="chat" src="chat.php" width="100%" height="550px"></iframe>
<iframe name="speak" src="speak.php" width="100%" height="50px"></iframe>

<script>
    setInterval(function () {
        frames['chat'].location = 'chat.php'
    }, 5000) // 5 sec
</script>
</body>
</html>