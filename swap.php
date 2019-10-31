<?

$fn=$_POST['user'];

$s="info/".$fn."3.jpg";
if (file_exists($s)){unlink($s);}

$s1="info/".$fn."2.jpg";
$s2="info/".$fn."3.jpg";
if (file_exists($s1)){rename($s1,$s2);}

$s1="info/".$fn.".jpg";
$s2="info/".$fn."2.jpg";
if (file_exists($s1)){rename($s1,$s2);}



?>