<?php

class Vertex
{
    public static $verbose = False;

    private $_x;
    private $_y;
    private $_z;
    private $_w;
    private $_color;

    function __construct($vertex)
    {
        $this->_x = $vertex['x'];
        $this->_y = $vertex['y'];
        $this->_z = $vertex['z'];
        $this->_w = (isset($vertex['w'])) ? $vertex['w'] : 1.0;
        $this->_color = (isset($vertex['color'])) ? $vertex['color'] : new Color(array('red' => 255, 'green' => 255, 'blue' => 255));

        if (self::$verbose)
        {
            print( self::__toString() . " constructed" . PHP_EOL );
        }
    }

    public static function doc()
    {
        return ( file_get_contents("./Vertex.doc.txt") );
    }

    public function getX()
    {
        return ($this->_x);
    }

    public function getY()
    {
        return ($this->_y);
    }

    public function getZ()
    {
        return ($this->_z);
    }

    public function getW()
    {
        return ($this->_w);
    }

    public function getColor()
    {
        return ($this->_color);
    }

    public function setX($x)
    {
        $this->_x = $x;
    }

    public function setY($y)
    {
        $this->_y = $y;
    }

    public function setZ($z)
    {
        $this->_z = $z;
    }

    public function setW($w)
    {
        $this->_w = $w;
    }

    public function setColor($color)
    {
        $this->_color = $color;
    }

    public function __toString()
    {
        $x = number_format($this->_x, 2);
        $y = number_format($this->_y, 2);
        $z = number_format($this->_z, 2);
        $w = number_format($this->_w, 2);
        $color = '';

        if (self::$verbose)
        {
            $color = ", " . $this->_color;
        }

        return ("Vertex( x: " . $x . ", y: " . $y . ", z:" . $z . ", w:" . $w . $color . " )");
    }

    function __destruct()
    {
        if (self::$verbose)
        {
            print( self::__toString() . " destructed" . PHP_EOL );
        }
    }
}
