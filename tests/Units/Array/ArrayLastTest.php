<?php
namespace Takuya\Tests\Units\Array;
use Takuya\Tests\TestCase;
use function Takuya\Helpers\Array\array_last;

class ArrayLastTest extends TestCase{
  public function test_array_last(){
    $ret = array_last($a=[3,2,1]);
    $this->assertEquals(1,$ret);
    $this->assertEquals([3,2,1],$a);
  }
}