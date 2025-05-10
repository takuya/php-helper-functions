<?php
namespace Takuya\Tests;

use Composer\Autoload\ClassLoader;

class TestCase extends \PHPUnit\Framework\TestCase {
  
  /**
   * @param string $php_source_string
   * @param bool   $partial      FLAG that $php_source_string without using script tags '<\?php'
   * @param bool   $use_autoload FLAG that auto append autoload.php to source.
   * @return string
   */
  public function run_php_script_body( string $php_source_string,bool $partial=true,bool $use_autoload=true):string{
    // prepare
    if ($use_autoload){
      $autoload_php = array_keys( ClassLoader::getRegisteredLoaders() )[0].'/autoload.php';
      $php_source_string = "require_once '$autoload_php';".
        "\n\n".$php_source_string;
    }
    if ($partial){
      $php_source_string = "<?php\n". $php_source_string ;
    }

    // run
    try {
      $tmpfile = tempnam( sys_get_temp_dir(), 'php-unit-'.__FUNCTION__ );
      file_put_contents( $tmpfile , $php_source_string );
      $php_executable = $_SERVER['_'];
      $result = `{$php_executable} {$tmpfile}`;
    } finally {
      unlink($tmpfile);
    }
    
    
    return $result;
  }
}
