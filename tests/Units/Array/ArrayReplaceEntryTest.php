<?php
namespace Takuya\Tests\Units\Array;
use Takuya\Tests\TestCase;
use function Takuya\Helpers\Array\array_replace_entry;

class ArrayReplaceEntryTest extends TestCase{
  public function test_array_replace_entry(){
    $v = [1,2,3,4,5];
    $ret = array_replace_entry($v,2,1);
    $ret = array_replace_entry($ret,3,2);
    $ret = array_replace_entry($ret,4,3);
    $this->assertEquals([1,1,2,3,5],$ret);
  }
}