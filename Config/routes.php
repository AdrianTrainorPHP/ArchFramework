<?php
namespace Arch\Config;

class Routes
{
  public static $routes = array(
    'test_empty_route_name' => array(
      'Route'       => '{empty}',
      'Controller'  => 'SampleController',
      'Action'      => 'indexAction'
    ),
    'test_fixed_route_name' => array(
      'Route'       => '{"blog":string}{pageId:int:not-required:default:1}
      ',
      'Controller'  => 'BlogController',
      'Action'      => 'indexAction'
    ),
    'test_fixed_and_dynamic_route_name' => array(
      'Route'       => '{"blog":string}{blogId:int:required}{blogSlug:string:required}',
      'Controller'  => 'BlogController',
      'Action'      => 'viewAction'
    )
  );
}