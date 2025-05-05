<?php

namespace Takuya\Tests\Units\String;

use Takuya\Tests\TestCase;
use function Takuya\Helpers\String\short_hash;

class ShortHashTest extends TestCase {
  public function test_short_hash () {
    $ret = [];
    foreach ( range( 0, 999 ) as $item ) {
      $ret[] = short_hash( random_bytes( 1024 ) );
    }
    // 1000件くらいで衝突しなければOK。実質１０件くらいしか使わんし。
    $this->assertEquals( 1000, sizeof( array_unique( $ret ) ) );
  }
  
}