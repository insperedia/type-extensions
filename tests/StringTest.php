<?php

namespace Insperedia\Scalars\Tests;

use Insperedia\Scalars\Str;

class StringTest extends \PHPUnit_Framework_TestCase
{
    function testContact() {
        $this->assertEquals("test1 test2", Str::n("test1")->join(" ", "test2"));
    }

    function testSub() {
        $this->assertEquals("tes", Str::n("test1 test2")->sub(6,3));
    }

    function testReplace() {
        $this->assertEquals("testobj456", Str::n("testobj123")->replace("123", '456'));
    }
    
    function testSimilar() {
        $this->assertTrue(Str::n("Å1234567890")->similar("å123456789"));
        $this->assertFalse(Str::n("1234567890")->similar("12345678"));
    }
}