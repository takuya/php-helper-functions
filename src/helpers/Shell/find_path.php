<?php

namespace Takuya\Helpers\Shell;

use function Takuya\Helpers\String\empty_str;

if( !function_exists(__NAMESPACE__.'\\find_path') ) {
  function find_path($command):string{
    $ret = proc_open(['which', $command], [1 => ['pipe', 'w'], 2 => ['pipe', 'w']], $io);
    while ( proc_get_status($ret)['running'] ) {
      usleep(100);
    }
    $stdout = stream_get_contents($io[1]);
    if( proc_get_status($ret)['exitcode'] > 0 || !empty_str(stream_get_contents($io[2])) ) {
      throw new \RuntimeException("{$command} is not found in path");
    }
    return trim($stdout);
  }
}
