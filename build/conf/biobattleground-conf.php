<?php
// This file generated by Propel 1.5.0 convert-conf target
// from XML runtime conf file D:\xampp\htdocs\BioBattleGround\runtime-conf.xml
$conf = array (
  'datasources' => 
  array (
    'biobattleground' => 
    array (
      'adapter' => 'mysql',
      'connection' => 
      array (
        'dsn' => 'mysql:host=localhost;dbname=biobattleground',
        'phptype' => 'mysql',
        'hostspec' => 'localhost',
        'database' => 'biobattleground',
        'user' => 'root',
        'password' => '',
      ),
    ),
    'default' => 'biobattleground',
  ),
  'generator_version' => '1.5.0',
);
$conf['classmap'] = include(dirname(__FILE__) . DIRECTORY_SEPARATOR . 'classmap-biobattleground-conf.php');
return $conf;