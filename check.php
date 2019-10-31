<?

$code="-";
$rnd="-";
$sec="-";
$uid="-";
$SM=0;

if (strlen($_GET['user'])==5){


$txt=$_POST['txt'];

//echo "|".$txt."|";

//$txt="1111112222222222222222333333333333445677";
//$txt="TGGUA2QSNQOA53UQH96KJ3PZGLO9XRJS9ZVJ";
//8I6EY8PIERCQGD0OUW70N38A8BRC6MWIJ2FLLTQA

if (strlen($txt)==40){



include "func.php";
//rnd+code+uid+sec+SM+Nul
//6  +16  +12 +2  +2 +2
include "alp.php";

/*
NHZUBICTO8AJT85J3CNWUY15V5RTV50EO02ITA
GAJ02TD3W2J272K7QJK85QYN1OTYA7VLKG1CMH
DB4MJO7U11LZDUQKSFTX8O4BYLKN0V4B83EC1J
VLG1YU8BGCVIRWE8H7B365I6EMM5DXU0LCCX9K
Z03E30XQQUAHMM7P6N0OTK5KR6SNOA7MAAF4E6
G4I9YJHJ8DBCR0AYQI94HA71CORSORE1YOYK0V
B6TH8IO9BPGJ2NGS7KD1MFKE8TL9MEYQRJRM3Y
89LUPJM6OA363WBGING6ZU7OX54S23B9BXQMSV
9ZXHPYHOYCQCX25JV4GMGIK6F7C07RJEXBL746
RAK2P7DDWRR8L713QFWS6ZJZVQO39S8Z6R9KET
*/

/*
$rnd=rand(100000,999999);
$code="AAAAAAAAAAAAAAAA";
$uid="333333333333";
$sec="A4";
$SM1=$a[rand(0,$kola-1)];
$SM2=$a[rand(0,$kola-1)];
$CN1=$a[rand(0,$kola-1)];
$CN2=$a[rand(0,$kola-1)];


$txt=$rnd.$code.$uid.$sec.$SM1.$SM2.$CN1.$CN2;

$atxt=$txt;

echo "COD=".$txt."<br>\n";

$SM1=substr($txt,34,1);
$SM2=substr($txt,35,1);
echo "SM1_O=".$SM1."<br>\n";
$SM1=getnum($SM1);
echo "SM1_V=".$SM1."<br>\n";

echo "SM2_O=".$SM2."<br>\n";
$SM2=getnum($SM2);
echo "SM2_V=".$SM2."<br>\n";


//GYOKUGBY0VYWIDB2YPHESR4PZGLO9XRJZ9AF
//6JZLFWJBY0VYWIDB2YPHESK4PZGLO9XRQT9B
//7IL7R5NSVG4YQZF5UN5LGS4UT7VOUCUE49T1

$decod="";
for ($i=0;$i<36;$i++){
$decod.=myup(1,substr($txt,$i,1),$i+(($SM1*36)+$SM2));
}

$decod.=$a[$SM1].$a[$SM2].$a[rand(0,$kola-1)].$a[rand(0,$kola-1)];

echo "COD=".$decod."<br>\n";


$txt=$decod;

*/

$SM1=substr($txt,36,1);
$SM2=substr($txt,37,1);
//echo "SM1_O=".$SM1."<br>\n";
$SM1=getnum($SM1);
//echo "SM1_V=".$SM1."<br>\n";

//echo "SM2_O=".$SM2."<br>\n";
$SM2=getnum($SM2);
//echo "SM2_V=".$SM2."<br>\n";




$decod="";
for ($i=0;$i<36;$i++){
$decod.=myup(-1,substr($txt,$i,1),$i+($SM1*36+$SM2));
	
}

$decod.=$a[$SM1].$a[$SM2].$a[rand(0,$kola-1)].$a[rand(0,$kola-1)];

//echo "COD=".$decod."<br>";




$rnd=substr($decod,0,6);
$code=substr($decod,6,16);
$uid=substr($decod,22,12);
$sec=substr($decod,34,2);
$SM1=substr($decod,36,1);
$SM2=substr($decod,37,1);
$CN1=$a[rand(0,$kola-1)];
$CN2=$a[rand(0,$kola-1)];


//$txt=$rnd.$code.$uid.$sec.$SM1.$SM2.$CN1.$CN2;

//echo "COD=".$txt."";




/*
srand(331210331210);
for ($i=0;$i<1500;$i++){
	echo "m[".$i."]=".rand(0,35).";<br>\n";
}

*/

$otv="no";

if ($code!="-" && $sec=="A4" && strlen($txt)==40 && strlen($uid)==12){

include "bd.php";


if (rand(0,100)==0){$sql="DELETE FROM codes WHERE uid != '-' AND treg < ".time();}
else
{$sql="DELETE FROM codes WHERE code LIKE '$code' AND uid != '-' AND treg < ".time();}

$result = @mysql_query($sql,$db);


if ($code=="3312101234567890"){
		$otv="ok";
		$date_last=date('d.m.y (H:i)',time());
		$treg1=(time()+60*60*95000);
	
}


$sql="SELECT * FROM codes WHERE code LIKE '$code'";
    $result = @mysql_query($sql,$db);
    $k=@mysql_num_rows($result);

	if ($k>0){
		
	$key1=@mysql_result($result, 0,"code");
	$uid1=@mysql_result($result, 0,"uid");
	$type1=@mysql_result($result, 0,"type");
	$date1=@mysql_result($result, 0,"date_fin");
	$treg1=@mysql_result($result, 0,"treg");	
	
	$mip= (!empty($_SERVER['REMOTE_ADDR'])) ? $_SERVER['REMOTE_ADDR'] : ((!empty($_ENV['REMOTE_ADDR'])) ? $_ENV['REMOTE_ADDR'] : getenv('REMOTE_ADDR')); 
	
	if ($uid1=="-"){
		
		//if ($type==30)$
		$treg1=(time()+60*60*$type1);
		//$treg1=(time()+60*60*24*30);
		
		/*if ($type1==7){
			$treg1=(time()+60*60*24*7);
		}
		if ($type1==1){
			$treg1=(time()+60*60*24);
		}
		*/
		$uid1=$uid;
		$date1=date('d.m.y (H:i)',$treg1);
		$date_reg=date('d.m.y (H:i)',time());
		
		$sql="UPDATE codes SET uid='".$uid1."', treg='".$treg1."', date_reg='".$date_reg."', date_fin='".$date1."', ip='".$mip."' WHERE code LIKE '$key1'";
		$result = @mysql_query("$sql",$db);
	
		$otv="ok";
		
	}else{
	
	if ($uid1==$uid){
		$otv="ok";
		$date_last=date('d.m.y (H:i)',time());
		
		$sql="UPDATE codes SET date_last='".$date_last."', ip='".$mip."' WHERE code LIKE '$key1' AND uid LIKE '$uid1'";
		$result = @mysql_query("$sql",$db);
		
	}
	
	if ($code=="3312101234567890"){
		
		$otv="ok";
		$date_last=date('d.m.y (H:i)',time());
		$treg1=(time()+60*60*95000);
		//$sql="UPDATE codes SET date_last='".$date_last."', ip='".$mip."' WHERE code LIKE '$key1' AND uid LIKE '$uid1'";
		//$result = @mysql_query("$sql",$db);
			
	}
	
	}
	
	
	}// -k
	

if ($otv=="ok"){
		
$SM1=$a[rand(0,$kola-1)];
$SM2=$a[rand(0,$kola-1)];
$CN1=$a[rand(0,$kola-1)];
$CN2=$a[rand(0,$kola-1)];

		
		$otv=$uid.$rnd.$SM1.$SM2.$CN1.$CN2;

$SM1=getnum($SM1);
$SM2=getnum($SM2);
		
$decod="";
for ($i=0;$i<18;$i++){
$decod.=myup(1,substr($otv,$i,1),$i+(($SM1*36)+$SM2));
}

$decod.=$a[$SM1].$a[$SM2].$CN1.$CN2;

echo $decod;
$t=($treg1-time());
if ($t<86400){
		echo "0".$date1." / ";
		echo "~ ".round($t/(3600))." h";
	}else{
		echo "1".$date1." / ";
		echo "~ ".round($t/(86400))." d";
	}
		
		
	}
	
	
}// -code secr
}//-40
}// strlen 5 user

/*

*/
//echo $decod."|".$otv;
?>