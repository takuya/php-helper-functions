<?php

namespace Takuya\Tests\Units;

use Takuya\Tests\TestCase;
use function Takuya\Helpers\Array\array_equal_values;
use function Takuya\Helpers\Array\array_replace_entry;
use function Takuya\Helpers\Array\array_insert;
use function Takuya\Helpers\Array\array_insert_before;
use function Takuya\Helpers\Array\array_insert_after;
use function Takuya\Helpers\Array\array_to_assoc;
use function Takuya\Helpers\Array\array_flatten;
use function Takuya\Helpers\FileSystem\list_files;
use function Takuya\Helpers\String\str_lines;

class ArrayHelpersUsageSampleTest extends TestCase {
  public function test_array_equal_values () {
    $this->assertTrue( array_equal_values( ['a', 'b'], ['b', 'a'] ) );
    $this->assertTrue( array_equal_values( ['a', 'b', 'c'], ['c', 'b', 'a'] ) );
    $this->assertFalse( array_equal_values( ['a', 'bc'], ['c', 'b', 'a'] ) );
  }
  
  public function test_array_replace_entry () {
    $this->assertEquals( ['a', 'a', 'c'], array_replace_entry( ['a', 'c', 'c'], 'c', 'a' ) );
    $this->assertEquals( ['a', 'c', 'c'], array_replace_entry( ['a', 'c', 'c'], 'd', 'a' ) );
    $this->assertEquals( ['a', 'a', 'a'], array_replace_entry( ['a', 'c', 'c'], 'c', 'a', ARRAY_REPLACE_ALL ) );
  }
  
  public function test_list_files () {
    $list = list_files( $dir = realpath( __DIR__.'/../../src/helpers/Array' ) );
    foreach ( $list as $a ) {
      $this->assertMatchesRegularExpression( '/\.php$/', $a );
    }
    $find_result = array_map( 'trim', str_lines( `/usr/bin/find src/helpers/Array -type f -exec realpath {} \;` ) );
    $diff = array_diff( $find_result, list_files( $dir ) );
    $this->assertEmpty( $diff );
  }
  
  public function test_array_insert () {
    $this->assertEquals( ['a', 'b', 'c'], array_insert( ['a', 'c'], 1, ['b'] ) );
    $this->assertEquals( ['a', 'c', 'd'], array_insert( ['a', 'c'], 2, ['d'] ) );
    $this->assertEquals( ['x', 'a', 'c'], array_insert( ['a', 'c'], 0, ['x'] ) );
    $this->assertEquals( ['a', 'c', 'd', 'e'], array_insert( ['a', 'c'], 2, ['d', 'e'] ) );
    $this->assertEquals( ['a', 'x', 'y', 'c'], array_insert( ['a', 'c'], 1, ['x', 'y'] ) );
  }
  
  public function test_array_insert_before () {
    $this->assertEquals( ['a', 'b', 'c'], array_insert_before( ['a', 'c'], 'c', ['b'] ) );
    $this->assertEquals( ['a', 'b', 'c', 'd', 'e', 'f'], array_insert_before( ['a', 'f'], 'f', ['b', 'c', 'd', 'e'] ) );
  }
  
  public function test_array_insert_after () {
    $this->assertEquals( ['a', 'c', 'x'], array_insert_after( ['a', 'c'], 'c', ['x'] ) );
    $this->assertEquals( ['a', 'b', 'c', 'd', 'e', 'f'], array_insert_after( ['a', 'f'], 'a', ['b', 'c', 'd', 'e'] ) );
  }
  
  public function test_array_to_assoc () {
    $arr = [
      ['a', '1'],
      ['b', '2'],
    ];
    $ret = array_to_assoc( $arr );
    $this->assertEquals( ["a" => "1", "b" => "2"], $ret );
  }
  
  public function test_array_flatten () {
    $this->assertEquals( ["a", "1", "b", "2"], array_flatten( [['a', '1'], ['b', '2']] ) );
    $this->assertEquals( ["a", "1", "b", "2"], array_flatten( [[['a', '1']], ['b', '2']] ) );
  }
}