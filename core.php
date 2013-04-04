<?php

// Define dimensions.
define('WIDTH', 512);
define('HEIGHT', WIDTH);

// Function that handles the actual composition.
function draw_victory()
{
    $x = $y = 0;

    $stripes = $lines = array();

    $r = '';

    // Populate stripes array while the left position is smaller than the width of the canvas.
    while($x < WIDTH)
    {
        $col_width = mt_rand(32, 80);

        $stripes[] = array($x, $x + $col_width);

        $x += $col_width;
    }

    // Count the number of rows.
    $cols = count($stripes);

    // Populate lines array while the top position is smaller than the height of the canvas.
    while($y < HEIGHT)
    {
        $row_height = mt_rand(32, 112);

        $lines[] = array($y, $y + $row_height);

        $y += $row_height;
    }

    // Count the number of rows.
    $rows = count($lines);

    // Set the grid array.
    $grid = array();
    // Set the grid array counter.
    $g = 0;

    // Set the color filter to an empty array.
    $filters = array();

    foreach($stripes as $stripe)
    {
        foreach($lines as $line)
        {
            // Make sure white and light grey blocks happen more often by bypassing regular procedures 25% of the time.
            if(random_float() > .75)
            {
                $color = '#f6f4e7';
            }
            else
            {
                // Make sure a big block is never black by setting the filter.
                $filter = array('#090913' => '#090913');

                // Make sure a big block never has the same color as the block left from it.
                if(isset($grid[$g - 1]))
                {
                    $filter[$grid[$g - 1][4]] = $grid[$g - 1][4];
                }
                
                // Make sure a big block never has the same color as the block above it.
                if(isset($grid[$g - $rows]))
                {
                    $filter[$grid[$g - $rows][4]] = $grid[$g - $rows][4];
                }

                // Choose a semi-random color.
                $color = random_color($filter);
            }

            // Choose a second color for possible later use.
            $filter[$color] = $color;
            $color2 = random_color($filter);

            // Populate the grid array();
            $grid[$g] = array($stripe[0], $line[0], $stripe[1], $line[1], $color, $color2);

            $g++;
        }
    }

    // Draw a rectangle for every block in the grid.
    foreach($grid as $field)
    {
        $rect = new Rect;
        $rect->fill = $field[4];
        $rect->x = $field[0];
        $rect->y = $field[1];
        $rect->width = $field[2] - $field[0];
        $rect->height = $field[3] - $field[1];

        $r .= $rect;

        // Sometimes draw a somewhat smaller block on top of one.
        if(random_float() > .75)
        {
            $rect = new Rect;
            $rect->fill = $field[5];

            $rect->x = $field[0];
            $rect->y = $field[1];

            // Sometimes orient the block horizontally and sometimes vertically.
            if(random_float() > .5)
            {
                $rect->width = $field[2] - $field[0];
                $rect->height = round(($field[3] - $field[1]) / mt_rand(1.8, 2.2));
            }
            else
            {
                $rect->width = round(($field[2] - $field[0]) / mt_rand(1.8, 2.2));
                $rect->height = $field[3] - $field[1];
            }

            $r .= $rect;
        }
        else
        {
            //Draw a smaller one on top of of a block... sometimes.
            if(random_float() > .75)
            {
                $rect = new Rect;
                // Make sure the color of the small block is never the same as the one behind it.
                $rect->fill = random_color(array($field[4] => $field[4]));
                $rect->width = mt_rand(9, 16);
                $rect->height = mt_rand(9, 16);
                $rect->x = round($field[0] + ($field[2] - $field[0]) / 2 - $rect->width / 2);
                $rect->y = round($field[1] + ($field[3] - $field[1]) / 2 - $rect->height / 2);

                $r .= $rect;
            }
        }
    }

    foreach($stripes as $stripe)
    {
        if(random_float() > .25)
        {
            $coords = array_rand($lines, 2);
            $length = $lines[$coords[1]][0] - $lines[$coords[0]][0];
            $y = 0;
            $block_width = mt_rand(7, 10);

            while($y < $length)
            {
                $block_height = mt_rand(3, 11);

                if($lines[$coords[0]][0] + $y + $block_height > $lines[$coords[1]][0])
                {
                    $block_height += $lines[$coords[1]][0] - ($lines[$coords[0]][0] + $y + $block_height);
                }

                // Make sure a color of a little block is never the same as the previous.
                $color = isset($color) ? random_color(array($color => $color)) : random_color(array('#d2d2c3' => '#d2d2c3'));

                $rect = new Rect;
                $rect->fill = $color;
                $rect->x = $stripe[1];
                $rect->y = $lines[$coords[0]][0] + $y;
                $rect->height = $block_height;
                $rect->width = $block_width;

                $r .= $rect;

                $y += $block_height;
            }
        }
    }

    foreach($lines as $line)
    {
        if(random_float() > .25)
        {
            $coords = array_rand($stripes, 2);
            $length = $stripes[$coords[1]][0] - $stripes[$coords[0]][0];
            $x = 0;
            $block_height = mt_rand(7, 10);

            while($x < $length)
            {
                $block_width = mt_rand(4, 12);

                if($stripes[$coords[0]][0] + $x + $block_width - 1 > $stripes[$coords[1]][0])
                {
                    $block_width += $stripes[$coords[1]][0] - ($stripes[$coords[0]][0] + $x + $block_width);
                }

                // Make sure a color of a little block is never the same as the previous.
                $color = isset($color) ? random_color(array($color => $color)) : random_color(array('#d2d2c3' => '#d2d2c3'));

                $rect = new Rect;
                $rect->fill = $color;
                $rect->x = $stripes[$coords[0]][0] + $x;
                $rect->y = $line[1];
                $rect->height = $block_height;
                $rect->width = $block_width;

                $r .= $rect;

                $x += $block_width;
            }
        }
    }

    return $r;
}

// Return random color. Can be filtered to exclude certain colors.
function random_color($filter = array())
{
    $colors = array(
        '#f6f4e7' => '#f6f4e7', // white
        '#dc0d07' => '#dc0d07', // red
        '#ab0809' => '#ab0809', // dark red
        '#f2dd12' => '#f2dd12', // yellow
        '#d3a512' => '#d3a512', // dirty yellow
        '#1834c3' => '#1834c3', // blue
        '#1923a9' => '#1923a9', // deep blue
        '#dde0d5' => '#dde0d5', // grey
        '#d2d2c3' => '#d2d2c3', // also grey
        '#afb2a9' => '#afb2a9', // dark grey
        '#090913' => '#090913' // black
    );

    foreach($filter as $key => $value)
    {
        unset($colors[$key]);
    }

    return $colors[array_rand($colors)];
}

// Return a number between 0 and 1.
function random_float($min = 0, $max = 1)
{
    return $min + mt_rand() / mt_getrandmax() * ($max - $min);
}

// ACJ 24-1-2013
// An abstract class that handles some generic processes like overloading.
abstract class aThing
{
    // ACJ 24-1-2013
    public function __get($key)
    {
        return FALSE;
    }

    // ACJ 24-1-2013
    public function __set($key, $value = NULL)
    {
        $this->$key = $value;
    }

    // ACJ 24-1-2013
    public function __toString()
    {
        return print_r($this, TRUE);
    }

    // ACJ 24-1-2013
    public function get($key)
    {
        return $this->$key;
    }

    // ACJ 24-1-2013
    public function set($key, $value = NULL)
    {
        $this->$key = $value;
    }
}

// ACJ 24-1-2013
// The rectangle object.
class Rect extends aThing
{
    // ACJ 24-1-2013
    // Make sure the object is converted to a string in XML format when echood.
    public function __toString()
    {
        $r = '<rect';
        if($this->fill) $r .= ' fill="' . $this->fill . '"';
        if($this->height) $r .= ' height="' . $this->height . '"';
        if($this->width) $r .= ' width="' . $this->width . '"';
        if($this->x) $r .= ' x="' . $this->x . '"';
        if($this->y) $r .= ' y="' . $this->y . '"';
        $r .= '/>';

        return $r;
    }
}

// ACJ 2-3-2013
// The SVG (Scalable Vector Graphics) object. A vector format defined in XML.
class ScalableVectorGraphic extends aThing
{
    public $content = '';
    public $version = '1.1';

    // ACJ 2-3-2013
    // Make sure the object is converted to a string in XML format when echood.
    public function __toString()
    {
        $r = '<?xml version="1.0" standalone="no"?>';
        $r .= '<svg width="' . $this->width . '" height="' . $this->height . '" version="' . $this->version . '" xmlns="http://www.w3.org/2000/svg">';
        $r .= $this->content;
        $r .= '</svg>';

        return $r;
    }

    // ACJ 2-3-2013
    // Send the proper headers and then echo the object.
    public function parse()
    {
        header('Content-Type: image/svg+xml');

        echo $this;
    }

    // Make it possible to save the XML to a file.
    public function save()
    {
        file_put_contents('index.' . time() . '.svg', $this);
    }
}



