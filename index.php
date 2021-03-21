<?php

require_once __DIR__ . '/vendor/autoload.php';

use Steampixel\Route;

include_once './src/Robot.php';

Route::add('/rest/mars/([M|R|L|m|r|l]*)', function($command) {
	$command = str_split(strtoupper($command));
	
	foreach($command as $input)
	{
		robotControls($input);
	}

	return getRobotPosition();
}, 'post');

Route::add('/rest/mars/([^M|R|L|m|r|l]*)', function($command) {
	return http_response_code();
}, 'post');

Route::run('/');

?>
