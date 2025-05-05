<?php

namespace Takuya\Tests\Units\String;

use Takuya\Tests\TestCase;
use function Takuya\Helpers\String\str_cut;

class StrCutTest extends TestCase {
  public function test_str_cut () {
    $ret = str_cut( " E b c", 2 );
    $this->assertEquals( "E", $ret );
  }
}