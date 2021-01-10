<?php

use PHPUnit\Framework\TestCase;

final class RobotTest extends TestCase
{
       public function testActualPosition()
       {
            $this->assertEquals(
                "X Axis: 0 \n".
				"Y Axis: 0 \n".
				"Direction: N \n",
                getRobotPosition()
            );
       }
}

?>