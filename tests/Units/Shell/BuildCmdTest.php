<?php

namespace Takuya\Tests\Units\Shell;

use Takuya\Tests\TestCase;
use function Takuya\Helpers\Shell\build_cmd;
use function Takuya\Helpers\FileSystem\mktempfile;
use function Takuya\Helpers\Shell\find_path;

class BuildCmdTest extends TestCase {
  public function test_build_cmd () {
    $ret = build_cmd( 'ls -alt %FILE%', ['%FILE%' => $tmp = mktempfile()] );
    $proc = proc_open( $ret, [1 => ['pipe', 'w']], $stdout );
    $this->assertStringContainsString( $tmp, stream_get_contents( $stdout[1] ) );
    $this->assertEquals( find_path( 'ls' ), proc_get_status( $proc )['command'] );
    $this->assertEquals( $ret[0], proc_get_status( $proc )['command'] );
  }
  
  public function test_build_cmd_another_pattern () {
    $ret = build_cmd( 'ls -alt $_FILE', ['$_FILE' => $tmp = mktempfile()], '#\$_[A-Z_]+#' );
    $proc = proc_open( $ret, [1 => ['pipe', 'w']], $stdout );
    $this->assertStringContainsString( $tmp, stream_get_contents( $stdout[1] ) );
    $this->assertEquals( find_path( 'ls' ), proc_get_status( $proc )['command'] );
    $this->assertEquals( $ret[0], proc_get_status( $proc )['command'] );
  }
}