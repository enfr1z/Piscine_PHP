#!usr/bin/php
<?php

	function ft_split($string)
	{
		return (array_values(array_filter(explode(" ", $string))));
	}
?>