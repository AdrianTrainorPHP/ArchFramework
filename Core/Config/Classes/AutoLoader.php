<?php

class AutoLoader
{
  public static $directories;

  public function __construct()
  {
    self::$directories = array();
  }

  public function registerPath($directoryName = '')
  {
    if (strlen($directoryName) === 0) {
      return;
    }

    if (in_array($directoryName, self::$directories)) {
      return;
    }

    self::$directories[] = $directoryName;
  }

  public function setIncludePaths()
  {
    $includePath = SYSTEM;
    $includePath .= implode(PATH_SEPARATOR . SYSTEM, self::$directories);
    $includePath .= PATH_SEPARATOR . get_include_path();

    set_include_path($includePath);
  }

  public static function autoLoadClass($class = '')
  {
    $path = str_replace('\\', '/', $class) . '.php';
    foreach (self::$directories as $directory) {
      if(file_exists(SYSTEM . DS . $directory . DS . $path)) {
        require_once $path;
        break;
      }
    }
  }

}