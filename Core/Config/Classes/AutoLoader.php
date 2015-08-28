<?php
/**
 * Class AutoLoader
 * @author Adrian Trainor
 * 
 * A class to register paths for the core framework and registered vendors.
 *
 */
class AutoLoader
{
  public static $directories;

  public function __construct()
  {
    self::$directories = array();
  }

  /**
   * 
   */
  public function registerPath($directoryName = '')
  {
    if (in_array($directoryName, self::$directories)) {
      return;
    }

    self::$directories[] = $directoryName;
  }

  public function registerPaths($vendors = array())
  {
    foreach ($vendors as $vendor) {
      $this->registerPath($vendor);
    }
  }

  public function setIncludePaths()
  {
    $includePath = SYSTEM;
    $includePath .= implode(PATH_SEPARATOR . SYSTEM . DS, self::$directories);
    $includePath .= PATH_SEPARATOR . get_include_path();

    set_include_path($includePath);
  }

  public static function autoLoadClass($className = '')
  {
    try {
    if (false === strpos($className, 'Vendors')) {
      $found = false;
      $path = str_replace('\\', '/', $className) . '.php';
      if ('Arch' === substr($path, 0, 4)) {
        $path = substr($path, 4);
      }
      $tried = array();
      foreach (self::$directories as $directory) {
        if(file_exists(SYSTEM . $directory . $path)) {
          require_once $directory . $path;
          $found = true;
          break;
        }
        $tried[] = SYSTEM . $directory . $path;
      }
      if (!$found) {
        throw new Exception(implode("\n", $tried));
      }
    }
    } catch (Exception $e) {
      echo $e->getMessage();
    }
  }

}