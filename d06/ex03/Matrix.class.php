<?PHP

require_once ('Vertex.class.php');
require_once ('Vector.class.php');

Class Matrix
{

    const IDENTITY = 1;
    const SCALE = 2;
    const RX = 3;
    const RY = 4;
    const RZ = 5;
    const TRANSLATION = 6;
    const PROJECTION = 7;

    private $_vtcX;
    private $_vtcY;
    private $_vtcZ;
    private $_vtc0;

    public $dest = [];

    public static $verbose = False;

    public function __construct(array $kwargs )
    {
        if ( array_key_exists('preset', $kwargs ))
        {
            if ($kwargs['preset'] == self::IDENTITY)
            {
                private $_vtX = new Vertex( array ( 'x' => 1, 'y' => 0, 'z' => 0, 'w' => 0 ) );
                $this->_vtcX = new Vector( array( 'dest' => $_vtX ) );
                private $_vtY = new Vertex( array ( 'x' => 0, 'y' => 1, 'z' => 0, 'w' => 0 ) );
                $this->_vtcY = new Vector( array( 'dest' => $_vtY ) );
                private $_vtZ = new Vertex( array ( 'x' => 0, 'y' => 0, 'z' => 1, 'w' => 0 ) );
                $this->_vtcZ = new Vector( array( 'dest' => $_vtZ ) );
                private $_vtW = new Vertex( array ( 'x' => 0, 'y' => 0, 'z' => 0, 'w' => 1 ) );
                $this->_vtc0 = new Vector( array( 'dest' => $_vtW ) );
            }
            if ($kwargs['preset'] == self::SCALE)
            {

            }
            if ($kwargs['preset'] == self::RX)
            {

            }
            if ($kwargs['preset'] == self::RY)
            {

            }
            if ($kwargs['preset'] == self::RZ)
            {

            }
            if ($kwargs['preset'] == self::TRANSLATION)
            {

            }
            if ($kwargs['preset'] == self::PROJECTION)
            {

            }
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
        return (file_get_contents("Matrix.doc.txt", "r"));
    }

    public function __toString()
    {
        $r_string = sprintf("Vector( x: %3.2f, y: %3.2f, z:%3.2f, w:%3.2f )", $this->_x, $this->_y, $this->_z, $this->_w );
        return ("$r_string");
    }

    public function mult(Matrix $matrix)
    {
        // todo
    }

    public function transformVertex(Vertex $vertex)
    {
        // todo
    }
}