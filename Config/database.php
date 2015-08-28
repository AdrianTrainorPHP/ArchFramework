<?php
namespace Arch\Config;

class Database
{
  public static $databases = array(
    array(
      'identifier'  => 'test_db_identifier',
      'host'        => 'test_db_host',
      'database'    => 'test_db_name',
      'user'        => 'test_db_user',
      'pass'        => 'test_db_password'
    )
  );
}