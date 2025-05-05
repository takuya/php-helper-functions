<?php
namespace Takuya\Tests\Units\Dates;
use Takuya\Tests\TestCase;
use function Takuya\Helpers\Dates\duration_time_percent;

class DurationTimePercentTest extends TestCase{
  public function test_duration_time_percent(){
    $this->assertEquals( 50, (int)duration_time_percent( '01:00:00.00', '02:00:00' ) );
  }
}