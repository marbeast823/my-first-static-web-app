<?php

/**
 * @copyright GrayWolf [volkk@inbox.lv]
 */

$_CONFIG = array();

// The directory with the all include files.
$_CONFIG['basedir']  = 'includes/';

// Directory, that contains fonts.
$_CONFIG['fontdir']  = 'fonts/';

// Directory, that contains images.
$_CONFIG['imagedir'] = 'images/';

// Additional texts to print.
$_CONFIG['addtexts'] = array(

	array(
		'text' => 'Mercury',
		'positionX' => 33,
		'positionY' => 15,
		'size'      => 10,
		'color'		=> array(
							'red'   => 255,
							'green' => 0,
							'blue'  => 100
							),
		'angle'     => 0,
		'fontfile'  => $_CONFIG['basedir'] . $_CONFIG['fontdir'] .'arial.ttf')
		
	);

// Shows the count of people online it it's set to true.
$_CONFIG['showcount'] = true;

// The config for showing the count, if showcount is set to false, this is not required.
$_CONFIG['showcountconfig'] = array(

	'prefix1'   => '',
	'postfix1'  => '',
	'showmax'   => false, // Show the maximum abailable people online.
	'delimeter' => '/',  // delimeter will be shown if the showmax is set to true
	'prefix2'   => '(',  // prefix2   will be shown if the showmax is set to true
	'postfix2'  => ')',  // prefix1   will be shown if the showmax is set to true
	'positionX' => 5,
	'positionY' => 25,
	'size'      => 8,
	'useonlinecolors' => true, // If it's true, the color will be the same as the last half of colored half of square.
	'color'		=> array(        // This will be used if useonlinecolors is set to false.
						'red'   => 255,
						'green' => 255,
						'blue'  => 255
						),
	'angle'     => 0,
	'fontfile'  => $_CONFIG['basedir'] . $_CONFIG['fontdir'] .'comic.ttf'
	
	);

// The maximal count of users online.
$_CONFIG['maxusers']  = 1;

// The image to make from.
$_CONFIG['image']     = 'foo.png';

// The image name, that will be created, used and deleted.
$_CONFIG['imagename'] = 'online.png';

// The spacing between the squares (in pixels).
$_CONFIG['space']     = 3;

// The size of the squares.
$_CONFIG['size']      = 4;

// The start draw pixel (left, bottom) corner.
$_CONFIG['position']  = array(30, 20);

// The color allocation for each of the squares.
$_CONFIG['colors']    = array(
	
	// [1] The color of the first square.
	array(
		'red'   => 0,
		'green' => 255,
		'blue'  => 0),
		
	// [2] The color of the second square.
	array(
		'red'   => 50,
		'green' => 255,
		'blue'  => 0),
		
	// [3] The color of the third square.
	array(
		'red'   => 100,
		'green' => 255,
		'blue'  => 0),
		
	// [4] The color of the fourth square.
	array(
		'red'   => 150,
		'green' => 255,
		'blue'  => 0),
		
	// [5] The color of the fifth square.
	array(
		'red'   => 200,
		'green' => 255,
		'blue'  => 0),
		
	// [6] The color of the sixth square.
	array(
		'red'   => 255,
		'green' => 250,
		'blue'  => 0),
		
	// [7] The color of the seventh square.
	array(
		'red'   => 255,
		'green' => 255,
		'blue'  => 0),
		
	// [8] The color of the eights square.
	array(
		'red'   => 255,
		'green' => 180,
		'blue'  => 0),
		
	// [9] The color of the nines square.
	array(
		'red'   => 255,
		'green' => 100,
		'blue'  => 0),
		
	// [10] The color of the tenth square.
	array(
		'red'   => 255,
		'green' => 0,
		'blue'  => 0)
	);
	
// Debugger.
$_CONFIG['debug'] = false;
error_reporting(($_CONFIG['debug'] === true ? E_ALL | E_STRICT : 0));

// Name of the files to include.
$includeFiles = array(
	'functions' => $_CONFIG['basedir'] .'functions.php',
	'config'    => $_CONFIG['basedir'] .'config.php');
?>