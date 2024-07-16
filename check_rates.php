<?php
$amount = urlencode("1");
$from_GBP0 = urlencode("GBP");
$to_usd= urlencode("USD");
$Dallor = "hl=en&q=$amount$from_GBP0%3D%3F$to_usd";
$US_Rate = file_get_contents("http://google.com/ig/calculator?".$Dallor);
print_r($US_Rate);
exit;
$US_data = explode('"', $US_Rate);
$US_data = explode(' ', $US_data['3']);
$var_USD = $US_data['0'];
echo $to_usd;
echo $var_USD;
echo '<br/>'; 
?>