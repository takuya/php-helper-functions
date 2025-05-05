<?php
namespace Takuya\Tests\Units\String;
use Takuya\Tests\TestCase;
use function Takuya\Helpers\String\str_rand;

class StrRandTest extends TestCase{
  public function test_str_rand(){
    $this->assertEquals(16,strlen(str_rand()));
    $size  = sizeof(array_unique(array_map(fn($e)=>str_rand(),range( 1, $iter = 1024*1024 ))));
    $this->assertEquals($iter,$size);
  }
}