<?php
abstract class Arme {
    use Doc;

    protected $_degat;
    protected $_portee;
    protected $_vaisseau;

    public function __construct($vaisseau) {
        $this->_vaisseau = $vaisseau;
    }
 
    
    public function getDegat() { return ($this->_degat); }
    public function getPortee() { return ($this->_portee); }
}
?>