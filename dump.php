<?

if ($_GET["pas"]=="wirt"){
include "bd.php";

$bd="codes";
$sql = "DROP TABLE ".$bd;
   $result = @mysql_query("$sql",$db);
$sql = "CREATE TABLE ".$bd." (
	code varchar(16) not null,
	date_reg varchar(16) not null,
	date_fin varchar(16) not null,	
	date_last varchar(16) not null,	
	uid varchar(12) not null,
	type int not null,
	treg varchar(16) not null,
	comment varchar(30) not null
	
)";

   $result = @mysql_query("$sql",$db);
	echo $bd."_create_rez=".$result."<br>";	
	
$sql="ALTER TABLE `".$bd."` ADD UNIQUE(`code`)";
$result = @mysql_query("$sql",$db);
echo $bd."_SETKEY_rez=".$result."<br>";	

}
?>
