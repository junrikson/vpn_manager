<?php
	include_once './db_connect.php';
	include_once './functions.php'; 

	sec_session_start();
	$code=rand(100000,999999);
	$_SESSION["code"]=$code;
	$width = 75;
    $height = 34; 

    //Create the image resource 
    $image = ImageCreate($width, $height);  

    //We are making three colors, white, black and gray
    $white = ImageColorAllocate($image, 255, 255, 255);
    $black = ImageColorAllocate($image, 0, 0, 0);
    $grey = ImageColorAllocate($image, 204, 204, 204);

    //Make the background black 
    ImageFill($image, 0, 0, $black); 
	$x = rand(3,4);
	$y = rand(1,25);
	$z = rand(1,17);
    //Add randomly generated string in white to the image
    ImageString($image, $x, $y, $z, $code, $white); 

    //Throw in some lines to make it a little bit harder for any bots to break 
    ImageRectangle($image,0,0,$width-1,$height-1,$grey); 
    imageline($image, $z, $height/$x, $width, $height/$y, $grey); 
    imageline($image, $width/$z, $y, $width/$x, $height, $grey); 
 
    //Tell the browser what kind of file is come in 
    header("Content-Type: image/jpeg"); 

    //Output the newly created image in jpeg format 
    ImageJpeg($image);
   
    //Free up resources
    ImageDestroy($image); 
?>