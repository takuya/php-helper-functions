<?php
namespace Takuya\Tests\Units\Array;
use Takuya\Tests\TestCase;
use function Takuya\Helpers\Array\array_insert_before;

class ArrayInsertBeforeTest extends TestCase{
  public function test_array_insert_before(){
    $ret = array_insert_before([1, 1, 2, 5], 5, 3 );
    $this->assertEquals( [1, 1, 2, 3, 5], $ret );
  }
}