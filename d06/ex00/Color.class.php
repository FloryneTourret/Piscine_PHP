<?php

Class Color{

    public $red = 0;
    public $green = 0;
    public $blue = 0;

    public static $verbose = FALSE;

    public function __construct(array $rgb){

        if (array_key_exists('rgb', $rgb))
        {
            $this->red = ($rgb['rgb'] / (256*256))%256;
            $this->green = ($rgb['rgb'] /256) % 256;
            $this->blue = $rgb['rgb'] % 256;
        }
        else{
            if(array_key_exists('red', $rgb))
                $this->red = $rgb['red'];
            if(array_key_exists('green', $rgb))
                $this->green = $rgb['green'];
            if(array_key_exists('blue', $rgb))
                $this->blue = $rgb['blue'];
        }
        if (self::$verbose == True)
        {
            printf('Color( red: '.$this->red.', green: '.$this->green.', blue: '.$this->blue.' ) constructed.'."\n");
        }
    }

    public function doc()
    {
        return (file_get_contents('Color.doc.txt', "r"));
    }

    public function __toString()
    {
        $res = sprintf('Color( red: '.$this->red.', green: '.$this->green.', blue: '.$this->blue.' )');
        return ($res);
    }
    public function add($color)
    {
        $colorred = $color->red + $this->red;
        $colorgreen = $color->green + $this->green;
        $colorblue = $color->blue + $this->blue;

        $new = new Color(array('red' => $colorred, 'green' => $colorgreen, 'blue' => $colorblue));

        return ($new);
    }

    public function __destruct()
    {
        if (self::$verbose == FALSE)
        {
            printf('Color( red: '.$this->red.', green: '.$this->green.', blue: '.$this->blue.' ) destructed.'."\n");
        }
    }
}