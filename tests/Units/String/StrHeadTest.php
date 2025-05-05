<?php

namespace Takuya\Tests\Units\String;

use Takuya\Tests\TestCase;
use function Takuya\Helpers\String\str_head;

class StrHeadTest extends TestCase {
  public function test_str_head () {
    $ret = str_head( "aaaa\nbbb\nccccc\n", 2 );
    $this->assertEquals( "aaaa\nbbb\n", $ret );
  }
}