<?php

require 'vendor/autoload.php';

use kleczewsky\kwCyfra\Generator;
use PHPUnit\Framework\TestCase;

 /**
  * @internal
  * @covers \Basic use case
  */
 class basicTest extends TestCase
 {
     public function testCorrectCalculatedControl()
     {
         $this->assertEquals(2, Generator::getControl('zg1g', 101235));

         $this->assertEquals(7, Generator::getControl('cikw', 123111));
     }

     public function testAssertFalseOnWrongParameters()
     {
         // incorrect number parameters
         $this->assertFalse(Generator::getControl('cikw', -1));
         $this->assertFalse(Generator::getControl('cikw', 0));
         $this->assertFalse(Generator::getControl('cikw', 100000000));

         // incorrect department parameters
         $this->assertFalse(Generator::getControl('ciw', 123111));
         $this->assertFalse(Generator::getControl('ciwww', 123111));
     }
 }
