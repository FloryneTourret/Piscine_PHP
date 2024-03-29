<?php
class Obstacle {
    use Doc;
    
    private $_xpos;
    private $_ypos;
    private $_height;
    private $_width;
    
    public function __construct($x, $y, $w, $h) {
        $this->_xpos = $x;
        $this->_ypos = $y;
        $this->_width = $w;
        $this->_height = $h;
    }
    
    public function getXpos() { 
        return ($this->_xpos); 
    }
    public function getYpos() { 
        return ($this->_ypos); 
    }
    public function getHeight() { 
        return ($this->_height); 
    }
    public function getWidth() { 
        return ($this->_width); 
    }
}
?>