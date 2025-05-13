<?php
namespace Takuya\Tests\Units\String;
use Takuya\Tests\TestCase;
use function Takuya\Helpers\String\is_regex;

class IsRegexTest extends TestCase{
  public function test_is_regex(){
    $this->assertEquals(true,is_regex('/ /'));
    $this->assertEquals(true,is_regex('||'));
    $this->assertEquals(true,is_regex('##'));
    //
    $this->assertEquals(false,is_regex(' '));
    $this->assertEquals(false,is_regex('a'));
    is_regex('a',$msg);
    $this->assertEquals("Delimiter must not be alphanumeric, backslash, or NUL",$msg);
    is_regex(' ',$msg);
    $this->assertEquals("Empty regular expression",$msg);
    is_regex('# ',$msg);
    $this->assertEquals("No ending delimiter '#' found",$msg);
    is_regex('! ',$msg);
    $this->assertEquals("No ending delimiter '!' found",$msg);
    is_regex('/ ',$msg);
    $this->assertEquals("No ending delimiter '/' found",$msg);
    is_regex('| ',$msg);
    $this->assertEquals("No ending delimiter '|' found",$msg);
    is_regex('/ /y',$msg);
    $this->assertEquals("Unknown modifier 'y'",$msg);
  }
}