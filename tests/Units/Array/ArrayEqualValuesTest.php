<?php
namespace Takuya\Tests\Units\Array;
use Takuya\Tests\TestCase;
use function Takuya\Helpers\Array\array_equal_values;

class ArrayEqualValuesTest extends TestCase{
  public function test_array_equal_values(){
    $ret = array_equal_values([0=>1],[1=>1]);
    $this->assertEquals(true,$ret);
  }
}