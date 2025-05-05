<?php
namespace Takuya\Tests\Units\Array;
use Takuya\Tests\TestCase;
use function Takuya\Helpers\Array\array_flatten;

class ArrayFlattenTest extends TestCase{
  public function test_array_flatten(){
    $ret = array_flatten([1,[1,2],[[1,2,3]],[[[1,2,3,4]]]]);
    $this->assertEquals([1,1,2,1,2,3,1,2,3,4],$ret);
  }
}