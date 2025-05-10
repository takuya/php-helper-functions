<?php

namespace Takuya\Helpers\Shell;

use function Takuya\Helpers\String\empty_str;
use function Takuya\Helpers\String\csplit;

if( !function_exists(__NAMESPACE__.'\\find_path') ) {
  function find_path($command):string{
    foreach (csplit(getenv('PATH'),":") as $path){
      if(file_exists($full=$path.DIRECTORY_SEPARATOR.$command)) {
        return $full;
      }
    }
    throw new \RuntimeException("{$command} is not found in path");
  }
}
