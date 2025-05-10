<?php

namespace Takuya\Tests\Units\String;

use Takuya\Tests\TestCase;
use function Takuya\Helpers\String\str_lines;

class StrLinesTest extends TestCase {
  public function test_str_lines () {
    $this->assertEquals( 1, sizeof( str_lines( "\n" ) ) );
    $this->assertEquals( 1, sizeof( str_lines( "aaaa" ) ) );
    $this->assertEquals( 1, sizeof( str_lines( "aaaa\n" ) ) );
    $this->assertEquals( 3, sizeof( str_lines( "aaaa\nbbb\nccccc\n" ) ) );
    $this->assertEquals( 3, sizeof( str_lines( "aaaa\nbbb\nccccc" ) ) );
    //
    $sample = chunk_split(base64_encode(random_bytes(1024)),64);
    $this->assertStringEndsNotWith(PHP_EOL,str_lines($sample,trim:true)[0]);
    $this->assertStringEndsWith(PHP_EOL,str_lines($sample)[0]);
  }
}