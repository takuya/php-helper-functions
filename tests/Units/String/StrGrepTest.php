<?php

namespace Takuya\Tests\Units\String;

use Takuya\Tests\TestCase;
use function Takuya\Helpers\String\str_grep;

class StrGrepTest extends TestCase {
  public function test_str_grep () {
    $ret = str_grep( "aaaa\nbbb", '/a/' );
    $this->assertEquals( ["aaaa\n"], $ret );
  }
}