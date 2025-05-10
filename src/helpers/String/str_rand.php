<?php

namespace Takuya\Helpers\String;

if ( !function_exists(__NAMESPACE__.'\\str_rand')){
  // This is for test file name only.
  // Don't use in production.
  function str_rand($length=16):string {
    return substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length/strlen($x)) )),1,$length);
  }
}