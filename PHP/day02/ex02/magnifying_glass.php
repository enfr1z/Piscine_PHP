#!/usr/bin/php
<?php
	function str_to_up($matches) {
		return str_replace($matches[1], strtoupper($matches[1]), $matches[0]);
	}
	if ($argc == 2)
	{
		$file = fopen($argv[1], 'r');
		while (!feof($file))
		{
			$line = fgets($file);
			$line = preg_replace_callback('/<a.*?title="(.*?)">/', "str_to_up", $line);
			$line = preg_replace_callback('/<a.*?>(.*?)</', "str_to_up" ,$line);
            echo $line;
		}
	}
?>