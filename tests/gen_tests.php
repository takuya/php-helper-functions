<?php

use Takuya\Tests\TestCase;

require_once __DIR__.'/../vendor/autoload.php';

function list_helper_files ( $ignores = [] ) {
  $dir = new RecursiveDirectoryIterator( realpath( __DIR__.'/../src/helpers' ) );
  $iter = new RegexIterator( new RecursiveIteratorIterator( $dir ), '/^.+\.php$/i', RecursiveRegexIterator::GET_MATCH );
  $files = array_keys( iterator_to_array( $iter ) );
  $files = array_map( fn( $e ) => preg_replace( '#^/.+/(.+?)/(.+?\.php)$#', '$1/$2', $e ), $files );
  $files = array_diff( $files, $ignores );
  return $files;
}

function to_test_name ( $fname ) {
  [$dir, $name] = preg_split( '#/#', $fname );
  $name = str_replace( '_', '', ucwords( $name, '_' ) );
  $name = str_replace( '.php', 'Test.php', ucwords( $name, '_' ) );
  return "{$dir}/{$name}";
}
function gen_namespace_info($file){
  $ns = ((new ReflectionClass( TestCase::class ) )->getNamespaceName());
  $snake_name = str_replace('_test.php','',strtolower(preg_replace('/(?<!^)([A-Z])/', '_$1', basename($file))));
  $cls = preg_replace('#^.+/(.+?)\.php$#','$1',$file);
  $_ns = $ns.'\\Units\\'.preg_replace('#^.+/(.+?)/(.+?)\.php$#','$1',$file);
  

  return (object)[
    'test'=>(object)[
      'namespace'=>$_ns,
      'classname'=>$cls,
    ],
    'helper'=>(object)[
      'namespace'=>'Takuya\\Helpers\\'.basename(dirname($file)),
      'func_name'=>$snake_name,
    ]
  ];
}

function createTestClasses () {
  $ignores = ['helpers/helpers.php','helpers/dumper.php'];
  $ns = ((new ReflectionClass( TestCase::class ) )->getNamespaceName());
  $testdir = dirname( ( new ReflectionClass( TestCase::class ) )->getFileName() );
  $files = array_map( fn( $f ) => $testdir.'/Units/'.to_test_name( $f ), list_helper_files( $ignores ) );
  foreach ( $files as $file ) {
    $info=gen_namespace_info($file);
    !file_exists( $dir = dirname( $file ) ) && mkdir( $dir, 0775, true ) && printf("{$dir}\n");
    !file_exists( $file ) && touch( $file ) && chmod( $file, 0664 )
      && file_put_contents($file,<<<EOS
        <?php
        namespace {$info->test->namespace};
        use $ns\TestCase;
        use function {$info->helper->namespace}\\{$info->helper->func_name};
        
        class {$info->test->classname} extends TestCase{
          public function test_{$info->helper->func_name}(){
            \$ret = {$info->helper->func_name}();
            \$this->assertEquals(\$ret,'');
          }
        }
        EOS) && printf("{$file}\n");
  }
}


if ( realpath( __FILE__ ) == realpath( $argv[0] ) ) {
  createTestClasses();
}

