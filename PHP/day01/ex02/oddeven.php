#!/usr/bin/php

<?php
	while (21)
	{
		echo "Enter a number: ";
		$param = trim(fgets(STDIN));
		if (feof(STDIN))
		{
			echo "\n";
			exit();
		}
		if (is_numeric($param))
		{
			if ($param % 2 == 0)
				echo "The number " . $param . " is even.\n";
			else
				echo "The number " . $param . " is odd.\n";
		}
		else
			echo "'" . $param . "'" . " is not a number.\n";
	}
?>