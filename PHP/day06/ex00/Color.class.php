<?php

class Color
{
	static public $verbose = false;
	public $red;
	public $green;
	public $blue;
	
	public function __construct(array $color)
	{
		if (array_key_exists('red', $color) && array_key_exists('green', $color) && array_key_exists('blue', $color))
		{
			$this->red = intval($color['red']);
			$this->green = intval($color['green']);
			$this->blue = intval($color['blue']);
		}
		else if (array_key_exists("rgb", $color))
		{
			$color['blue'] = $color['rgb'] & 0xFF;
			$color['green'] = ($color['rgb'] >> 8) & 0xFF;
			$color['red'] = ($color['rgb'] >> 16) & 0xFF;
		}
		if (self::$verbose)
			echo $this->__toString() . " constructed.\n";
		return true;
	}
	public function __destruct()
	{
		if (self::$verbose)
			echo $this->__toString() . " destructed.\n";
	}
	static public function doc()
	{
		return file_get_contents('./Color.doc.txt') . "\n";
	}
	public function __toString()
	{
		return vsprintf("Color( red: %3d, green: %3d, blue: %3d )", array($this->red, $this->green, $this->blue));
	}
	public function add(Color $color)
	{
		return new Color([
			'red' => $this->red + $color->red,
			'green' => $this->green + $color->green,
			'blue' => $this->blue + $color->blue
		]);
	}
	public function sub(Color $colors)
	{
		return new Color([
			'red' => $this->red - $colors->red,
			'green' => $this->green - $colors->green,
			'blue' => $this->blue - $colors->blue
		]);
	}
	public function mult($mult)
	{
		return new Color([
			'red' => $this->red * $mult,
			'green' => $this->green * $mult,
			'blue' => $this->blue * $mult
		]);
	}
}
?>