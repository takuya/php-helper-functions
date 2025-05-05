<?php

namespace Takuya\Tests\Units\Array;

use Takuya\Tests\TestCase;
use function Takuya\Helpers\Array\array_insert;

class ArrayInsertTest extends TestCase {
  public function test_array_insert () {
    $ret = array_insert( [1, 1, 2, 3], 4, 5 );
    $this->assertEquals( [1, 1, 2, 3, 5], $ret );
  }
}