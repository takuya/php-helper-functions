<?php

namespace Takuya\Helpers\String;

if ( !function_exists(__NAMESPACE__.'\\str_rand')){
  // This is for test file name only.
  // Don't use in production.
  function str_rand($length=16,$chars='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'):string {
    return substr(str_shuffle(str_repeat($chars, ceil($length/strlen($chars)) )),1,$length);
  }
}