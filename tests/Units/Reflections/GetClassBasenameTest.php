<?php

namespace Takuya\Tests\Units\Reflections;

use Takuya\Tests\TestCase;
use function Takuya\Helpers\Reflections\get_class_basename;

class GetClassBasenameTest extends TestCase {
  public function test_get_class_basename () {
    $this->assertEquals( 'GetClassBasenameTest', get_class_basename( static::class ) );
    $this->assertEquals( 'TestCase', get_class_basename( TestCase::class ) );
    $this->assertEquals( 'RandomException', get_class_basename( new \Random\RandomException() ) );
    $this->assertEquals( 'RandomException', get_class_basename( \Random\RandomException::class ) );
    $this->assertEquals( 'DateTime', get_class_basename( new \DateTime() ) );
    $this->assertEquals( 'DateTime', get_class_basename( \DateTime::class ) );
  }
  
}