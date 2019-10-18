#!/usr/bin/php

<?php
	if ($argc > 1)
	{
		for ($i = 0; $i < $argc; $i++)
		{
			$str = trim(preg_replace('/\s+/', ' ', $argv[1]));
			$dell_space = explode(" ", $str);
		}
		for ($i = 1; $i < count($dell_space); $i++)
			echo $dell_space[$i] . " ";
		echo $dell_space[0] . "\n";
	}
?>