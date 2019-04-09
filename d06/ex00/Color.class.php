<?php

Class Color{

    public $red = 0;
    public $green = 0;
    public $blue = 0;

    public static $verbose = FALSE;

    public function __construct( array $rgb){

        if (array_key_exist('rgb', $rgb))
        {
            $this->red = ($kwargs['rgb'] / (256*256))%256;
            $this->green = ($kwargs['rgb'] /256) % 256;
            $this->blue = $kwargs['rgb'] % 256;
        }
        else{
            if(array_key_exist('red', $rgb))
                $this->red = $rgb['red'];
            if(array_key_exist('green', $rgb))
                $this->green = $rgb['green'];
            if(array_key_exist('blue', $rgb))
                $this->blue = $rgb['blue'];
        }

    }
}