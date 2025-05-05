<?php

namespace Takuya\Tests\Units\String;

use Takuya\Tests\TestCase;
use function Takuya\Helpers\String\empty_str;

class EmptyStrTest extends TestCase {
  public function test_empty_str () {
    $this->assertEquals( true, empty_str( '' ) );
    $this->assertEquals( true, empty_str( ' ' ) );
    $this->assertEquals( true, empty_str( '  ' ) );
    $this->assertEquals( true, empty_str( "\n" ) );
    $this->assertEquals( true, empty_str( "\t" ) );
    $this->assertEquals( false, empty_str( '0' ) );
    $this->assertEquals( false, empty_str( '0.5' ) );
    $this->assertEquals( false, empty_str( '1' ) );
    // 数値は、、、、 空の文字列ではない。
    $this->assertEquals( false, empty_str( 0 ) );
    $this->assertEquals( false, empty_str( 0.0 ) );
    $this->assertEquals( false, empty_str( 1 ) );
    // null などは empty() を通すので。empty と同じ。。。これどうなんだろうなぁ
    $this->assertEquals( false, empty_str( true ) );
    $this->assertEquals( true, empty_str( false ) );
    $this->assertEquals( true, empty_str( null ) );
  }
}