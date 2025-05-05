<?php
namespace Takuya\Tests\Units\String;
use Takuya\Tests\TestCase;
use function Takuya\Helpers\String\path_diff;

class PathDiffTest extends TestCase{
  public function test_path_diff(){
    $data = [
      ['storage/app/work/out/a', 'storage/app/b','work/out/a']
    ];
    foreach ( $data as $e ) {
      $this->assertEquals($e[2],path_diff($e[0],$e[1]));
    }
  }
}