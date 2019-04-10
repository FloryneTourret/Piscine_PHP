<?php 

class Jaime extends Lannister {
    public function checkchild($fucked)
    {
        if (get_class($fucked) == "Tyrion")
        {
            print("Not even if I'm drunk !" . PHP_EOL);
        }
        else if (get_class($fucked) == "Sansa")
            print("Let's do this." . PHP_EOL);
        else if (get_class($fucked) == "Cersei")
            print("With pleasure, but only in a tower in Winterfell, then." . PHP_EOL);
    }
}

?>