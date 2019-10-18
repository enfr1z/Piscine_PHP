<?php

require_once 'ex00/Color.class.php';

class Vector
{
    private $_x;
    private $_y;
    private $_z;
    private $_w = 0.0;
    static public $verbose = false;
    public function __construct($vectors)
    {
        if (!array_key_exists("dest", $vectors) || !($vectors['dest'] instanceof Vertex) ||
            array_key_exists("orig", $vectors) && !($vectors['orig'] instanceof Vertex))
            return false;
        else if (!array_key_exists("orig", $vectors))
            $vectors['orig'] = new Vertex(['x' => 0, 'y' => 0, 'z' => 0, 'w' => 1]);
        $this->_x = $vectors['dest']->getX() - $vectors['orig']->getX();
        $this->_y = $vectors['dest']->getY() - $vectors['orig']->getY();
        $this->_z = $vectors['dest']->getZ() - $vectors['orig']->getZ();
        if (self::$verbose)
            echo $this->__toString() . ' constructed' . PHP_EOL;
        return true;
    }
    public function __destruct()
    {
        if (self::$verbose)
            echo $this->__toString() . ' destructed' . PHP_EOL;
    }
    public function __toString()
    {
        return vsprintf("Vector( x: %0.2f, y: %0.2f, z: %0.2f, w: %0.2f )", array($this->_x, $this->_y, $this->_z, $this->_w));
    }
    public function magnitude()
    {
        return sqrt($this->_x * $this->_x + $this->_y * $this->_y + $this->_z * $this->_z);
    }
    public function normalize()
    {
       return $this->div($this->magnitude());
    }
    public function add(Vector $rhs)
    {
        $x = $this->_x + $rhs->getX();
        $y = $this->_y + $rhs->getY();
        $z = $this->_z + $rhs->getZ();
        return new Vector(['dest' => new Vertex(compact('x', 'y', 'z'))]);
    }
    public function sub(Vector $rhs)
    {
        $x = $this->_x - $rhs->getX();
        $y = $this->_y - $rhs->getY();
        $z = $this->_z - $rhs->getZ();
        return new Vector(['dest' => new Vertex(compact('x', 'y', 'z'))]);
    }
    private function div($nb)
    {
        $nb = ($nb > 0 ? $nb : 1);
        $x = $this->_x / $nb;
        $y = $this->_y / $nb;
        $z = $this->_z / $nb;
        return new Vector(['dest' => new Vertex(compact('x', 'y', 'z'))]);
    }
    public function opposite()
    {
        $x = -1 * $this->_x;
        $y = -1 * $this->_y;
        $z = -1 * $this->_z;
        return new Vector(['dest' => new Vertex(compact('x', 'y', 'z'))]);
    }
    public function scalarProduct($k)
    {
        $x = $this->_x * $k;
        $y = $this->_y * $k;
        $z = $this->_z * $k;
        return new Vector(['dest' => new Vertex(compact('x', 'y', 'z'))]);
    }
    public function dotProduct(Vector $rhs)
    {
        return ($this->_x * $rhs->getX() + $this->_y * $rhs->getY() + $this->_z * $rhs->getZ());
    }
    public function cos(Vector $rhs)
    {
        return $this->dotProduct($rhs) / ($this->magnitude() * $rhs->magnitude());
    }
    public function crossProduct(Vector $rhs)
    {
        $x = $this->_y * $rhs->getZ() - $rhs->getY() * $this->_z;
        $y = $this->_z * $rhs->getX() - $this->_x * $rhs->getZ();
        $z = $this->_x * $rhs->getY() - $this->_y * $rhs->getX();
        return new Vector(['dest' => new Vertex(compact('x', 'y', 'z'))]);
    }
    static public function doc()
    {
        return file_get_contents('ex02/Vector.doc.txt') . PHP_EOL;
    }
    public function getX()
    {
        return $this->_x;
    }
    public function getY()
    {
        return $this->_y;
    }
    public function getZ()
    {
        return $this->_z;
    }
    public function getW()
    {
        return $this->_w;
    }
    public function __get($name)
    {
        return false;
    }
    public function __set($name, $value)
    {
        return false;
    }
}
?>