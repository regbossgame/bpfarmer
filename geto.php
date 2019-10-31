<?
if ($_GET["pas"]=="wirt"){

include "bd.php";

$type="codes";

$typ=1;
if (isset($_GET['type'])){$typ=$_GET['type'];}

		$sql="SELECT code FROM $type WHERE uid LIKE '-' AND type LIKE '$typ'";
		$result = @mysql_query($sql,$db);
        $k=@mysql_num_rows($result);
		
		for ($i=0;$i<$k;$i++){
		
			$key1=@mysql_result($result, $i,"code");
			echo $key1."<br>\n";
			
		}
		
	
}
?>