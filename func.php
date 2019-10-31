<?

function getnum($ch){
	include "alp.php";
	
	for ($i5=0;$i5<$kola;$i5++){
		if ($a[$i5]==$ch){return $i5;break;}
	}
	
}


function myup($h,$ch,$k){
	
	include "mas.php";
	include "alp.php";

	if ($k>=$kolm){$k-=$kolm;}
	if ($k<0){$k+=$kolm;}
	
	
	$t=getnum($ch);
	
	$t+=($m[$k]*$h);
	if ($t>=$kola){$t-=$kola;}
	if ($t<0){$t+=$kola;}
	
	
	
	$ch=$a[$t];
	
	return $ch;
}

?>