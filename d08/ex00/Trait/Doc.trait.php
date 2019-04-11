<?php
trait Doc {
    public static function doc() {
        $className = static::class;
        $docname = "./Class/" . $className . ".doc.txt";
        if (file_exists($docname))
            $str = file_get_contents($docname);
        else
            $str = "Impossible de récupérer la documentation.";
        return ($str);
    }
}
?>