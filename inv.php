<?

$atx="";
//$tid="kaloliber";
$tid=strtolower($_POST["NIK"]);

if ($tid==""){$tid=strtolower($_GET["NIK"]);}

$get_content="_null_";
if ($tid!=""){$get_content = file_get_contents("http://steamcommunity.com/id/".$tid."/inventory/json/578080/2");}

if (strpos("!".$get_content."!","null")>0){}else{

$data_image = (array) json_decode($get_content) -> rgInventory;
$count_content = count($data_image);
$data_content = (array) json_decode($get_content, TRUE);
//$atx.=

$inv=array();
$inv2=array();
$k1=0;


//echo  "Total: $count_content <br>";
for ($i=0; $i<$count_content; $i++) {
    $element_name = array_shift($data_content[rgInventory]);
    $name_item = "$element_name[classid]_$element_name[instanceid]";
    //$atx.=
	
	if (($data_content['rgDescriptions'][$name_item]['tradable'])=="1"){
	$atx="".($data_content['rgDescriptions'][$name_item]['name'])."</p>\n";
	$atx.= "<img src='http://steamcommunity-a.akamaihd.net/economy/image/";
	//print_r
    $atx.=($data_content['rgDescriptions'][$name_item]['icon_url']);
    $atx.="' class='inv_img1' />\n";
	
	//echo $inv[$i];
	$b=true;
	for ($j=0;$j<count($inv2);$j++){
		//echo $j.")"."<br>";
		if ($inv2[$j]==$atx){
			$inv[$j]++;
			//echo "++".$inv[$j]."<br>";
			$k1++;
			$b=false;
			break;
		}
	}
if ($b) {
	$j=count($inv2);
	$inv2[$j]=$atx;
	$inv[$j]=1;
	$k1++;
	//echo "NEW-".$inv[$j]."=<br>";
}
	}// - trade
}

$atx="<p class='tit1'>Total: $k1 / $count_content</p>\n";
$atx.="<table cellpadding=0 cellspacing=0 class='invt1'>";


for ($i=0;$i<count($inv2);$i++){
	
	if ($i%4==0){
		if ($i!=0){$atx.="</tr>";}
		$atx.="<tr valign=top>";
		}
	$atx.="<td><div class='dinv1'>\n";
	
	$atx.="<p class='inv1'><strong>".$inv[$i]."x</strong> ".$inv2[$i]."";
	
	$atx.="</div></td>\n";
	//."(".array_count_values($inv)[$inv2[$i]].")<br>!";
}

for ($i=0;$i<4-count($inv2) % 4;$i++){
	$atx.="<td></td>";
}

$atx.="</tr>";

$atx.="</table>";

//$atx.="</tr></table>";
$dir='info/';
if ($count_content>0){
	echo $dir.$tid.".txt<br><br>".$atx;
	file_put_contents($dir.$tid.".txt",$atx);
}

}

?>