<?php

require_once __DIR__.'/../../vendor/autoload.php';

function gen_test(){
  $php_exec = $_SERVER['_'];
  $gen_test  = realpath(__DIR__.'/../../tests/gen_tests.php');
  printf(`{$php_exec} $gen_test`);
  return true;
}
function gen_file(string $namespace,string $func_name){
  $namespace = ucfirst($namespace);
  $func_name = strtolower($func_name);
  if (file_exists($fname=__DIR__."/../helpers/{$namespace}/{$func_name}.php")){
    return ;
  }
  $ret = file_put_contents($fname,<<<EOS
    <?php
    
    namespace Takuya\\Helpers\\{$namespace};
    
    if ( !function_exists( __NAMESPACE__.'\\\\{$func_name}' ) ) {
      function {$func_name} (){
        return null;
      }
    }
    
    EOS) > 0 && printf(realpath($fname.PHP_EOL))  === 0 && gen_test();
}
if ( realpath( __FILE__ ) == realpath( $argv[0] ) ) {
  if (sizeof($argv)!=3){
    $fname = basename($argv[0]);
    fputs(STDERR,<<<EOS
    
    Usage: ./$fname CATEGORY FUNC_NAME
    
      CATEGORY  => namespace of function
      FUNC_NAME => function name to be generated.
    
      Example
        
        create `array_sort_by_key` in helers/Array
        
          ./$fname Array array_sort_by_key
    
    
    EOS,null);
    exit(1);
  }
  
  gen_file($argv[1],$argv[2]);
}



