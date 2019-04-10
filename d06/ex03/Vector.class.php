<?php

require_once('Color.class.php');
require_once('Vertex.class.php');

Class Vector{


    private $_x;
    private $_y;
    private $_Z;
    private $_w;

    public $dest = [];

    public static $verbose = False;
    public function __construct( array $coord )
    {
        if ( array_key_exists('orig', $coord ))
            $orig = $coord['orig'];
        else
            $orig = new Vertex( array('x' => 0, 'y' => 0, 'z' => 0, 'w' => 1) );
        if ( array_key_exists('dest', $coord ))
        {
            $this->dest = $coord['dest'];
            $this->_x = $this->dest->getX() - $orig->getX();
            $this->_y = $this->dest->getY() - $orig->getY();
            $this->_z = $this->dest->getZ() - $orig->getZ();
        }
        if (self::$verbose == True)
            printf("Vector( x: %3.2f, y: %3.2f, z:%3.2f, w:%3.2f ) constructed\n", $this->_x, $this->_y, $this->_z, $this->_w );
    }

    public function __destruct ()
    {
        if (self::$verbose == True)
            printf( "Vector( x: %3.2f, y: %3.2f, z:%3.2f, w:%3.2f ) destructed\n", $this->_x, $this->_y, $this->_z, $this->_w );
    }

    public static function doc()
    {
        return (file_get_contents("Vector.doc.txt", "r"));
    }

    public function __toString()
    {
        $r_string = sprintf("Vector( x: %3.2f, y: %3.2f, z:%3.2f, w:%3.2f )", $this->_x, $this->_y, $this->_z, $this->_w );
        return ("$r_string");
    }

    public function magnitude()
    {
        return ( sqrt( $this->_x * $this->_x + $this->_y * $this->_y + $this->_z * $this->_z ) );
    }

    public function normalize()
    {
        $norm = new Vertex(array( 'x' => $this->_x / $this->magnitude(), 'y'  => $this->_y / $this->magnitude(), 'z'  => $this->_z / $this->magnitude() )) ;
        return (new Vector ( array( 'dest' => $norm) ) );
    }

    public function add(Vector $vct2)
    {
        $dest_add = new Vertex( array ('x' => $vct2->dest->getX() + $vct2->getX(), 'y' => $vct2->dest->getY() + $vct2->getY(), 'z' => $vct2->dest->getZ() + $vct2->getZ()) );
        return (new Vector( array( 'dest' => $dest_add) ) ) ;
    }

    public function sub(Vector $vct2)
    {
        $dest_sub = new Vertex( array ('x' => $vct2->dest->getX() - $vct2->getX(), 'y' => $vct2->dest->getY() - $vct2->getY(), 'z' => $vct2->dest->getZ() - $vct2->getZ()) );
        return (new Vector( array( 'dest' => $dest_sub) ) ) ;
    }

    public function opposite()
    {
        $opposite = new Vertex( array( 'x' => - $this->getX(), 'y' => - $this->getY(), 'z' => - $this->getZ()));
        return (new Vector ( array( 'dest' => $opposite)));
    }

    public function scalarProduct( $coeff )
    {
        $dest_coeff = new Vertex( array ('x' => $this->getX() * $coeff, 'y' => $this->getY() * $coeff , 'z' => $this->getZ() * $coeff ) );
        return (new Vector( array( 'dest' => $dest_coeff) ) );
    }

    public function dotProduct(Vector $vct2 )
    {
        $total = $vct2->dest->getX() * $vct2->getX();
        $total += $vct2->dest->getY() * $vct2->getY();
        $total += $vct2->dest->getZ() * $vct2->getZ();
        return($total);
    }

    public function cos(Vector $vct2 )
    {
        return ($this->_x * $vct2->_x + $this->_y * $vct2->_y + $this->_z * $vct2->_z) /
            sqrt(($this->_x * $this->_x + $this->_y * $this->_y + $this->_z * $this->_z) * ($vct2->_x * $vct2->_x +
                $vct2->_y * $vct2->_y + $vct2->_z * $vct2->_z));
    }

    public function crossProduct(Vector $vct2 )
    {
        $ux = $this->getX();
        $uy = $this->getY();
        $uz = $this->getZ();
        $vx = $vct2->getX();
        $vy = $vct2->getY();
        $vz = $vct2->getZ();
        $dest_prod = new Vertex( array ('x' => $uy * $vz - $uz * $vy , 'y' => $uz * $vx - $ux * $vz, 'z' => $ux * $vy - $uy * $vx) );
        return (new Vector( array( 'dest' => $dest_prod)));
    }

    public function getX()
    {
        return $this->_x;
    }
    public function getY()
    {
        return $this->_y;
    }
    public function getZ()
    {
        return $this->_z;
    }
    public function getW()
    {
        return $this->_w;
    }
}