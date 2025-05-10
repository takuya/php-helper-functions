<?php
namespace Takuya\Helpers\Shell;
use function Takuya\Helpers\String\empty_str;

if ( !function_exists( __NAMESPACE__.'\\cmd_exists' ) ) {
  function cmd_exists ( $command ): bool {
    try {
      return !empty_str(find_path($command));
    }catch (\RuntimeException){
      return false;
    }
  }
}
