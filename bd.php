<?
$databasename = "boewic_pubg";
$databaseuser = "boewic_pubg";
$databasepasswd = "next2008next2008";

$sqllocal = "localhost";

   $db = @mysql_connect("$sqllocal", "$databaseuser", "$databasepasswd") or die("Ошибка соединения с базой данных ;(");;
   @mysql_select_db("$databasename",$db);

$rr=@mysql_set_charset("utf8",$db);////cp1251


//$mip = (!empty($_SERVER['REMOTE_ADDR'])) ? $_SERVER['REMOTE_ADDR'] : ((!empty($_ENV['REMOTE_ADDR'])) ? $_ENV['REMOTE_ADDR'] : getenv('REMOTE_ADDR')); 

//86400
?>