<?php
namespace Takuya\Tests\Units\String;
use Takuya\Tests\TestCase;
use function Takuya\Helpers\String\string_io;

class StringIoTest extends TestCase{
  public function test_string_io(){
    $ret = string_io();
    $this->assertEquals('resource',gettype($ret));
    $info= stream_get_meta_data($ret);
    $this->assertEquals(true,$info['seekable']);
    $this->assertEquals('TEMP',$info['stream_type']);
    $this->assertMatchesRegularExpression('#^php://temp/maxmemory:#',$info['uri']);
  }
}