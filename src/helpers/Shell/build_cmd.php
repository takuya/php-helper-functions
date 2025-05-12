<?php

namespace Takuya\Helpers\Shell;

use function Takuya\Helpers\String\csplit;
use function Takuya\Helpers\Array\array_replace_entry;
use function Takuya\Helpers\String\cjoin;

if ( !function_exists( __NAMESPACE__.'\\build_cmd' ) ) {
  
  function build_cmd (array|string $cmd_and_args, array $replaces,$pattern='/%[A-Z0-9_]+%/'):array{
    $cmd_and_args = is_string($cmd_and_args) ? csplit($cmd_and_args, ' ') : $cmd_and_args;
    foreach ( $replaces as $target => $value ) {
      $cmd_and_args = array_replace_entry($cmd_and_args, $target, $value);
      $cmd_and_args = array_map(fn($e) => str_replace($target, $value, $e), $cmd_and_args);
    }
    //
    !file_exists($cmd = $cmd_and_args[0]) && $cmd_and_args[0] = find_path($cmd);
    //
    if( count($remains = array_filter($cmd_and_args, fn($e) => preg_match($pattern, $e))) > 0 ) {
      throw new \RuntimeException('Build command failed , not replaced :'.cjoin($remains, ' '));
    }
    return $cmd_and_args;
  }
}
