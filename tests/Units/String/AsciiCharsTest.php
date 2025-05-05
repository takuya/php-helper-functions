<?php
namespace Takuya\Tests\Units\String;
use Takuya\Tests\TestCase;
use function Takuya\Helpers\String\ascii_chars;

class AsciiCharsTest extends TestCase{
  public function test_ascii_chars(){
    $this->assertSame('ABCDEFGHIJKLMNOPQRSTUVWXYZ',implode('',array_slice(ascii_chars(),0,26)));
    $this->assertSame('abcdefghijklmnopqrstuvwxyz',implode('',array_slice(ascii_chars(),26)));
  }
}