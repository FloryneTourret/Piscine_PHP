<?php 

Class NightsWatch implements IFighter {
    public function recruit($man)
    {
        if ($man instanceof IFighter)
            $this->array[] = $man;
    }
    function fight()
    {
        foreach ($this->array as $man) {
            if (method_exists(get_class($man), 'fight'))
                $man->fight();
        }
    }
}

?>