<?php

Class Color{

    public $red = 0;
    public $green = 0;
    public $blue = 0;

    public static $verbose = FALSE;

    public function __construct(array $rgb){

        if (array_key_exists('rgb', $rgb))
        {
            $this->red = round(($rgb['rgb'] / (256*256))%256);
            $this->green = round(($rgb['rgb'] /256) % 256);
            $this->blue = round($rgb['rgb'] % 256);
        }
        else{
            if(array_key_exists('red', $rgb))
                $this->red = round($rgb['red']);
            if(array_key_exists('green', $rgb))
                $this->green = round($rgb['green']);
            if(array_key_exists('blue', $rgb))
                $this->blue = round($rgb['blue']);
        }
        if (self::$verbose == True)
        {
            printf("Color( red: %3d, green: %3d, blue: %3d ) constructed.\n", $this->red, $this->green, $this->blue);
        }
    }

    public function doc()
    {
        return (file_get_contents('Color.doc.txt', "r"));
    }

    public function __toString()
    {
        $res = sprintf("Color( red: %3d, green: %3d, blue: %3d )", $this->red, $this->green, $this->blue);
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

    public function sub($color)
    {
        $colorred = $this->red - $color->red;
        $colorgreen = $this->green - $color->green;
        $colorblue = $this->blue - $color->blue;

        $new = new Color(array('red' => $colorred, 'green' => $colorgreen, 'blue' => $colorblue));

        return ($new);
    }

    public function mult($coef)
    {
        $colorred = $coef * $this->red;
        $colorgreen = $coef * $this->green;
        $colorblue = $coef * $this->blue;

        $new = new Color(array('red' => $colorred, 'green' => $colorgreen, 'blue' => $colorblue));

        return ($new);
    }

    public function __destruct()
    {
        if (self::$verbose == True)
            printf("Color( red: %3d, green: %3d, blue: %3d ) destructed.\n", $this->red, $this->green, $this->blue);
    }
}