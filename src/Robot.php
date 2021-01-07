<?php

class Robot
{
	private $teste = "teste";

	private $directions = ["N", "E", "S", "W"];

	private $robot =  array(
		"xAxis" => 0,
		"yAxis" => 0,
		"direction" => "N"
	);

	private $terrain = array(
		"width" => 5,
		"height" => 5
	);

	private function __construct($teste)
    {
        $this->teste = $teste;
    }

	public static function teste()
	{
		return $teste;
	}

	public function getRobotPosition()
	{
		return sprintf("X Axis: %d \n".
					   "Y Axis: %d \n".
					   "Direction: %s \n", 
						$this->robot["xAxis"], $this->robot["yAxis"], 
						$this->robot["direction"]);
	}

	function moveForward($anyAxis, $terrainSize)
	{
		if($anyAxis < ($terrainSize - 1)){
			$anyAxis++;
		}
	}

	function moveBackward($anyAxis)
	{
		if($anyAxis > 0){
			$anyAxis--;
		}
	}

	function robotStep($position)
	{
		if($position == "N")
		{
			moveForward($robot["xAxis"], $terrain["height"]);
		}
		if($position == "E")
		{
			moveForward($robot["yAxis"], $terrain["width"]);
		}
		if($position == "S")
		{
			moveBackward($robot["yAxis"]);
		}
		if($position == "W")
		{
			moveBackward($robot["xAxis"]);
		}
	}

	function robotControls($input)
	{
		switch($input){
			case "M":
				robotStep($robot["direction"]);
			break;
			case "L":
				if( $robot["direction"] == "W"){
					reset($directions);
				}else{
					$robot["direction"] = next($directions);
				}
			break;
			case "R":
				if( $robot["direction"] == "N"){
					$robot["direction"] = end($directions);
				}else{
					$robot["direction"] = prev($directions);
				}
			break;
			default:
				return false;
			break;
		}
	}
}

?>
