<?php 

abstract class Fighter {
    abstract public function fight($target);
    public function __construct($type)
    {
        $this->type = $type;
    }
}

?>