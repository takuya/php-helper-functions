<?php

namespace Takuya\Tests\Units\String;

use Takuya\Tests\TestCase;
use function Takuya\Helpers\String\size_format;

class SizeFormatTest extends TestCase {
  public function test_size_format () {
    $expects = [
      [1024, "1.0 KB"],
      [111241, "108.6 KB"],
    ];
    foreach ( $expects as $v ) {
      $this->assertEquals( $v[1], size_format( $v[0] ) );
    }
  }
}