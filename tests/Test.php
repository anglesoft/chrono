<?php

use PHPUnit\Framework\TestCase;

class Test extends TestCase
{
    public function setUp() : void
    {
        //
    }

    /** @test */
    public function testSuiteIsWorkingProperly()
    {
        $this->assertTrue(true);
    }

    /** @test */
    public function canCreatePackageClass()
    {
        $class = new \Angle\Packet\Package;

        $this->assertTrue($class != null);
    }
}
