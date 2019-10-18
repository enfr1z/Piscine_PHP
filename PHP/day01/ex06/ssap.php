#!/usr/bin/php

<?php

	function ft_split($string)
	{
		$array = array_values(array_filter(explode(" ", $string)));
		sort($array);
		return ($array);
	}

	if ($argc > 1)
	{
		$arr = array();
		for ($i = 1; $i < $argc; $i++)
		{
			$str = trim(preg_replace('/\s+/', ' ', $argv[$i]));
			$split = ft_split($str);
			for($j = 0; $j < count($split); $j++)
			{
				$word = array_push($arr, $split[$j]);
			}
			sort($arr);
		}
		foreach($arr as $word)
        	echo $word . "\n";
	}
?>