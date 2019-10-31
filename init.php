<?
ini_set('session.gc_maxlifetime', 9000000);
ini_set('session.cookie_lifetime', 9000000);

session_start();
ini_set('session.gc_maxlifetime', 9000000);
ini_set('session.cookie_lifetime', 9000000);

header("Content-Type: text/html;charset=utf8");

$mip = (!empty($_SERVER['REMOTE_ADDR'])) ? $_SERVER['REMOTE_ADDR'] : ((!empty($_ENV['REMOTE_ADDR'])) ? $_ENV['REMOTE_ADDR'] : getenv('REMOTE_ADDR')); 


?>