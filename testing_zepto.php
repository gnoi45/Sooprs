<?php

$curl = curl_init();

curl_setopt_array($curl, array(
    CURLOPT_URL => "https://api.zeptomail.in/v1.1/email",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "POST",
    CURLOPT_POSTFIELDS => '{
"from": { "address": "noreply@sooprs.com"},
"to": [{"email_address": {"address": "vny.009@gmail.com","name": "Sooprs"}}],
"subject":"Test Email",
"htmlbody":"<div><b> Test email sent successfully. </b></div>",
}',
    CURLOPT_HTTPHEADER => array(
        "accept: application/json",
        "authorization: Zoho-enczapikey PHtE6r1cQuG43TV5+hQEs/DpHpSlNYon/O01KAkVuIcQCvMDSU1RotkrlT6+qEh5BvBKQfCSz4Nvubucse6NJWq5NGoaXGqyqK3sx/VYSPOZsbq6x00euFkacEbcVofvct5s3CXUvdreNA==",
        "cache-control: no-cache",
        "content-type: application/json",
    ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
    echo "cURL Error #:" . $err;
} else {
    echo $response;
}
?>