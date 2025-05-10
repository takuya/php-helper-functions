<?php
namespace Takuya\Tests\Units\String;
use Takuya\Tests\TestCase;
use function Takuya\Helpers\String\cjoin;

class CjoinTest extends TestCase{
  public function test_cjoin(){
    $this->assertEquals('1,2,3',cjoin([1,2,3]));
    $this->assertEquals('123',cjoin([1,2,3],''));
    $this->assertEquals('1 2 3',cjoin([1,2,3],' '));
  }
}