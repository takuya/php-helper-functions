<?php

namespace Takuya\Tests\Units\Array;

use Takuya\Tests\TestCase;
use function Takuya\Helpers\Array\array_to_assoc;

class ArrayToAssocTest extends TestCase {
  public function test_array_to_assoc () {
    $records = [
      [101, 'mercury',],
      [102, 'vinous',],
      [103, 'earth',],
    ];
    $ret = array_to_assoc( $records );
    $this->assertEquals( [101 => "mercury", 102 => "vinous", 103 => "earth",], $ret );
  }
}