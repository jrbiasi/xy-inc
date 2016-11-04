<?php
include("models/autoload.php");

ini_set('display_errors', 1);
ini_set('log_errors', 1);
error_reporting(E_ALL ^ E_NOTICE );
date_default_timezone_set('America/Sao_Paulo');

define("PDO_HOST", "127.0.0.1");
define("PDO_USER", "root");
define("PDO_DB", "testes");
define("PDO_PASS", "");
define("PDO_DRIVER", "mysql");
define("PDO_PORT", "3306");
#caso esteja em uma subpasta configure exe: 'http://localhost/teste/' ficando: define("PATH", "teste/");
define("PATH", "");

if(!defined('PS'))
    define( 'PS', PATH_SEPARATOR );

if(!defined('DS'))
    define( 'DS', DIRECTORY_SEPARATOR );

$autoload = new Autoload();
$autoload->initializeAutoload();
$autoload->includeClassPath(dirname(dirname(__FILE__)) . DS . 'models' . DS);

spl_autoload_register('Autoload::autoLoad');

$u = new Url();
$db = new Db();
$poi = new Poi();
?>
