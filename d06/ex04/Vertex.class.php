<?php


require_once 'Color.class.php';

Class Vertex{

    private $_x = 0;
    private $_y = 0;
    private $_z = 0;

    private $_w = 1.0;

    public static $verbose = False;


    public function __construct( array $coord )
    {
        if ( array_key_exists('x', $coord ))
            $this->_x = $coord['x'];
        if ( array_key_exists('y', $coord ))
            $this->_y = $coord['y'];
        if ( array_key_exists('z', $coord ))
            $this->_z = $coord['z'];
        if ( array_key_exists('w', $coord ))
            $this->_w = $coord['w'];
        if ( array_key_exists('color', $coord ))
        {
            $this->_color = $coord['color'];
            $color_text = new Color((array)$this->color);
            $color_text = ", " . $color_text;
        }
        else
        {
            $color_text = new Color (
                array (
                    'red' => 255,
                    'green' => 255,
                    'blue' => 255 ) );
            $color_text = ", " . $color_text;
        }
        if (self::$verbose == True)
            printf("Vertex( x: %3.2f, y: %3.2f, z:%3.2f, w:%3.2f$color_text ) constructed\n", $this->_x, $this->_y, $this->_z, $this->_w );
    }


    public function __toString()
    {
        if (self::$verbose == True)
        {
            if ($this->color)
            {
                $color_text = new Color((array)$this->color);
                $color_text = ", " . $color_text;
            } else {
                $color_text = new Color(array('red' => 255, 'green' => 255, 'blue' => 255));
                $color_text = ", " . $color_text;
            }
        }
        $r_string = sprintf("Vertex( x: %3.2f, y: %3.2f, z:%3.2f, w:%3.2f$color_text )", $this->_x, $this->_y, $this->_z, $this->_w );
        return ("$r_string");
    }

    public static function doc()
    {
        return (file_get_contents("Vertex.doc.txt", "r"));
    }

    public function __destruct ()
    {
        if ( $this->color )
        {
            $color_text = new Color((array)$this->color);
            $color_text = ", ".$color_text;
        }
        else
        {
            $color_text =new Color(array( 'red' => 255, 'green' => 255, 'blue' => 255 ) );
            $color_text = ", ".$color_text;
        }
        if (self::$verbose == True)
            printf( "Vertex( x: %3.2f, y: %3.2f, z:%3.2f, w:%3.2f$color_text ) destructed\n", $this->_x, $this->_y, $this->_z, $this->_w );
    }

    public function getX()
    {
        return $this->_x;
    }
    public function setX($_x)
    {
        $this->_x = $_x;

        return $this;
    }

    public function getY()
    {
        return $this->_y;
    }
    public function setY($_y)
    {
        $this->_y = $_y;

        return $this;
    }

    public function getZ()
    {
        return $this->_z;
    }
    public function setZ($_z)
    {
        $this->_z = $_z;

        return $this;
    }
 
    public function getW()
    {
        return $this->_w;
    }
    public function setW($_w)
    {
        $this->_w = $_w;

        return $this;
    }

    public function getIndex($i) {
		if ( $i === 0 )
			return ( $this->_x );
		elseif ( $i === 1 )
			return ( $this->_y );
		elseif ( $i === 2 )
			return ( $this->_z );
		elseif ( $i === 3 )
			return ( $this->_w );
	}

    public function getColor()
    {
        return $this->_color;
    }
    public function setColor($c_olor)
    {
        $this->_color = new Color ($_color);

        return $this;
    }
}