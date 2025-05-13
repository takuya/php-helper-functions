<?php
namespace Takuya\Tests\Units\String;
use Takuya\Tests\TestCase;
use function Takuya\Helpers\String\csplit;

class CsplitTest extends TestCase{
  public function test_csplit(){
    $this->assertEquals(['a','b','c'],csplit(' a ,   b, c '));
    $this->assertEquals(['a','b','c'],csplit(' a b c '));
  }
}