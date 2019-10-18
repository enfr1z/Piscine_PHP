<?php
	session_start();
	if (!($_SESSION['logged_on_user']))
		echo "ERROR\n";
	else {
		if ($_POST['msg']) {
			if (!file_exists('../private')) {
				mkdir("../private");
			}
			if (!file_exists('../private/chat')) {
				file_put_contents('../private/chat', null);
			}
			$chat = unserialize(file_get_contents('../private/chat'));
			$fp = fopen('../private/chat', "w");
			flock($fp, LOCK_EX);
			$tmp['login'] = $_SESSION['logged_on_user'];
			$tmp['time'] = time();
			$tmp['msg'] = $_POST['msg'];
			$chat[] = $tmp;
			file_put_contents('../private/chat', serialize($chat));
			fclose($fp);
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
    <script language="javascript">
        top.frames['chat'].location = 'chat.php';
    </script>
</head>
<body>
<form action="." method="post">
    <input type="text" name="msg" placeholder="Message">
    <button type="submit">Send</button>
</form>
</body>
</html>