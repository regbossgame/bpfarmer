<?

if ($_GET["pas"]=="wirt"){
include "bd.php";

$count=10000;
$typ=1;
if (isset($_GET['count'])){$count=$_GET['count'];}
if (isset($_GET['type'])){$typ=$_GET['type'];}

for($i=0;$i<$count;$i++){
	$type="codes";
	include "gen_code.php";
	
	
 $sql = "INSERT INTO codes ( code,date_reg,uid,type,treg) VALUES ('$nid','-','-','$typ','0')";
 $result = @mysql_query("$sql",$db);
 //echo $sql." - ".($result*1);

	
}



echo "END + ".$count."   type=".$typ;

}
?>