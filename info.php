<html>

<head>

<? //<meta http-equiv="Refresh" content="300" />
?>

  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <meta name="viewport" content="width=1920"/>
  <link rel="stylesheet" type="text/css" href="style_info.css?ver=1.1"/>
  
  
<head>

<body>
<?

$mas=Array();

$dir='info/';

$dDir = opendir($dir); // открываем директорию, $dDir - дескриптор 
//$aFileList = array(); // массив в который будем записывать имена файлов 

$i=-1;

$comps=array();

$FN2="";

// цикл считывания директории 
while ($sFileName=readdir($dDir)) 
{ 
if (($sFileName!='.') && ($sFileName!='..') && ((strpos($sFileName,".jpg")>0) || (strpos($sFileName,".JPG")>0)))
{ 
$i++;


$CMP1=substr($sFileName,0,strpos($sFileName,"_"));
$b=true;
for ($j=0;$j<count($comps);$j++){
	if ($comps[$j]==$CMP1){$b=false;break;}
}

if ($b){
	$comps[count($comps)]=$CMP1;
}

//echo "|||".$CMP1."|||";
$FN1="";
/*
$razdel="";

$FN1=substr($sFileName,strpos($sFileName,"_")+1,strlen($sFileName));
if ($FN2==""){$FN2=$FN1;}

if ($FN2!=$FN1){
	$razdel="<div class='razdel1'></div>";
	$FN2=$FN1;
}
*/


if (strpos($sFileName,"_co0")>0){
$FN1=substr($sFileName,strpos($sFileName,"_")+1,strlen($sFileName));

$FN1=$dir.substr($FN1,0,strpos($FN1,"_")).".txt";
}
//$FN1=$sFileName;//substr($sFileName,0,10);
//
$mas[$i]=filectime($dir.$sFileName)."|"."".$sFileName." <br> ".date('d.m.Y (H:i:s)',filectime($dir.$sFileName))."</strong> <i>".round((time()-filectime($dir.$sFileName))/60)." m ".round((time()-filectime($dir.$sFileName))/3600)." h</i><br>
<img src='".$dir.$sFileName."?rnd=".rand(1,9999999).rand(10000,9999999)."' width=220px/>

<br>";

//if ($FN1!=""){
//	$mas[$i].=file_get_contents($FN1)."<br>\n";
//}

//$mas[$i].="
//</div>";


} 
} 

closedir ($dDir); 


rsort($mas);

rsort($comps);

$txt="";

$txt.="<h1>Users: ".count($comps)."</h1>";

$txt.="<table border=1><tr valign=top>";

for ($j=0;$j<count($comps);$j++){
$txt.="<td>".$comps[$j];

$FN2="";

for ($i=0;$i<Count($mas);$i++){
		
		if (strpos($mas[$i],$comps[$j])>0){
			

		$FN1="";
		$razdel="";

		$FN1=substr($mas[$i],strpos($mas[$i],"_")+1,strlen($mas[$i]));
		
		$FN1=substr($FN1,0,strpos($FN1,"_co"));
		
		//if ($FN2==""){$FN2=$FN1;}

		if ($FN2!=$FN1){
			$razdel="\n<br><div class='razdel1'>".$FN1."</div>\n";
			$FN2=$FN1;
		}

			
		$t="#BA9A00";
		if ((time()-substr($mas[$i],0,11))<=60*20){$t="#00AA00";}
		if ((time()-substr($mas[$i],0,11))>=60*60*24){$t="#AA0000";}
	////$razdel.
		$txt.="<div style='border:2px solid #333333;color:".$t."'><strong>".substr($mas[$i],11)."<br></div>\n";
		}
	}
$txt.="</td>";
}

$txt.="</tr></table>";

echo $txt;

?>
</body>
</html>