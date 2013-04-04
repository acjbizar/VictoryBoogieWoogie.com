<?php

// Include the core code.
require_once 'core.php';

// Call the SVG object and set properties. The content will be the victory composition.
$svg = new ScalableVectorGraphic;
$svg->width = WIDTH;
$svg->height = HEIGHT;
$svg->content = draw_victory();

// Make it happen.
$svg->parse();
$svg->save();
