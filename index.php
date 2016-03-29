<?php
/**
 * test
 */

include './image.class.php';

//include 'config.php';

$image = new Image();

//print_r($config);

$bgimg = 'img/bgimg.png';
$header = 'qrcode/mly.png';
$image->createImg($bgimg, $header);


