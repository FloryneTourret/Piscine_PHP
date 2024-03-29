<?php
class Flotte implements Iterator {
    use Doc;

    private $_vaisseaux;
    private $_iter;

    public function __construct($nb, $xinit, $yinit, $dir) {
        $this->_vaisseaux[] = new Fox($xinit, $yinit, $dir);
        $this->_vaisseaux[] = new Fox($xinit, $yinit, $dir);
    }

    public function rewind() {
        $this->_iter = 0;
    }
    
    public function next() {
        $this->_iter++;
    }

    public function key() {
        return $this->_iter;
    }

    public function current() {
        return $this->_vaisseaux[$this->_iter];
    }

    public function valid() {
        return $this->_iter < sizeof($this->_vaisseaux);
    }

    public function getVaisseau($index) { 
        return ($this->_vaisseaux[$index]); 
    }

    public function getSize() {
        $cpt = 0;
        foreach ($this->_vaisseaux as $key => $vaisseau) {
            $cpt++;
        }
        return ($cpt);
    }
    
    public function update() {
        foreach ($this->_vaisseaux as $nb => $vaisseau) {
            if ($vaisseau->getVie() <= 0)
                unset($this->_vaisseaux[$nb]);
        }
    }
}
?>