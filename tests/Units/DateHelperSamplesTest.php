<?php

namespace Takuya\Tests\Units;

use Takuya\Tests\TestCase;
use function Takuya\Helpers\Dates\duration_time_percent;
use function Takuya\Helpers\Dates\date_duration_to_int;
use function Takuya\Helpers\Dates\date_time_format_duration;

class DateHelperSamplesTest extends TestCase {
  
  public function test_duration_time_percent () {
    $this->assertEquals( 71.21, duration_time_percent( '01:25:53.89', '02:00:38', 2 ) );
    $this->assertEquals( 71.2, duration_time_percent( '01:25:53.89', '02:00:38', 1 ) );
    $this->assertEquals( 71, duration_time_percent( '01:25:53.89', '02:00:38', 0 ) );
  }
  
  public function test_date_duration_to_int () {
    $this->assertEquals( 23, date_duration_to_int( '00:00:23' ) );
    $this->assertEquals( 1, date_duration_to_int( '00:00:1' ) );
    $this->assertEquals( 1, date_duration_to_int( '0:00:1' ) );
    $this->assertEquals( 601, date_duration_to_int( '00:10:1' ) );
    $this->assertEquals( 3601, date_duration_to_int( '01:00:1' ) );
    $this->assertEquals( 3601, date_duration_to_int( '1:00:1' ) );
    $this->assertEquals( 36001, date_duration_to_int( '10:00:1' ) );
    // milli秒はint に丸める
    $this->assertEquals( 0, date_duration_to_int( '00:00:00.4' ) );
    $this->assertEquals( 1, date_duration_to_int( '00:00:01.2' ) );
    $this->assertEquals( 1, date_duration_to_int( '00:00:00.88' ) );
  }
  
  public function test_date_format_duration () {
    $this->assertEquals( "00:00:00", date_time_format_duration( 0 ) );
    $this->assertEquals( "00:00:01", date_time_format_duration( 1 ) );
    $this->assertEquals( "00:00:10", date_time_format_duration( 10 ) );
    $this->assertEquals( "00:01:01", date_time_format_duration( 61 ) );
    $this->assertEquals( "00:02:01", date_time_format_duration( 121 ) );
    $this->assertEquals( "01:00:00", date_time_format_duration( 3600 ) );
    $this->assertEquals( "01:02:01", date_time_format_duration( 3600 + 121 ) );
    $this->assertEquals( "10:02:01", date_time_format_duration( 3600*10 + 121 ) );
    $this->assertEquals( "99:02:01", date_time_format_duration( 3600*99 + 121 ) );
    $this->assertEquals( "99:59:00", date_time_format_duration( 3600*99 + 60*59 ) );
    $this->assertEquals( "99:59:01", date_time_format_duration( 3600*99 + 60*59 + 1 ) );
    $this->assertEquals( "99:59:59", date_time_format_duration( 3600*99 + 60*59 + 59 ) );
    $this->assertEquals( "100:00:00", date_time_format_duration( 3600*99 + 60*59 + 59 + 1 ) );
  }
}