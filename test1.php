<?

//$HtmlPriceSteam = json_decode(file_get_contents('http://steamcommunity.com/market/priceoverview' . '?' . http_build_query(array('appid' => 570,'market_hash_name'   => $NameForLink))), true);
//print_r($HtmlPriceSteam);
//print_r(http_build_query(array('appid' => 570,'market_hash_name'   => $NameForLink)));

//include('simple_html_dom.php');
$NameForLink = "Sigil%20Mask%20of%20the%20Bladekeeper";
$HtmlPriceSteam = json_decode(file_get_contents('http://steamcommunity.com/market/priceoverview' . '?' . http_build_query(array('appid' => 570,'market_hash_name'   => $NameForLink))), true);
print_r($HtmlPriceSteam);


?>