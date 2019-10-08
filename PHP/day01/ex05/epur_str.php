#!usr/bin/php

<?php
	if ($argc > 1)
	{
		$trim_str = trim($argv[1]);
		$str = preg_replace('/\s\s+/', ' ', $trim_str);
		if ($str)
			echo "$str"."\n";
	}
?>