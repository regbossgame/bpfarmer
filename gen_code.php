<?
if ($_GET["pas"]=="wirt"){


$ef7=true;
while ($ef7){
$nid="";

for ($i7=0;$i7<16;$i7++){
	if (Rand(0,2)==0){$nid.=chr(rand(65,90));}else{$nid.=rand(0,9);}
}


$ef7=false;
		$sql29="SELECT code FROM $type WHERE code LIKE '$nid'";
		$result29 = @mysql_query($sql29,$db);
        $k29=@mysql_num_rows($result29);
		if ($k29>0){$ef7=true;}
		
}


}
?>