<?php

namespace Takuya\Tests\Units\String;

use Takuya\Tests\TestCase;
use function Takuya\Helpers\String\is_byte_size;

class IsByteSizeTest extends TestCase {
  public function test_is_byte_str () {
    $this->assertEquals( true, is_byte_size( '1.0' ) );
    $this->assertEquals( true, is_byte_size( '1.00' ) );
    $this->assertEquals( true, is_byte_size( '1.000' ) );
    $this->assertEquals( true, is_byte_size( '100.0' ) );
    $this->assertEquals( true, is_byte_size( '10000' ) );
    $this->assertEquals( true, is_byte_size( '1k' ) );
    $this->assertEquals( true, is_byte_size( '1m' ) );
    $this->assertEquals( true, is_byte_size( '1g' ) );
    $this->assertEquals( true, is_byte_size( '1t' ) );
    $this->assertEquals( true, is_byte_size( '1K' ) );
    $this->assertEquals( true, is_byte_size( '1M' ) );
    $this->assertEquals( true, is_byte_size( '1G' ) );
    $this->assertEquals( true, is_byte_size( '1T' ) );
    $this->assertEquals( true, is_byte_size( '1k' ) );
    $this->assertEquals( true, is_byte_size( '10k' ) );
    $this->assertEquals( true, is_byte_size( '1024' ) );
    $this->assertEquals( true, is_byte_size( '0.1' ) );
    $this->assertEquals( true, is_byte_size( '0.1M' ) );
    $this->assertEquals( true, is_byte_size( '00.1' ) );
    $this->assertEquals( true, is_byte_size( '0.01' ) );
    $this->assertEquals( true, is_byte_size( '0.001' ) );
    $this->assertEquals( false, is_byte_size( '0.10' ) );
    $this->assertEquals( false, is_byte_size( '0.100' ) );
    $this->assertEquals( false, is_byte_size( '1a' ) );
    $this->assertEquals( false, is_byte_size( 'a' ) );
    $this->assertEquals( false, is_byte_size( '1eM' ) );
    $this->assertEquals( false, is_byte_size( 'M' ) );
    $this->assertEquals( false, is_byte_size( '0M' ) );
    $this->assertEquals( false, is_byte_size( '0' ) );
    $this->assertEquals( false, is_byte_size( '00.0' ) );
    $this->assertEquals( false, is_byte_size( '00.0k' ) );
  }
}