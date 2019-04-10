<?php 

Class UnholyFactory{

    private $list = array();

    public function absorb($type)
    {
        if (is_subclass_of($type, 'Fighter'))
        {
            if (!in_array($type, $this->list))
            {
                print("(Factory absorbed a fighter of type ".$type->type.")" . PHP_EOL);
                $this->list[] = $type;
            }
            else
                print("(Factory already absorbed a fighter of type ".$type->type.")" . PHP_EOL);
        }  
        else
            print("(Factory can't absorb this, it's not a fighter)" . PHP_EOL);
    }
    public function fabricate($request)
    {
        if ($request == "foot soldier")
            $temp = "footsoldier";
        else
            $temp = $request;
        if (is_subclass_of($temp, 'Fighter'))
        {
            print("(Factory fabricates a fighter of type ".$request.")" . PHP_EOL);
            if($temp == "footsoldier")
                return ($this->list[0]);
            else if($temp == "archer")
                return ($this->list[1]);
            else if($temp == "assassin")
                return ($this->list[2]);
        }
        else
        {   
            print("(Factory hasn't absorbed any fighter of type ".$request.")" . PHP_EOL);
            return (null);
        }
    }
}

?>