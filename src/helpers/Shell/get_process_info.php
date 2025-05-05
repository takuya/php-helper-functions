<?php

namespace Takuya\Helpers\Shell;

if ( !function_exists('get_process_info')){
  function get_process_info(int $pid):array{
    putenv("TARGET_PID=$pid");
    $output = shell_exec('ps -o ppid,pid,sid,uid,gid,tty,stat,cmd $TARGET_PID');
    putenv('TARGET_PID');
    $lines = explode("\n", trim($output));
    $headers = preg_split('/\s+/', array_shift($lines));
    $body = $lines[0];
    return array_combine($headers, preg_split('/\s+/', ltrim($body), count($headers)));
  }
  
}