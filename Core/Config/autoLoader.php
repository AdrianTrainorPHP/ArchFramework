<?php
require_once 'Classes/AutoLoader.php';

$predefinedAutoLoadDirectories = array(
  'Core', 'Config', 'Source', 'Templates', 'Tests'
);
$autoLoader = new AutoLoader();

// Create class autoloader.
spl_autoload_register('archAutoLoad');

function archAutoLoad($class = '') {
  AutoLoader::autoLoadClass($class);
}