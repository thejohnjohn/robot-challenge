<?php

$directions = ["N", "E", "S", "W"];

$dir_index = 0;

$robot = array(
	"xAxis" => 0,
	"yAxis" => 0,
	"direction" => "N"
);

$terrain = array(
	"width" => 5,
	"height" => 5
);

function getRobotPosition()
{
	global $robot;

	return sprintf("(%d,%d,%s)", 
			$robot["xAxis"], $robot["yAxis"], 
			$robot["direction"]);
}

function moveForward($anyAxis, $terrainSize)
{
	if($anyAxis < ($terrainSize - 1)){
		return $anyAxis+=1;
	}
}

function moveBackward($anyAxis)
{
	if($anyAxis > 0){
		$anyAxis-=1;
	}
}

function robotStep($position)
{
	global $robot;
	global $terrain;
	
	if($position == "N")
	{
		$robot["xAxis"] = moveForward($robot["xAxis"], $terrain["height"]);
	}
	if($position == "E")
	{
		$robot["yAxis"] = moveForward($robot["yAxis"], $terrain["width"]);
	}
	if($position == "S")
	{
		$robot["yAxis"] = moveBackward($robot["yAxis"]);
	}
	if($position == "W")
	{
		$robot["xAxis"] = moveBackward($robot["xAxis"]);
	}
}

function robotControls($input)
{
	global $robot;
	global $directions;
	global $dir_index;

	switch($input){
		case "M":
			robotStep($robot["direction"]);
		break;
		case "L":
			$dir_index-=1;
			
			if($dir_index < 0){
				$dir_index = 3;
				$robot["direction"] = $directions[$dir_index];
			}else{
				$robot["direction"] = $directions[$dir_index];
			}
		break;
		case "R":
			$dir_index+=1;
			
			if($dir_index > 3){
				$dir_index = 0;
				$robot["direction"] = $directions[$dir_index];
			}else{
				$robot["direction"] = $directions[$dir_index];
			}
		break;
		default:
			return false;// quitting the robot's control
		break;
	}
}

?>
