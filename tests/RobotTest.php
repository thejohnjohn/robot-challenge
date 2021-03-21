<?php

use PHPUnit\Framework\TestCase;

final class RobotTest extends TestCase
{
       public function testActualPosition()
       {
            $this->assertEquals("(0,0,N)", getRobotPosition());
       }

       public function testClockwiseMovement()
       {
	        robotControls("R");

	        $this->assertEquals("(0,0,E)", getRobotPosition());
       }

       public function testAntiClockwiseMovement()
       {
            robotControls("L");

            $this->assertEquals("(0,0,N)", getRobotPosition());
       }
}

?>
