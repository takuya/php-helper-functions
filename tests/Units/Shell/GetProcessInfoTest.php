<?php
namespace Takuya\Tests\Units\Shell;
use Takuya\Tests\TestCase;
use function Takuya\Helpers\Shell\get_process_info;
use function Takuya\Helpers\Shell\child_fork;

class GetProcessInfoTest extends TestCase{
  public function test_get_process_info(){
    $result = null;
    $cpid = child_fork(fn($pid)=>sleep(10),function($cpid)use(&$ret,&$st){
      $ret = get_process_info($cpid);
      posix_kill($cpid,SIGINT);
      pcntl_wait($st);
    });
    
    $this->assertEquals(posix_getpid(),$ret['PPID']);
    $this->assertEquals($cpid,$ret['PID']);
    $this->assertEquals('S',$ret['STAT']);
    $this->assertEquals(posix_getuid(),$ret['UID']);
    $this->assertEquals(posix_getgid(),$ret['GID']);
    $this->assertArrayHasKey('TT',$ret);
  }
}