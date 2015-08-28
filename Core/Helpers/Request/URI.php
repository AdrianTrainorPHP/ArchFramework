<?php
namespace Arch\Core\Helpers\Request;

/**
 * Class URI
 * @package Arch\Core\Helpers\Request
 */
class URI
{
  /**
   * @return array
   */
  public static function parser()
  {
    $uri = $_SERVER['REQUEST_URI'];

    /**
     * handle empty request uris or split the uri into its uri parts (by forward slash)
     * and remove empty/null parts - e.g., if the request uri begins with a forward slash
     * the exploded arrays first value will be empty and therefore should be removed
     */
    switch(strlen($uri)) {
      case 0:
        /** empty uri - return empty array */
        $uri = array();
        break;
      default:
        /** explode the uri into parts by forward slash */
        $uri = explode(DS, $uri);
    }

    /**
     * uri may still be empty if the only character was a forward slash - if this is the case an empty
     * array will be returned just like the first switch case above.
     */
    foreach ($uri as $uriKey => $uriPart) {
      if (is_null($uriPart) || empty($uriPart)) {
        unset($uri[$uriKey]);
      }
    }

    /** always returns array - even if the array is empty */
    return $uri;
  }
}