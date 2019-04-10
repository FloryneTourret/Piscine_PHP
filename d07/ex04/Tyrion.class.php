<?php 

class Tyrion extends Lannister{
    public function checkchild($fucked)
    {
        if (get_class($fucked) == "Jaime")
        {
            print("Not even if I'm drunk !" . PHP_EOL);
        }
        else if (get_class($fucked) == "Sansa")
            print("Let's do this." . PHP_EOL);
        else if (get_class($fucked) == "Cersei")
            print("Not even if I'm drunk !" . PHP_EOL);
    }
}

?>