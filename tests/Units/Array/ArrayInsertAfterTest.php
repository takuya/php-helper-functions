<?php
namespace Takuya\Tests\Units\Array;
use Takuya\Tests\TestCase;
use function Takuya\Helpers\Array\array_insert_after;

class ArrayInsertAfterTest extends TestCase{
  public function test_array_insert_after(){
    $this->assertEquals([1,1,2,3,5], array_insert_after([1,1,2,5],2,3));
  }
}