<?php
abstract class Fighter
{
    public $type_soldier;
    abstract function fight($i);
    public function __construct($type_sol)
    {
        $this->type_varior = $type_sol;
    }
    public function getType()
    {
        return ($this->type_varior);
    }
}
?>