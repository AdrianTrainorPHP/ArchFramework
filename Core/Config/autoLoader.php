<?php
require_once 'Classes/AutoLoader.php';

$autoLoader = new AutoLoader();
// register core paths
$autoLoader->registerPaths(array(''));

// register vendor paths
$autoLoader->registerPaths(array(
  '/Vendors/vendor/twig/twig/lib/Twig/'
));

$autoLoader->setIncludePaths();

// Create class autoloader.
spl_autoload_register('archAutoLoad');

function archAutoLoad($class = '') {
  AutoLoader::autoLoadClass($class);
}