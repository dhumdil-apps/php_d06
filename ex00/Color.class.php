<?php

class Color
{
    public static $verbose = False;

    public $red;
    public $green;
    public $blue;

    function __construct($color)
    {
        if (isset($color['rgb']))
        {
            $hex = base_convert(strval($color['rgb']), 10, 16);
            $n = 6 - strlen($hex);

            for ($i = 0; $i < $n; $i++)
            {
                $hex = '0' . $hex;
            }

            $v = str_split($hex, 2);

            $this->red = intval(base_convert(strval($v[0]), 16, 10));
            $this->green = intval(base_convert(strval($v[1]), 16, 10));
            $this->blue = intval(base_convert(strval($v[2]), 16, 10));
        }
        else
        {
             $this->red = intval($color['red']);
             $this->green = intval($color['green']);
             $this->blue = intval($color['blue']);
        }

        if (self::$verbose)
        {
            print( self::__toString() . " constructed." . PHP_EOL );
        }
    }

    public static function doc()
    {
        return ( file_get_contents("./Color.doc.txt") );
    }

    public function add($color)
    {
        $red = $this->red + $color->red;
        $green = $this->green + $color->green;
        $blue = $this->blue + $color->blue;

        return (new Color(array('red' => $red, 'green' => $green, 'blue' => $blue)));
    }

    public function sub($color)
    {
        $red = $this->red - $color->red;
        $green = $this->green - $color->green;
        $blue = $this->blue - $color->blue;

        return (new Color(array('red' => $red, 'green' => $green, 'blue' => $blue)));
    }

    public function mult($val)
    {
        $red = $this->red * $val;
        $green = $this->green * $val;
        $blue = $this->blue * $val;

        return (new Color(array('red' => $red, 'green' => $green, 'blue' => $blue)));
    }

    public function __toString()
    {
        $r_space = '';
        $g_space = '';
        $b_space = '';

        if ($this->red >= 0 && $this->red <= 9)
        {
            $r_space = '  ';
        }
        else if ($this->red >= 10 && $this->red <= 99)
        {
            $r_space = ' ';
        }

        if ($this->green >= 0 && $this->green <= 9)
        {
            $g_space = '  ';
        }
        else if ($this->green >= 10 && $this->green <= 99)
        {
            $g_space = ' ';
        }

        if ($this->blue >= 0 && $this->blue <= 9)
        {
            $b_space = '  ';
        }
        else if ($this->blue >= 10 && $this->blue <= 99)
        {
            $b_space = ' ';
        }

        return ("Color( red: " . $r_space . $this->red . ", green: ". $g_space  . $this->green . ", blue: ". $b_space . $this->blue . " )");
    }

    function __destruct()
    {
        if (self::$verbose)
        {
            print( self::__toString() . " destructed." . PHP_EOL );
        }
    }
}