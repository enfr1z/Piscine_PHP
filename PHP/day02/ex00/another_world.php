#!/usr/bin/php
<?php
	for ($i = 1; $i < count($argv); $i++)
		$str = trim(preg_replace('/\s+/', ' ' , $argv[1]));
	echo "$str\n";
?>