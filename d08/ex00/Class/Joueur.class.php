<?php
class Joueur {
    use Doc;
    
    private $_name;
    private $_flotte;
    private $_panneau;
    private $_partie;
    
    public function __construct($partie, $name, $nb, $xinit, $yinit, $dir) {
        $this->_name = $name;
        $this->_partie = $partie;
        $this->_flotte = new Flotte($nb, $xinit, $yinit, $dir);
        $this->_panneau = new Panneau($this);
    }
    
    public function getFlotte() { 
        return ($this->_flotte); 
    }
    public function getName() { 
        return ($this->_name); 
    }
    public function getPanneau() { 
        return ($this->_panneau); 
    }
    public function getPartie() { 
        return ($this->_partie); 
    }
    
    public function nouvPanneau() {
        $this->_panneau = new Panneau($this);
    }
}
?>